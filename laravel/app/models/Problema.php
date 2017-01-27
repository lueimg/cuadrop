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
                IFNULL(c.nombre,ap.carrera) carrera,IFNULL(tc.nombre,'Técnico') tipo_carrera,IFNULL(ci.nombre,'') ciclo,
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
        
        $tipo=" AND p.tipo_problema_id=".$tipo;

        $estado='';$fecha='';

        if( isset($datos['fecha_ini']) AND isset($datos['fecha_fin']) ){
            $fecha=" AND DATE(p.created_at) BETWEEN '".$datos['fecha_ini']."' AND '".$datos['fecha_fin']."' ";
        }

        if( isset($datos['estado']) ){
            $estado=" AND ep.id IN (".implode(",",$datos['estado']).") ";
        }

        $array=array();
        $array['estado']=$estado;
        $array['fecha']=$fecha;
        $array['tipo']=$tipo;
        $array['sede']=$sede;

        $sql="";

        if( $datos['tipo']=='13' ){
            $r= Problema::AcademicoDeut($array);
        }
        elseif( $datos['tipo']=='12' ){
            $r= Problema::AcademicoInstituto($array);
        }
        elseif( $datos['tipo']=='13' ){
            $r= Problema::AcademicoDeut($array);
        }
        elseif( $datos['tipo']=='13' ){
            $r= Problema::AcademicoDeut($array);
        }
        elseif( $datos['tipo']=='13' ){
            $r= Problema::AcademicoDeut($array);
        }

        return $r;
    }

    public static function AcademicoDeut($array)
    {
        $sql="  SELECT 
                /*Problema y Problema Detalle*/
                p.id, tp.nombre AS problema_general, tpc.nombre tipo_problema,
                s.nombre AS sede, p.descripcion, p.created_at AS fecha_registro,
                ep.nombre AS estado_problema, pd.created_at fecha_atendio, pd.resultado,
                CONCAT(per.paterno,' ',per.materno,', ',per.nombre) persona, 
                CONCAT(perate.paterno,' ',perate.materno,', ',perate.nombre) persona_atendio,
                per.telefono, CURDATE() fecha_actual,
                /**************************************************************/
                /*Instituto*/
                i.nombre instituto, m.nombre modalidad,
                /**************************************************************/
                /*Alumno - Carrera*/
                a.paterno,a.materno,a.nombre,a.email,a.telefono,a.codigo,
                c.nombre carrera, e.nombre especialidad,
                /**************************************************************/
                /*Curso*/
                apnf.nota,
                /**************************************************************/
                /*Pago*/
                appf.pago,
                /**************************************************************/
                DATEDIFF(CURDATE(),DATE(p.created_at)) tiempo_transcurrido
                /**************************************************************/
                /*Tablas*/
                FROM problemas p
                JOIN personas per ON per.id=p.usuario_created_at
                JOIN tipo_problema tp ON tp.id=p.tipo_problema_id
                JOIN tipo_problema_categorias tpc ON tpc.id=p.categoria_tipo_problema_id
                JOIN sedes s ON s.id=p.sede_id
                JOIN problema_detalle pd ON p.id=pd.problema_id
                JOIN (SELECT MAX(id) AS id
                            FROM problema_detalle
                            WHERE estado=1
                            GROUP BY problema_id) pd2
                ON pd.id=pd2.id
                JOIN personas perate ON perate.id=pd.usuario_created_at
                JOIN estado_problema ep ON pd.estado_problema_id=ep.id
                /**************************************************************/
                /*Instituto*/
                JOIN institutos i ON i.id=p.instituto_id
                JOIN modalidades m ON m.id=i.modalidad_id
                /**************************************************************/
                /*Alumno - Carrera*/
                JOIN alumno_problema ap ON ap.problema_id=p.id
                JOIN alumnos a ON a.id=ap.alumno_id
                JOIN carreras c ON c.id=ap.carrera_id
                JOIN especialidades e ON e.id=ap.especialidad_id
                /**************************************************************/
                /*Curso*/
                JOIN (
                    SELECT apn.alumno_problema_id,GROUP_CONCAT( CONCAT_WS('|',apn.curso,apn.frecuencia,apn.profesor,apn.fecha_inicio,apn.fecha_fin,apn.nota) SEPARATOR '**') nota
                    FROM alumno_problema_nota apn
                    WHERE apn.estado=1
                    GROUP BY apn.alumno_problema_id
                ) apnf ON apnf.alumno_problema_id=ap.id
                /**************************************************************/
                /*Pago*/
                JOIN (
                    SELECT app.alumno_problema_id,GROUP_CONCAT( CONCAT_WS('|',app.fecha,app.recibo,app.monto) SEPARATOR '**') pago
                    FROM alumno_problema_pago app
                    WHERE app.estado=1
                    GROUP BY app.alumno_problema_id
                ) appf ON appf.alumno_problema_id=ap.id
                /**************************************************************/
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in (".$array['sede'].")
                ".$array['tipo']."
                ".$array['estado']." 
                ".$array['fecha'];
        $rsql= DB::select($sql);

        $length=array(
            5,20,26,40,
            15,15,15,25,25,
            11,15,15,15,25,15,
            17,11,20,15,15,10,
            15,10,10,25,15,15,
            25,15,15,
            15,15,15,40
        );
        $cabecera=array(
            'N°','Problema General','Tipo Problema','Descripción',
            'Sede','Instituto','Modalidad','Carrera','Especialidad',
            'Código','Paterno','Materno','Nombre','Email','Telefono',
            'Curso/Tema','Frencuencia','Profesor','Fecha Inicio','Fecha Fin','Nota',
            'Fecha Pago','Recibo','Monto','Persona-Trabajador','Telefono','Fecha Registro',
            'Persona-Atendio','Fecha Atención',
            'Fecha Actual','Tiempo Transcurrido','Estado Problema','Resultado'
        );
        $campos=array(
            '','problema_general','tipo_problema','descripcion',
            'sede','instituto','modalidad','carrera','especialidad',
            'codigo','paterno','materno','nombre','email','telefono',
            'nota',
            'pago','persona','telefono','fecha_registro',
            'persona_atendio','fecha_atendio',
            'fecha_actual','tiempo_transcurrido','estado_problema','resultado'
        );
        $r['data']=$rsql;
        $r['cabecera']=$cabecera;
        $r['campos']=$campos;
        $r['length']=$length;
        return $r;
    }

    public static function AcademicoInstituto($array)
    {
        $sql="  SELECT 
                /*Problema y Problema Detalle*/
                p.id, tp.nombre AS problema_general, tpc.nombre tipo_problema,
                s.nombre AS sede, p.descripcion, p.created_at AS fecha_registro,
                ep.nombre AS estado_problema, pd.created_at fecha_atendio, pd.resultado,
                CONCAT(per.paterno,' ',per.materno,', ',per.nombre) persona, 
                CONCAT(perate.paterno,' ',perate.materno,', ',perate.nombre) persona_atendio,
                per.telefono, CURDATE() fecha_actual,
                /**************************************************************/
                /*Instituto*/
                i.nombre instituto, m.nombre modalidad,
                /**************************************************************/
                /*Alumno - Carrera*/
                a.paterno,a.materno,a.nombre,a.email,a.telefono,a.codigo,
                c.nombre carrera, 
                /**************************************************************/
                /*Semestre - Alumno Problema*/
                IFNULL(s1.nombre,'') semestre_ini_id, IFNULL(s2.nombre,'') semestre_fin_id
                /**************************************************************/
                /*Pago*/
                appf.pago,
                /**************************************************************/
                DATEDIFF(CURDATE(),DATE(p.created_at)) tiempo_transcurrido
                /**************************************************************/
                /*Tablas*/
                FROM problemas p
                JOIN personas per ON per.id=p.usuario_created_at
                JOIN tipo_problema tp ON tp.id=p.tipo_problema_id
                JOIN tipo_problema_categorias tpc ON tpc.id=p.categoria_tipo_problema_id
                JOIN sedes s ON s.id=p.sede_id
                JOIN problema_detalle pd ON p.id=pd.problema_id
                JOIN (SELECT MAX(id) AS id
                            FROM problema_detalle
                            WHERE estado=1
                            GROUP BY problema_id) pd2
                ON pd.id=pd2.id
                JOIN personas perate ON perate.id=pd.usuario_created_at
                JOIN estado_problema ep ON pd.estado_problema_id=ep.id
                /**************************************************************/
                /*Instituto*/
                JOIN institutos i ON i.id=p.instituto_id
                JOIN modalidades m ON m.id=i.modalidad_id
                /**************************************************************/
                /*Alumno - Carrera*/
                JOIN alumno_problema ap ON ap.problema_id=p.id
                JOIN alumnos a ON a.id=ap.alumno_id
                JOIN carreras c ON c.id=ap.carrera_id
                /**************************************************************/
                /*Pago*/
                JOIN (
                    SELECT app.alumno_problema_id,GROUP_CONCAT( CONCAT_WS('|',app.fecha,app.recibo,app.monto) SEPARATOR '**') pago
                    FROM alumno_problema_pago app
                    WHERE app.estado=1
                    GROUP BY app.alumno_problema_id
                ) appf ON appf.alumno_problema_id=ap.id
                /**************************************************************/
                /*Semestre - Alumno Problema*/
                LEFT JOIN semestres s1 ON s1.id=ap.semestre_ini_id
                LEFT JOIN semestres s2 ON s2.id=ap.semestre_fin_id
                /**************************************************************/
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in (".$array['sede'].")
                ".$array['tipo']."
                ".$array['estado']." 
                ".$array['fecha'];
        $rsql= DB::select($sql);

        $length=array(
            5,20,26,40,
            15,15,15,25,
            15,15,
            11,15,15,15,25,15,
            15,10,10,25,15,15,
            25,15,15,
            15,15,15,40
        );
        $cabecera=array(
            'N°','Problema General','Tipo Problema','Descripción',
            'Sede','Instituto','Modalidad','Carrera',
            'Semestre Inicio','Semestre Final',
            'Código','Paterno','Materno','Nombre','Email','Telefono',
            'Fecha Pago','Recibo','Monto','Persona-Trabajador','Telefono','Fecha Registro',
            'Persona-Atendio','Fecha Atención',
            'Fecha Actual','Tiempo Transcurrido','Estado Problema','Resultado'
        );
        $campos=array(
            '','problema_general','tipo_problema','descripcion',
            'sede','instituto','modalidad','carrera',
            'semestre_ini_id','semestre_fin_id',
            'codigo','paterno','materno','nombre','email','telefono',
            'pago','persona','telefono','fecha_registro',
            'persona_atendio','fecha_atendio',
            'fecha_actual','tiempo_transcurrido','estado_problema','resultado'
        );
        $r['data']=$rsql;
        $r['cabecera']=$cabecera;
        $r['campos']=$campos;
        $r['length']=$length;
        return $r;
    }
}
