<?php 
class Problema extends Eloquent {

protected $table = '';

    public static function ListadoProblema($datos){

        $sede= implode($datos['sede'],',');
        $tipo= implode($datos['tipo'],',');
        $estado='';$fecha='';

        if( isset($datos['fecha_ini']) AND isset($datos['fecha_fin']) ){
            $fecha=" AND DATE(p.created_at) BETWEEN '".$datos['fecha_ini']."' AND '".$datos['fecha_fin']."' ";
        }

        if( isset($datos['estado']) ){
            $estado=" AND ep.id IN (".implode(",",$datos['estado']).") ";
        }

        $sql="  SELECT p.id, s.nombre AS sede, tp.nombre AS tipo_problema,
                descripcion, ep.nombre AS estado_problema, 
                p.fecha_problema,
                p.created_at AS fecha_registro,
                pd.fecha_estado, pd.resultado,
                a.paterno,a.materno,a.nombre,a.email,a.telefono,
                IFNULL(c.nombre,ap.carrera) carrera,IFNULL(tc.nombre,'') tipo_carrera,IFNULL(ci.nombre,'') ciclo,
                ap.documento,ap.observacion,
                                apnf.nota,appf.pago
                FROM problemas p
                JOIN tipo_problema tp ON p.tipo_problema_id=tp.id
                JOIN sedes s ON p.sede_id=s.id
                JOIN problema_detalle pd ON p.id=pd.problema_id
                JOIN (SELECT MAX(id) AS id
                            FROM problema_detalle
                            WHERE estado=1
                            GROUP BY problema_id) pd2
                ON pd.id=pd2.id
                JOIN estado_problema ep ON pd.estado_problema_id=ep.id
                LEFT JOIN alumno_problema ap ON p.id=ap.problema_id
                LEFT JOIN alumnos a ON ap.alumno_id=a.id
                                LEFT JOIN ciclos ci ON ci.id=ap.ciclo_id
                LEFT JOIN carreras c ON ap.carrera_id = c.id
                LEFT JOIN tipo_carrera tc ON c.tipo_carrera_id=tc.id
                LEFT JOIN (
                    SELECT apn.alumno_problema_id,GROUP_CONCAT( CONCAT_WS('|',apn.curso,apn.frecuencia,apn.profesor,apn.fecha_inicio,apn.fecha_fin,apn.nota) SEPARATOR '**') nota
                    FROM alumno_problema_nota apn
                    WHERE apn.estado=1
                    GROUP BY apn.alumno_problema_id
                ) apnf ON apnf.alumno_problema_id=ap.id
                LEFT JOIN (
                    SELECT app.alumno_problema_id,GROUP_CONCAT( CONCAT_WS('|',app.curso,app.recibo,app.monto) SEPARATOR '**') pago
                    FROM alumno_problema_pago app
                    WHERE app.estado=1
                    GROUP BY app.alumno_problema_id
                ) appf ON appf.alumno_problema_id=ap.id
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in ($sede)
                AND p.tipo_problema_id in ($tipo)
                $estado $fecha";

        $query=DB::select($sql);

        return $query;
    }

