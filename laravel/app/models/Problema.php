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
        elseif( $datos['tipo']=='1' ){
            $r= Problema::AcademicoIntur($array);
        }
        elseif( $datos['tipo']=='14' ){
            $r= Problema::AcademicoUniversidad($array);
        }
        elseif( $datos['tipo']=='10' ){
            $r= Problema::Contabilidad($array);
        }
        elseif( $datos['tipo']=='5' ){
            $r= Problema::Legal($array);
        }
        elseif( $datos['tipo']=='6' ){
            $r= Problema::Logistica($array);
        }
        elseif( $datos['tipo']=='11' ){
            $r= Problema::Personal($array);
        }
        elseif( $datos['tipo']=='8' ){
            $r= Problema::Tesoreria($array);
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
            5,25,15,20,26,40,
            15,15,15,25,25,
            11,15,15,15,25,15,
            17,11,20,15,15,10,
            15,10,10,15,
            25,15,
            15,15,15,40
        );
        $cabecera=array(
            'N°','Persona que registró Problema','Telefono','Problema General','Tipo Problema','Descripción',
            'Sede','Instituto','Modalidad','Carrera','Especialidad',
            'Código','Paterno','Materno','Nombre','Email','Telefono',
            'Curso/Tema','Frencuencia','Profesor','Fecha Inicio','Fecha Fin','Nota',
            'Fecha Pago','Recibo','Monto','Fecha Registro',
            'Persona que atendió Problema','Fecha Atención',
            'Fecha Actual','Tiempo Transcurrido','Estado Problema','Resultado'
        );
        $campos=array(
            '','persona','telefono','problema_general','tipo_problema','descripcion',
            'sede','instituto','modalidad','carrera','especialidad',
            'codigo','paterno','materno','nombre','email','telefono',
            'nota',
            'pago','fecha_registro',
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
                IFNULL(s1.nombre,'') semestre_ini_id, IFNULL(s2.nombre,'') semestre_fin_id,
                /**************************************************************/
                /*Ciclo Semestre - Alumno Problema*/
                IFNULL(apcf.ciclosemestre,'||') ciclosemestre,
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
                /*Ciclo Semestre - Alumno Problema*/
                LEFT JOIN (
                    SELECT apc.alumno_problema_id,GROUP_CONCAT( CONCAT_WS('|',ci.nombre,cs1.nombre,cs2.nombre) SEPARATOR '**') ciclosemestre
                    FROM alumno_problema_cs apc 
                    JOIN semestres cs1 ON cs1.id=apc.semestre_ini_id
                    JOIN semestres cs2 ON cs2.id=apc.semestre_fin_id
                    JOIN ciclos ci ON ci.id=apc.ciclo_id
                    GROUP BY apc.alumno_problema_id
                ) apcf ON apcf.alumno_problema_id=ap.id
                /**************************************************************/
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in (".$array['sede'].")
                ".$array['tipo']."
                ".$array['estado']." 
                ".$array['fecha'];
        $rsql= DB::select($sql);

        $length=array(
            5,25,15,20,26,40,
            15,15,15,25,
            15,15,15,15,15,
            11,15,15,15,25,15,
            15,10,10,15,
            25,15,
            15,15,15,40
        );
        $cabecera=array(
            'N°','Persona que registró Problema','Telefono','Problema General','Tipo Problema','Descripción',
            'Sede','Instituto','Modalidad','Carrera',
            'Semestre Inicio','Semestre Final','Ciclo','Semestre Inicio del Ciclo','Semestre Final del Ciclo',
            'Código','Paterno','Materno','Nombre','Email','Telefono',
            'Fecha Pago','Recibo','Monto','Fecha Registro',
            'Persona que atendió Problema','Fecha Atención',
            'Fecha Actual','Tiempo Transcurrido','Estado Problema','Resultado'
        );
        $campos=array(
            '','persona','telefono','problema_general','tipo_problema','descripcion',
            'sede','instituto','modalidad','carrera',
            'semestre_ini_id','semestre_fin_id','ciclosemestre',
            'codigo','paterno','materno','nombre','email','telefono',
            'pago','fecha_registro',
            'persona_atendio','fecha_atendio',
            'fecha_actual','tiempo_transcurrido','estado_problema','resultado'
        );
        $r['data']=$rsql;
        $r['cabecera']=$cabecera;
        $r['campos']=$campos;
        $r['length']=$length;
        return $r;
    }

    public static function AcademicoIntur($array)
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
                ap.tema_seminario, ap.hora_seminario, ap.fecha_seminario,
                /**************************************************************/
                /*Curso*/
                IFNULL(apnf.nota,'|||||') nota,
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
                /*Curso*/
                LEFT JOIN (
                    SELECT apn.alumno_problema_id,GROUP_CONCAT( CONCAT_WS('|',apn.curso,apn.frecuencia,apn.profesor,apn.fecha_inicio,apn.fecha_fin,apn.nota) SEPARATOR '**') nota
                    FROM alumno_problema_nota apn
                    WHERE apn.estado=1
                    GROUP BY apn.alumno_problema_id
                ) apnf ON apnf.alumno_problema_id=ap.id
                /**************************************************************/
                LEFT JOIN especialidades e ON e.id=ap.especialidad_id
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in (".$array['sede'].")
                ".$array['tipo']."
                ".$array['estado']." 
                ".$array['fecha'];
        $rsql= DB::select($sql);

        $length=array(
            5,25,15,20,26,40,
            15,15,15,25,25,
            20,15,10,
            11,15,15,15,25,15,
            17,11,20,15,15,10,
            15,10,10,15,
            25,15,
            15,15,15,40
        );
        $cabecera=array(
            'N°','Persona que registró Problema','Telefono','Problema General','Tipo Problema','Descripción',
            'Sede','Instituto','Modalidad','Carrera','Especialidad',
            'Tema Seminario','Fecha Seminario','Hora Seminario',
            'Código','Paterno','Materno','Nombre','Email','Telefono',
            'Curso/Tema','Frencuencia','Profesor','Fecha Inicio','Fecha Fin','Nota',
            'Fecha Pago','Recibo','Monto','Fecha Registro',
            'Persona que atendió Problema','Fecha Atención',
            'Fecha Actual','Tiempo Transcurrido','Estado Problema','Resultado'
        );
        $campos=array(
            '','persona','telefono','problema_general','tipo_problema','descripcion',
            'sede','instituto','modalidad','carrera','especialidad',
            'tema_seminario','fecha_seminario','hora_seminario',
            'codigo','paterno','materno','nombre','email','telefono',
            'nota',
            'pago','fecha_registro',
            'persona_atendio','fecha_atendio',
            'fecha_actual','tiempo_transcurrido','estado_problema','resultado'
        );
        $r['data']=$rsql;
        $r['cabecera']=$cabecera;
        $r['campos']=$campos;
        $r['length']=$length;
        return $r;
    }

    public static function AcademicoUniversidad($array)
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
                ap.tema_seminario, ap.hora_seminario, ap.fecha_seminario,
                ap.diafalto, ap.ad_nota, IFNULL(ci.nombre, 
                    (SELECT GROUP_CONCAT(nombre)
                    FROM ciclos ci2
                    WHERE FIND_IN_SET(ci2.id,ap.ciclo_ids)>0
                    )
                ) ciclo,IFNULL(s1.nombre,s2.nombre) semestre,s3.nombre semestre_ini,s4.nombre semestre_fin,
                ap.cp_persona, ap.cp_instituto, ap.cp_cargo, ap.cp_area,
                /**************************************************************/
                /*Pago*/
                IFNULL(appf.pago,'||') pago,
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
                LEFT JOIN (
                    SELECT app.alumno_problema_id,GROUP_CONCAT( CONCAT_WS('|',app.fecha,app.recibo,app.monto) SEPARATOR '**') pago
                    FROM alumno_problema_pago app
                    WHERE app.estado=1
                    GROUP BY app.alumno_problema_id
                ) appf ON appf.alumno_problema_id=ap.id
                /**************************************************************/
                /*Especialidad*/
                LEFT JOIN especialidades e ON e.id=ap.especialidad_id
                /**************************************************************/
                /*Ciclos*/
                LEFT JOIN ciclos ci ON ci.id=ap.ciclo_id
                /**************************************************************/
                /*Semestres*/
                LEFT JOIN semestres s1 ON s1.id=ap.semestre_reserva_id
                LEFT JOIN semestres s2 ON s2.id=ap.semestre_reincorporarse_id
                LEFT JOIN semestres s3 ON s3.id=ap.semestre_ini_id
                LEFT JOIN semestres s4 ON s4.id=ap.semestre_fin_id
                /**************************************************************/
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in (".$array['sede'].")
                ".$array['tipo']."
                ".$array['estado']." 
                ".$array['fecha'];
        $rsql= DB::select($sql);

        $length=array(
            5,25,15,20,26,40,
            15,15,15,25,25,
            13,10,10,15,
            15,15,20,15,15,15,
            20,15,10,
            11,15,15,15,25,15,
            15,10,10,15,
            25,15,
            15,15,15,40
        );
        $cabecera=array(
            'N°','Persona que registró Problema','Telefono','Problema General','Tipo Problema','Descripción',
            'Sede','Instituto','Modalidad','Carrera','Especialidad',
            'Ciclo','Dias que Faltó','Nota','Semestre Reserva / Semestre Reincorporarse',
            'Semestre Inicio','Semestre Fin','Persona','Institución','Cargo','Área',
            'Tema Seminario','Fecha Seminario','Hora Seminario',
            'Código','Paterno','Materno','Nombre','Email','Telefono',
            'Fecha Pago','Recibo','Monto','Fecha Registro',
            'Persona que atendió Problema','Fecha Atención',
            'Fecha Actual','Tiempo Transcurrido','Estado Problema','Resultado'
        );
        $campos=array(
            '','persona','telefono','problema_general','tipo_problema','descripcion',
            'sede','instituto','modalidad','carrera','especialidad',
            'ciclo','diafalto','ad_nota','semestre',
            'semestre_ini','semestre_fin','cp_persona','cp_instituto','cp_cargo','cp_area',
            'tema_seminario','fecha_seminario','hora_seminario',
            'codigo','paterno','materno','nombre','email','telefono',
            'pago','fecha_registro',
            'persona_atendio','fecha_atendio',
            'fecha_actual','tiempo_transcurrido','estado_problema','resultado'
        );
        $r['data']=$rsql;
        $r['cabecera']=$cabecera;
        $r['campos']=$campos;
        $r['length']=$length;
        return $r;
    }

    public static function Contabilidad($array)
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
                /*Contabilidad*/
                pc.proveedor, pc.recibo, pc.fecha, pc.observacion,
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
                /*Contabilidad*/
                JOIN problema_contabilidad pc ON pc.problema_id=p.id
                /**************************************************************/
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in (".$array['sede'].")
                ".$array['tipo']."
                ".$array['estado']." 
                ".$array['fecha'];
        $rsql= DB::select($sql);

        $length=array(
            5,25,15,20,26,40,
            20,15,15,30,
            15,
            25,15,
            15,15,15,40
        );
        $cabecera=array(
            'N°','Persona que registró Problema','Telefono','Problema General','Tipo Problema','Descripción',
            'Proveedor','Recibo','Fecha de Notificación','Observación',
            'Fecha Registro',
            'Persona que atendió Problema','Fecha Atención',
            'Fecha Actual','Tiempo Transcurrido','Estado Problema','Resultado'
        );
        $campos=array(
            '','persona','telefono','problema_general','tipo_problema','descripcion',
            'proveedor','recibo','fecha','observacion',
            'fecha_registro',
            'persona_atendio','fecha_atendio',
            'fecha_actual','tiempo_transcurrido','estado_problema','resultado'
        );
        $r['data']=$rsql;
        $r['cabecera']=$cabecera;
        $r['campos']=$campos;
        $r['length']=$length;
        return $r;
    }

    public static function Legal($array)
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
                /*Legal*/
                e.nombre empresa,pl.observacion,pl.fecha,pl.entidad,
                li.nombre licencia,mu.nombre municipal, ar.nombre servicio,
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
                /*Contabilidad*/
                JOIN problema_legal pl ON pl.problema_id=p.id
                /**************************************************************/
                /*Empresas*/
                JOIN empresas e ON e.id=pl.razon_id
                /**************************************************************/
                /*Licencia*/
                LEFT JOIN licencias li ON li.id=pl.licencia_id
                /**************************************************************/
                /*Municipal*/
                LEFT JOIN municipalidades mu ON mu.id=pl.municipal_id
                /**************************************************************/
                /*Articulo*/
                LEFT JOIN articulos ar ON ar.id=pl.articulo_id
                /**************************************************************/
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in (".$array['sede'].")
                ".$array['tipo']."
                ".$array['estado']." 
                ".$array['fecha'];
        $rsql= DB::select($sql);

        $length=array(
            5,25,15,20,26,40,
            20,30,15,20,
            15,15,15,
            15,
            25,15,
            15,15,15,40
        );
        $cabecera=array(
            'N°','Persona que registró Problema','Telefono','Problema General','Tipo Problema','Descripción',
            'Empresa','Observación','Fecha de Notificación','Entidad',
            'Licencia','Municipal','Servicio',
            'Fecha Registro',
            'Persona que atendió Problema','Fecha Atención',
            'Fecha Actual','Tiempo Transcurrido','Estado Problema','Resultado'
        );
        $campos=array(
            '','persona','telefono','problema_general','tipo_problema','descripcion',
            'empresa','observacion','fecha','entidad',
            'licencia','municipal','servicio',
            'fecha_registro',
            'persona_atendio','fecha_atendio',
            'fecha_actual','tiempo_transcurrido','estado_problema','resultado'
        );
        $r['data']=$rsql;
        $r['cabecera']=$cabecera;
        $r['campos']=$campos;
        $r['length']=$length;
        return $r;
    }

    public static function Logistica($array)
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
                /*Logistica*/
                IF(pl.tipo_moneda=1,'Soles',
                    IF(pl.tipo_moneda=2,'Dolares','')
                ) tipo_moneda,
                IF(pl.tipo_telefono=1,'Movil',
                    IF(pl.tipo_telefono=2,'Fijo','')
                ) tipo_telefono,
                pl.arrendador,pl.empresa,pl.ruc,pl.telefono telefono_pl,
                pl.observacion,pl.direccion,pl.personal_contacto,pl.telefono_contacto,
                pl.plazo,pl.tipo_multa,pl.tipo_impuesto,pl.recibo,pl.nro_suministro,
                pl.monto,pl.tipo_comprobante,pl.nro_comprobante,
                pl.operador,pl.cantidad,pl.medida,pl.fecha fecha_entrega,pl.autorizo,
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
                /*Logistica*/
                JOIN problema_logistica pl ON pl.problema_id=p.id
                /**************************************************************/
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in (".$array['sede'].")
                ".$array['tipo']."
                ".$array['estado']." 
                ".$array['fecha'];
        $rsql= DB::select($sql);

        $length=array(
            5,25,15,20,26,40,
            20,15,20,15,15,30,
            25,15,15,15,
            15,15,15,15,10,
            15,15,15,
            15,15,10,15,15,
            15,
            25,15,
            15,15,15,40
        );
        $cabecera=array(
            'N°','Persona que registró Problema','Telefono','Problema General','Tipo Problema','Descripción',
            'Arrendador','Tipo Moneda','Empresa','RUC','Teléfono','Observación',
            'Dirección','Personal Contacto','Teléfono Personal Contacto','Plazo ejecución del Servicio',
            'Tipo Multa','Tipo Impuesto','Nro Recibo','Nro Suministro','Monto',
            'Tipo Comprobante','Nro Comprobante','Persona que Autorizó',
            'Tipo Teléfono','Operador','Cantidad','Unidad de Medida','Fecha estimada de entrega',
            'Fecha Registro',
            'Persona que atendió Problema','Fecha Atención',
            'Fecha Actual','Tiempo Transcurrido','Estado Problema','Resultado'
        );
        $campos=array(
            '','persona','telefono','problema_general','tipo_problema','descripcion',
            'arrendador','tipo_moneda','empresa','ruc','telefono_pl','observacion',
            'direccion','personal_contacto','telefono_contacto','plazo',
            'tipo_multa','tipo_impuesto','recibo','nro_suministro','monto',
            'tipo_comprobante','nro_comprobante','autorizo',
            'tipo_telefono','operador','cantidad','medida','fecha_entrega',
            'fecha_registro',
            'persona_atendio','fecha_atendio',
            'fecha_actual','tiempo_transcurrido','estado_problema','resultado'
        );
        $r['data']=$rsql;
        $r['cabecera']=$cabecera;
        $r['campos']=$campos;
        $r['length']=$length;
        return $r;
    }

    public static function Personal($array)
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
                /*Personal*/
                a.nombre area,pp.jefe,pp.motivo,pp.solicita,pp.fecha,
                CONCAT(pe.paterno,' ',pe.materno,', ',pe.nombre) persona_personal, 
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
                /*Personal*/
                JOIN problema_personal pp ON pp.problema_id=p.id
                /**************************************************************/
                /*Areas*/
                LEFT JOIN areas a ON a.id=pp.area_id
                /**************************************************************/
                /*Personas*/
                LEFT JOIN personas pe ON pe.id=pp.persona_id
                /**************************************************************/
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in (".$array['sede'].")
                ".$array['tipo']."
                ".$array['estado']." 
                ".$array['fecha'];
        $rsql= DB::select($sql);

        $length=array(
            5,25,15,20,26,40,
            20,15,20,20,30,15,
            15,
            25,15,
            15,15,15,40
        );
        $cabecera=array(
            'N°','Persona que registró Problema','Telefono','Problema General','Tipo Problema','Descripción',
            'Persona','Área','Jefe','Motivo','Que solicita','Fecha',
            'Fecha Registro',
            'Persona que atendió Problema','Fecha Atención',
            'Fecha Actual','Tiempo Transcurrido','Estado Problema','Resultado'
        );
        $campos=array(
            '','persona','telefono','problema_general','tipo_problema','descripcion',
            'persona_personal','area','jefe','motivo','solicita','fecha',
            'fecha_registro',
            'persona_atendio','fecha_atendio',
            'fecha_actual','tiempo_transcurrido','estado_problema','resultado'
        );
        $r['data']=$rsql;
        $r['cabecera']=$cabecera;
        $r['campos']=$campos;
        $r['length']=$length;
        return $r;
    }

    public static function Tesoreria($array)
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
                /*Tesoreria*/
                pt.contrato,pt.gana,pt.autorizo,pt.mes,pt.nrocta,pt.banco,
                pt.para,pt.area,pt.ode,pt.cajero,pt.empresa,pt.cantidad,
                pt.ultboleta,pt.enviar,pt.fecha,pt.adicional,
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
                /*Tesoreria*/
                JOIN problema_tesoreria pt ON pt.problema_id=p.id
                /**************************************************************/
                WHERE p.estado=1 AND pd.estado=1 
                AND p.sede_id in (".$array['sede'].")
                ".$array['tipo']."
                ".$array['estado']." 
                ".$array['fecha'];
        $rsql= DB::select($sql);

        $length=array(
            5,25,15,20,26,40,
            20,15,20,
            15,15,15,
            20,15,15,20,20,10,
            15,15,15,30,
            15,
            25,15,
            15,15,15,40
        );
        $cabecera=array(
            'N°','Persona que registró Problema','Telefono','Problema General','Tipo Problema','Descripción',
            'Persona que Contrató','Cuanto gana','Persona que Autorizó',
            'Mes que se debe','Nro cuenta','Nombre Banco',
            'Para','Área','Ode Solicitante','Nombre Cajero','Empresa','Cantidad',
            'Nro Última boleta de venta','Enviar por','Fecha y Hora aproximado de envio','Información Adicional',
            'Fecha Registro',
            'Persona que atendió Problema','Fecha Atención',
            'Fecha Actual','Tiempo Transcurrido','Estado Problema','Resultado'
        );
        $campos=array(
            '','persona','telefono','problema_general','tipo_problema','descripcion',
            'contrato','gana','autorizo',
            'mes','nrocta','banco',
            'para','area','ode','cajero','empresa','cantidad',
            'ultboleta','enviar','fecha','adicional',
            'fecha_registro',
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
