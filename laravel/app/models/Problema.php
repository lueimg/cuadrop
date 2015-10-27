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


}