    public static function ListadoProblema2($datos){

        $sede= implode($datos['sede'],',');
        $tipo= $datos['tipo'];

        if( $datos['tipo']!='' AND $datos['tipo']=='5' ){
            $tipo=" AND p.tipo_problema_id NOT IN (1,3,5,6)";
        }
        elseif( $datos['tipo']!='' AND $datos['tipo']=='4' ){
            $tipo=" AND p.tipo_problema_id=3";
        }
        elseif( $datos['tipo']!='' AND $datos['tipo']=='3' ){
            $tipo=" AND p.tipo_problema_id=6";
        }
        elseif( $datos['tipo']!='' AND $datos['tipo']=='2' ){
            $tipo=" AND p.tipo_problema_id=5";
        }
        elseif( $datos['tipo']!='' AND $datos['tipo']=='1' ){
            $tipo=" AND p.tipo_problema_id=1";
        }
        $estado='';$fecha='';

        if( isset($datos['fecha_ini']) AND isset($datos['fecha_fin']) ){
            $fecha=" AND DATE(p.created_at) BETWEEN '".$datos['fecha_ini']."' AND '".$datos['fecha_fin']."' ";
        }

        if( isset($datos['estado']) ){
            $estado=" AND ep.id IN (".implode(",",$datos['estado']).") ";
        }

        $sql="";

        if( $datos['tipo']=='' ){
        $sql="  SELECT p.id, s.nombre AS sede, tp.nombre AS tipo_problema,
                descripcion, ep.nombre AS estado_problema, 
                p.fecha_problema,
                p.created_at AS fecha_registro,
                pd.fecha_estado, pd.resultado,
                a.paterno,a.materno,a.nombre,a.email,a.telefono,
                IFNULL(c.nombre,ap.carrera) carrera,IFNULL(tc.nombre,'') tipo_carrera,IFNULL(ci.nombre,'') ciclo,
                ap.documento,ap.observacion,
                apnf.nota,appf.pago,DATEDIFF(CURDATE(),DATE(p.fecha_problema)) tiempo_transcurrido,
                i.nombre instituto,CONCAT(per.paterno,' ',per.materno,', ',per.nombre) persona,per.telefono,
                tpc.nombre categoria,m.nombre modalidad
                FROM problemas p
                JOIN personas per ON per.id=p.usuario_created_at
                JOIN tipo_problema tp ON p.tipo_problema_id=tp.id
                JOIN sedes s ON p.sede_id=s.id
                JOIN tipo_problema_categorias tpc ON tpc.id=p.categoria_tipo_problema_id
                JOIN institutos i ON i.id=p.instituto_id
                JOIN modalidades m ON m.id=i.modalidad_id
                JOIN problema_detalle pd ON p.id=pd.problema_id
                JOIN (SELECT MAX(id) AS id
                            FROM problema_detalle
                            WHERE estado=1
                            GROUP BY problema_id) pd2
                ON pd.id=pd2.id
                JOIN estado_problema ep ON pd.estado_problema_id=ep.id
                LEFT JOIN alumno_problema ap ON p.id=ap.problema_id
                LEFT JOIN alumnos a ON ap.alumno_id=a.id
                                LEFT JOIN ciclos ci ON ci.id=ap.ciclo_id
                LEFT JOIN carreras c ON ap.carrera_id = c.id
                LEFT JOIN tipo_carrera tc ON c.tipo_carrera_id=tc.id
                LEFT JOIN (
                    SELECT apn.alumno_problema_id,GROUP_CONCAT( CONCAT_WS('|',apn.curso,apn.frecuencia,apn.profesor,apn.fecha_inicio,apn.fecha_fin,apn.nota) SEPARATOR '**') nota
                    FROM alumno_problema_nota apn
                    WHERE apn.estado=1
                    GROUP BY apn.alumno_problema_id
                ) apnf ON apnf.alumno_problema_id=ap.id
                LEFT JOIN (
                    SELECT app.alumno_problema_id,GROUP_CONCAT( CONCAT_WS('|',app.curso,app.recibo,app.monto) SEPARATOR '**') pago
                    FROM alumno_problema_pago app
                    WHERE app.estado=1
                    GROUP BY app.alumno_problema_id
                ) appf ON appf.alumno_problema_id=ap.id
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in ($sede)
                $tipo
                $estado $fecha";
        }
        elseif( $datos['tipo']=='5' ){
        $sql="  SELECT p.id, s.nombre AS sede, tp.nombre AS tipo_problema,
                descripcion, ep.nombre AS estado_problema, 
                p.fecha_problema,
                p.created_at AS fecha_registro,
                pd.fecha_estado, pd.resultado,DATEDIFF(CURDATE(),DATE(p.fecha_problema)) tiempo_transcurrido,
                i.nombre instituto,CONCAT(per.paterno,' ',per.materno,', ',per.nombre) persona,per.telefono,
                tpc.nombre categoria,m.nombre modalidad
                FROM problemas p
                JOIN personas per ON per.id=p.usuario_created_at
                JOIN tipo_problema tp ON p.tipo_problema_id=tp.id
                JOIN sedes s ON p.sede_id=s.id
                JOIN tipo_problema_categorias tpc ON tpc.id=p.categoria_tipo_problema_id
                JOIN institutos i ON i.id=p.instituto_id
                JOIN modalidades m ON m.id=i.modalidad_id
                JOIN problema_detalle pd ON p.id=pd.problema_id
                JOIN (SELECT MAX(id) AS id
                            FROM problema_detalle
                            WHERE estado=1
                            GROUP BY problema_id) pd2
                ON pd.id=pd2.id
                JOIN estado_problema ep ON pd.estado_problema_id=ep.id
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in ($sede)
                $tipo
                $estado $fecha";
        }
        elseif( $datos['tipo']=='4' ){
        $sql="  SELECT p.id, s.nombre AS sede, tp.nombre AS tipo_problema,
                descripcion, ep.nombre AS estado_problema, 
                p.fecha_problema,
                p.created_at AS fecha_registro,
                pd.fecha_estado, pd.resultado,
                a.paterno,a.materno,a.nombre,a.email,a.telefono,
                IFNULL(c.nombre,ap.carrera) carrera,IFNULL(tc.nombre,'') tipo_carrera,IFNULL(ci.nombre,'') ciclo,
                ap.documento,ap.observacion,
                apnf.nota,appf.pago,DATEDIFF(CURDATE(),DATE(p.fecha_problema)) tiempo_transcurrido,
                i.nombre instituto,CONCAT(per.paterno,' ',per.materno,', ',per.nombre) persona,per.telefono,
                tpc.nombre categoria,m.nombre modalidad
                FROM problemas p
                JOIN personas per ON per.id=p.usuario_created_at
                JOIN tipo_problema tp ON p.tipo_problema_id=tp.id
                JOIN sedes s ON p.sede_id=s.id
                JOIN tipo_problema_categorias tpc ON tpc.id=p.categoria_tipo_problema_id
                JOIN institutos i ON i.id=p.instituto_id
                JOIN modalidades m ON m.id=i.modalidad_id
                JOIN problema_detalle pd ON p.id=pd.problema_id
                JOIN (SELECT MAX(id) AS id
                            FROM problema_detalle
                            WHERE estado=1
                            GROUP BY problema_id) pd2
                ON pd.id=pd2.id
                JOIN estado_problema ep ON pd.estado_problema_id=ep.id
                LEFT JOIN alumno_problema ap ON p.id=ap.problema_id
                LEFT JOIN alumnos a ON ap.alumno_id=a.id
                                LEFT JOIN ciclos ci ON ci.id=ap.ciclo_id
                LEFT JOIN carreras c ON ap.carrera_id = c.id
                LEFT JOIN tipo_carrera tc ON c.tipo_carrera_id=tc.id
                LEFT JOIN (
                    SELECT apn.alumno_problema_id,GROUP_CONCAT( CONCAT_WS('|',apn.curso,apn.frecuencia,apn.profesor,apn.fecha_inicio,apn.fecha_fin,apn.nota) SEPARATOR '**') nota
                    FROM alumno_problema_nota apn
                    WHERE apn.estado=1
                    GROUP BY apn.alumno_problema_id
                ) apnf ON apnf.alumno_problema_id=ap.id
                LEFT JOIN (
                    SELECT app.alumno_problema_id,GROUP_CONCAT( CONCAT_WS('|',app.curso,app.recibo,app.monto) SEPARATOR '**') pago
                    FROM alumno_problema_pago app
                    WHERE app.estado=1
                    GROUP BY app.alumno_problema_id
                ) appf ON appf.alumno_problema_id=ap.id
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in ($sede)
                $tipo
                $estado $fecha";
        }
        elseif( $datos['tipo']=='3' ){
        $sql="  SELECT p.id, s.nombre AS sede, tp.nombre AS tipo_problema,
                p.descripcion, ep.nombre AS estado_problema, 
                p.fecha_problema,
                p.created_at AS fecha_registro,
                pd.fecha_estado, pd.resultado,a.nombre articulo,ap.descripcion art_descripcion,
                ap.cantidad art_cantidad,ta.nombre tipo_articulo,
                DATEDIFF(CURDATE(),DATE(p.fecha_problema)) tiempo_transcurrido,
                i.nombre instituto,CONCAT(per.paterno,' ',per.materno,', ',per.nombre) persona,per.telefono,
                tpc.nombre categoria,m.nombre modalidad
                FROM problemas p
                JOIN personas per ON per.id=p.usuario_created_at
                JOIN tipo_problema tp ON p.tipo_problema_id=tp.id
                JOIN sedes s ON p.sede_id=s.id
                JOIN tipo_problema_categorias tpc ON tpc.id=p.categoria_tipo_problema_id
                JOIN institutos i ON i.id=p.instituto_id
                JOIN modalidades m ON m.id=i.modalidad_id
                JOIN problema_detalle pd ON p.id=pd.problema_id
                JOIN (SELECT MAX(id) AS id
                            FROM problema_detalle
                            WHERE estado=1
                            GROUP BY problema_id) pd2
                ON pd.id=pd2.id
                JOIN estado_problema ep ON pd.estado_problema_id=ep.id
                LEFT JOIN articulo_problema ap ON p.id=ap.problema_id
                LEFT JOIN articulos a ON a.id=ap.articulo_id
                LEFT JOIN tipo_articulo ta ON ta.id=a.tipo_articulo
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in ($sede)
                $tipo
                $estado $fecha";
        }
        elseif( $datos['tipo']=='2' ){
        $sql="  SELECT p.id, s.nombre AS sede, tp.nombre AS tipo_problema,
                descripcion, ep.nombre AS estado_problema, 
                p.fecha_problema,
                p.created_at AS fecha_registro,
                pd.fecha_estado, pd.resultado,
                DATEDIFF(CURDATE(),DATE(p.fecha_problema)) tiempo_transcurrido,
                i.nombre instituto,CONCAT(per.paterno,' ',per.materno,', ',per.nombre) persona,per.telefono,
                tpc.nombre categoria,m.nombre modalidad
                FROM problemas p
                JOIN personas per ON per.id=p.usuario_created_at
                JOIN tipo_problema tp ON p.tipo_problema_id=tp.id
                JOIN sedes s ON p.sede_id=s.id
                JOIN tipo_problema_categorias tpc ON tpc.id=p.categoria_tipo_problema_id
                JOIN institutos i ON i.id=p.instituto_id
                JOIN modalidades m ON m.id=i.modalidad_id
                JOIN problema_detalle pd ON p.id=pd.problema_id
                JOIN (SELECT MAX(id) AS id
                            FROM problema_detalle
                            WHERE estado=1
                            GROUP BY problema_id) pd2
                ON pd.id=pd2.id
                JOIN estado_problema ep ON pd.estado_problema_id=ep.id
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in ($sede)
                $tipo
                $estado $fecha";
        }
        elseif( $datos['tipo']=='1' ){
        $sql="  SELECT p.id, s.nombre AS sede, tp.nombre AS tipo_problema,
                descripcion, ep.nombre AS estado_problema, 
                p.fecha_problema,
                p.created_at AS fecha_registro,
                pd.fecha_estado, pd.resultado,
                DATEDIFF(CURDATE(),DATE(p.fecha_problema)) tiempo_transcurrido,
                i.nombre instituto,CONCAT(per.paterno,' ',per.materno,', ',per.nombre) persona,per.telefono,
                tpc.nombre categoria,m.nombre modalidad
                FROM problemas p
                JOIN personas per ON per.id=p.usuario_created_at
                JOIN tipo_problema tp ON p.tipo_problema_id=tp.id
                JOIN sedes s ON p.sede_id=s.id
                JOIN tipo_problema_categorias tpc ON tpc.id=p.categoria_tipo_problema_id
                JOIN institutos i ON i.id=p.instituto_id
                JOIN modalidades m ON m.id=i.modalidad_id
                JOIN problema_detalle pd ON p.id=pd.problema_id
                JOIN (SELECT MAX(id) AS id
                            FROM problema_detalle
                            WHERE estado=1
                            GROUP BY problema_id) pd2
                ON pd.id=pd2.id
                JOIN estado_problema ep ON pd.estado_problema_id=ep.id
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in ($sede)
                $tipo
                $estado $fecha";
        }

        $query=DB::select($sql);

        return $query;
    }
}
