<?php
/*use Cuadrop\Problema\ProblemaRepoInterface;
use Cuadrop\ProblemaDetalle\ProblemaDetalleRepoInterface;
use Cuadrop\AlumnoProblema\AlumnoProblemaRepoInterface;*/

class ReporteController extends BaseController
{
    /*protected $problemaRepo;
    protected $problemaDetalleRepo;
    protected $alumnoProblemaRepo;
    public function __construct(ProblemaRepoInterface $problemaRepo,
                            ProblemaDetalleRepoInterface $problemaDetalleRepo,
                            AlumnoProblemaRepoInterface $alumnoProblemaRepo
    )
    {
        $this->problemaRepo = $problemaRepo;
        $this->problemaDetalleRepo = $problemaDetalleRepo;
        $this->alumnoProblemaRepo = $alumnoProblemaRepo;
    }*/
    /**
     * cargar problemas
     * solucionar_problema/cargar
     * @return Response
     */
    public function postListadoproblema()
    {
        /***********************************************************************/
        $datos=array();
        $datos['sede'] = Input::get('slct_sede', array('0'));
        $datos['tipo'] = Input::get('slct_tipo_problema', array('0'));

        if ( Input::has('slct_estado') ){
            $datos['estado'] = Input::get('slct_estado');
        }

        if ( Input::has('txt_fecha_ini') and Input::has('txt_fecha_fin') ){
            $datos['fecha_ini'] = Input::get('txt_fecha_ini');
            $datos['fecha_fin'] = Input::get('txt_fecha_fin');
        }

        $datos['sede'] = ($datos['sede']=='') ? array('0') : $datos['sede'] ;
        $datos['tipo'] = ($datos['tipo']=='') ? array('0') : $datos['tipo'] ;

        $problemas = Problema::ListadoProblema($datos);
        /***********************************************************************/
        
        $az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD',
        'AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE',
        'BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF',
        'CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG',
        'DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
        $azcount=array(5,17,21,40,12,18.5,18.5,18.5,40,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,
            15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,
            15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,
            15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,
            15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15);

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()
                    ->setCreator("Jorge Salcedo")
                    ->setLastModifiedBy("Jorge Salcedo")
                    ->setTitle("Office 2007 XLSX Test Document")
                    ->setSubject("Office 2007 XLSX Test Document")
                    ->setDescription("Reporte de Problemas")
                    ->setKeywords("office 2007 openxml php")
                    ->setCategory("Test result file");

        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

        //$objPHPExcel->getActiveSheet()->setCellValue("A1",$problemas);
        $objPHPExcel->getActiveSheet()->setCellValue("A2","REPORTE DE PROBLEMAS");
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
        $objPHPExcel->getActiveSheet()->mergeCells('A2:M2');
        $objPHPExcel->getActiveSheet()->getStyle('A2:M2')->applyFromArray( Config::get("excel.styleAlignmentBold") );

        $cabecera=array('N°','Sede','Tipo Problema','Descripción','Estado Problema','Fecha Problema','Fecha Registro','Fecha Estado','Resultado',
                            'Paterno','Materno','Nombre','Email','Telefono','Carrera','Tipo Carrera','Ciclo','Documento','Observación',
                            'Curso Nota','Frencuencia','Profesor','Fecha Inicio','Fecha Fin','Nota',
                            'Curso Pago','Recibo','Monto'
                        );

        for($i=0;$i<count($cabecera);$i++){
        $objPHPExcel->getActiveSheet()->setCellValue($az[$i]."4",$cabecera[$i]);
        $objPHPExcel->getActiveSheet()->getStyle($az[$i]."4")->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension($az[$i])->setWidth($azcount[$i]);
        }

        $objPHPExcel->getActiveSheet()->getStyle('A4:'.$az[($i-1)].'4')->applyFromArray( Config::get("excel.styleAlignmentBold") );
        $objPHPExcel->getActiveSheet()->getStyle("A4:".$az[($i-1)]."4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

        $valorinicial=4;
        $cont=0;
        $azpos=0;
        $azposfin=0;

        foreach($problemas as $r){
            $cont++;
            $valorinicial++;
            $azpos=0;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$cont);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->sede);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->tipo_problema);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->descripcion);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->estado_problema);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->fecha_problema);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->fecha_registro);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->fecha_estado);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->resultado);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->paterno);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->materno);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->nombre);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->email);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->telefono);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->carrera);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->tipo_carrera);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->ciclo);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->documento);$azpos++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$r->observacion);$azpos++;

            $nota=explode('**',$r->nota);
            $detallenota=array();
            for( $i=0;$i<count($nota);$i++ ){
                $dnota=explode("|",$nota[$i]);
                for( $j=0;$j<count($dnota);$j++ ){
                    if($i==0){
                        $detallenota[]='';
                    }
                    $detallenota[$j].=$dnota[$j]."\n";
                }
            }

            for( $i=0;$i<count($detallenota);$i++ ){
                $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$detallenota[$i]);
                $objPHPExcel->getActiveSheet()->getStyle($az[$azpos].$valorinicial)->getAlignment()->setWrapText(true);$azpos++;
            }

            $pago=explode('**',$r->pago);
            $detallepago=array();
            for( $i=0;$i<count($pago);$i++ ){
                $dpago=explode("|",$pago[$i]);
                for( $j=0;$j<count($dpago);$j++ ){
                    if($i==0){
                        $detallepago[]='';
                    }
                    $detallepago[$j].=$dpago[$j]."\n";
                }
            }

            for( $i=0;$i<count($detallepago);$i++ ){
                $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$detallepago[$i]);
                $objPHPExcel->getActiveSheet()->getStyle($az[$azpos].$valorinicial)->getAlignment()->setWrapText(true);$azpos++;
            }
            

            if( $cont==1 ){
                $azposfin=$azpos-1;
            }
        }

        $objPHPExcel->getActiveSheet()->getStyle('A4:AB'.$valorinicial)->applyFromArray( Config::get("excel.styleThinBlackBorderAllborders") );
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $objPHPExcel->getActiveSheet()->setTitle('Reporte_Problemas');
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a client's web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte_Problemas_'.date("Y-m-d_H-i-s").'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function postListadoproblema2()
    {
        $az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD',
        'AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE',
        'BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF',
        'CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG',
        'DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()
                    ->setCreator("Jorge Salcedo")
                    ->setLastModifiedBy("Jorge Salcedo")
                    ->setTitle("Office 2007 XLSX Test Document")
                    ->setSubject("Office 2007 XLSX Test Document")
                    ->setDescription("Reporte de Problemas")
                    ->setKeywords("office 2007 openxml php")
                    ->setCategory("Test result file");

        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

        //$objPHPExcel->getActiveSheet()->setCellValue("A1",$problemas);
        $objPHPExcel->getActiveSheet()->setCellValue("A2","REPORTE DE PROBLEMAS");
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
        $objPHPExcel->getActiveSheet()->mergeCells('A2:M2');
        $objPHPExcel->getActiveSheet()->getStyle('A2:M2')->applyFromArray( Config::get("excel.styleAlignmentBold") );
        /***********************************************************************/
        $datos=array();
        $datos['sede'] = Input::get('slct_sede', array('0'));
        $datos['tipo'] = Input::get('slct_tipo_reporte');
        //$datos['tipo'] = Input::get('slct_tipo_problema', array('0'));

        if ( Input::has('slct_estado') ){
            $datos['estado'] = Input::get('slct_estado');
        }

        if ( Input::has('txt_fecha_ini') and Input::has('txt_fecha_fin') ){
            $datos['fecha_ini'] = Input::get('txt_fecha_ini');
            $datos['fecha_fin'] = Input::get('txt_fecha_fin');
        }

        $datos['sede'] = ($datos['sede']=='') ? array('0') : $datos['sede'] ;

        $r = Problema::ListadoProblema2($datos);
        /***********************************************************************/
        $data=$r['data'];
        $cabecera=$r['cabecera'];
        $campos=$r['campos'];
        $length=$r['length'];

        for($i=0;$i<count($cabecera);$i++){
            $objPHPExcel->getActiveSheet()->setCellValue($az[$i]."4",$cabecera[$i]);
            $objPHPExcel->getActiveSheet()->getStyle($az[$i]."4")->getAlignment()->setWrapText(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension($az[$i])->setWidth($length[$i]);
        }

        $objPHPExcel->getActiveSheet()->getStyle('A4:'.$az[($i-1)].'4')->applyFromArray( Config::get("excel.styleAlignmentBold") );
        $objPHPExcel->getActiveSheet()->getStyle("A4:".$az[($i-1)]."4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

        $valorinicial=4;
        $cont=0;
        $azpos=0;
        $azposfin=0;
        $data=json_decode(json_encode($data), true);

        foreach($data as $row){
            $cont++;
            $valorinicial++;
            $azpos=0;

            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$cont);$azpos++;

            for ($i=1; $i < count($campos); $i++) { 
                if($campos[$i]=='tiempo_transcurrido'){
                    $tt="";
                    if($row[$campos[$i]]>7 AND $row[$campos[$i]]%7==0){
                        $tt=floor($row[$campos[$i]]/7)." Sem";
                    }
                    elseif($row[$campos[$i]]>7 AND $row[$campos[$i]]%7!=0){
                        $tt=floor($row[$campos[$i]]/7)." Sem y ".($row[$campos[$i]]%7)." Dia(s)";
                    }
                    else{
                        $tt=($row[$campos[$i]]&7)."Dia(s)";
                    }
                    $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$tt);$azpos++;
                }
                elseif($campos[$i]=='nota'){
                    $nota=explode('**',$row[$campos[$i]]);
                    $detallenota=array();
                    for( $j=0;$j<count($nota);$j++ ){
                        $dnota=explode("|",$nota[$j]);
                        for( $k=0;$k<count($dnota);$k++ ){
                            if($j==0){
                                $detallenota[]='';
                            }
                            $detallenota[$k].=$dnota[$k]."\n";
                        }
                    }

                    for( $j=0;$j<count($detallenota);$j++ ){
                        $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$detallenota[$j]);
                        $objPHPExcel->getActiveSheet()->getStyle($az[$azpos].$valorinicial)->getAlignment()->setWrapText(true);$azpos++;
                    }
                }
                elseif($campos[$i]=='pago'){
                    $pago=explode('**',$row[$campos[$i]]);
                    $detallepago=array();
                    for( $j=0;$j<count($pago);$j++ ){
                        $dpago=explode("|",$pago[$j]);
                        for( $k=0;$k<count($dpago);$k++ ){
                            if($j==0){
                                $detallepago[]='';
                            }
                            $detallepago[$k].=$dpago[$k]."\n";
                        }
                    }

                    for( $j=0;$j<count($detallepago);$j++ ){
                        $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$detallepago[$j]);
                        $objPHPExcel->getActiveSheet()->getStyle($az[$azpos].$valorinicial)->getAlignment()->setWrapText(true);$azpos++;
                    }
                }
                else{
                    if( ($campos[$i]=='persona_atendio' OR $campos[$i]=='fecha_atendio') AND $row['estado_problema']=='En espera' ){
                        $row[$campos[$i]]="";
                    }
                    $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$row[$campos[$i]]);$azpos++;
                }
            }

            if( $cont==1 ){
                $azposfin=$azpos-1;
            }
        }

        $objPHPExcel->getActiveSheet()->getStyle('A4:'.$az[count($cabecera)-1].$valorinicial)->applyFromArray( Config::get("excel.styleThinBlackBorderAllborders") );
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $objPHPExcel->getActiveSheet()->setTitle('Reporte_Problemas');
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a client's web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte_Problemas_'.date("Y-m-d_H-i-s").'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
}
