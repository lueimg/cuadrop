<?php
use Cuadrop\Problema\ProblemaRepoInterface;
use Cuadrop\ProblemaDetalle\ProblemaDetalleRepoInterface;
use Cuadrop\AlumnoProblema\AlumnoProblemaRepoInterface;
use Cuadrop\AlumnoProblema\AlumnoProblemaPago;

class RegistrarProblemaController extends BaseController
{
    protected $_rules = array(
        'tipo_problema_id'  => 'required|numeric',
        'sede_id'           => 'required|numeric',
    );
    protected $_mensaje= array(
        'required'    => ':attribute Es requerido',
        'regex'        => ':attribute Solo debe ser Texto',
        'exists'       => ':attribute ya existe',
        'numeric'       => ':attribute Seleccione',
    );
    protected $problemaRepo;
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
    }
    public function postCargar()
    {
        if ( Request::ajax() ) {
            $problemas = $this->problemaRepo->getProblema();
            return Response::json(array('rst'=>1,'datos'=>$problemas));
        }
    }
    /**
     * $file  valor que se recive del frontend
     * $id
     * $url  url para guardar en el backend
     */
    public function fileToFile($file,$id, $url){
        if ( !is_dir('upload') ) {
            mkdir('upload',0777);
        }
        if ( !is_dir('upload/'.$id) ) {
            mkdir('upload/'.$id,0777);
        }
        list($type, $file) = explode(';', $file);
        list(, $type) = explode('/', $type);
        if ($type=='jpeg') $type='jpg';
        if (strpos($type,'document')!==False) $type='docx';
        if (strpos($type, 'sheet') !== False) $type='xlsx';
        if ($type=='plain') $type='txt';
        list(, $file)      = explode(',', $file);
        $file = base64_decode($file);
        file_put_contents($url.$type , $file);
        return $url. $type;
    }
    /**
     * nuevo problema
     *
     * @return Response
     */
    public function postCreate()
    {
        $data = Input::all();// dd($data);
        $row['usuario_created_at']=$data['usuario_created_at'] = Auth::user()->id;
        $validator = Validator::make($data, $this->_rules, $this->_mensaje);
        if ( $validator->passes() ) {
            //crear problema
            $id = Auth::id();
            $problema = $this->problemaRepo->create($data);
            $data['estado_problema_id'] = 1;
            $data['problema_id'] = $problema_id=$problema->id;
            $data['resultado'] = '';
            $data['fecha_estado'] = $problema->fecha_problema;
            //crear articulos
            if (Input::has('articulos_selec')) {
                $articulos_selec=Input::get('articulos_selec');
                $articulos_selec = explode(",", $articulos_selec);
                //relacionar cantidad y descripcion con el articulo que corresponde
                //dd($articulos_selec);
                foreach ($articulos_selec as $key => $value) {
                    $cantidad = Input::get('cantidad'.$value);
                    $descripcion = Input::get('descripcion'.$value);
                    $articulo[$value] = [
                        'cantidad'=>$cantidad,
                        'descripcion'=>$descripcion
                    ];
                }
                $problema->articulos()->sync($articulo);
            }
            //crear detalle
            $problemaDetalle = $this->problemaDetalleRepo->create($data);
            //crear archivos
            if (Input::has('archivos_length') && Input::get('archivos_length')>0) {
                $length=Input::get('archivos_length');
                $archivos=[];
                $nombre = Input::get('nombre');
                $file = Input::get('archivo');
                for ($i=0; $i < $length; $i++) {
                    $url = "upload/$problema->id/archivo".$i.'.';
                    $ruta_archivo = $this->fileToFile($file[$i], $problema->id, $url);
                    $archivo =new Archivo( [
                        'nombre_archivo'=>$nombre[$i],
                        'ruta_archivo'=>$ruta_archivo,
                        'usuario_created_at'=>$id,
                        'problema_id'=>$problema->id
                    ]);
                    array_push($archivos, $archivo);
                }
                $problema->archivos()->saveMany($archivos);
            }
            //crear alumnopoblema
            if (!Input::has('carrera_id') )
                $data['carrera_id'] = Null;
            if (!Input::has('ciclo_id') )
                $data['ciclo_id'] = Null;
            if (Input::has('alumno_id')) {
                //crear alumno problema
                $alumnoProblema = $this->alumnoProblemaRepo->create($data);
                $row['alumno_problema_id']=$alumnoProblema->id;
                if (Input::has('nro_cursos') && Input::get('nro_cursos')>0) {
                    for ($i=0; $i < Input::get('nro_cursos'); $i++) {
                        $row['curso'] = Input::get('tc_curso')[$i];
                        $row['frecuencia'] = Input::get('tc_frecuencia')[$i];
                        $row['hora'] = Input::get('tc_hora')[$i];
                        $row['profesor'] = Input::get('tc_profesor')[$i];
                        $row['fecha_inicio'] = Input::get('tc_fecha_ini')[$i];
                        $row['fecha_fin'] = Input::get('tc_fecha_fin')[$i];
                        $row['nota'] = Input::get('tc_nota')[$i];
                        $row['curso'] = Input::get('tc_curso')[$i];
                        $row['frecuencia'] = Input::get('tc_frecuencia')[$i];
                        $row['hora'] = Input::get('tc_hora')[$i];
                        $row['profesor'] = Input::get('tc_profesor')[$i];
                        $row['fecha_ini'] = Input::get('tc_fecha_ini')[$i];
                        $row['fecha_fin'] = Input::get('tc_fecha_fin')[$i];
                        $row['nota'] = Input::get('tc_nota')[$i];
                        $this->alumnoProblemaRepo->createAlumnoProblemaNota($row);
                    }
                }
                if (Input::has('nro_pagos') && Input::get('nro_pagos')>0) {
                    $alumnoProbPagos=[];
                    $file = Input::get('pago_archivo');
                    for ($i=0; $i < Input::get('nro_pagos'); $i++) {
                        
                        $url = "upload/$problema->id/pago".$i.'.';
                        $ruta_archivo = $this->fileToFile($file[$i], $problema->id, $url);
                        $alumnoProbPago =new AlumnoProblemaPago( [
                            'fecha' => Input::get('tp_fecha')[$i],
                            'recibo' => Input::get('tp_recibo')[$i],
                            'monto' => Input::get('tp_monto')[$i],
                            'ruta_archivo' => $ruta_archivo,
                            'usuario_created_at'=>$id,
                            'alumno_problema_id'=>$alumnoProblema->id
                        ]);
                        array_push($alumnoProbPagos, $alumnoProbPago);
                    }
                    $alumnoProblema->alumnoProbPagos()->saveMany($alumnoProbPagos);
                }
            }

            $rst=1;
            $msj='Registro actualizado correctamente';
        } else {
            $problema_id=null;
            $rst=2;
            $msj=$validator->messages();
        }
        return Response::json(
            array(
                    'rst'=>$rst,
                    'msj'=>$msj,
                    'problemaId'=>$problema_id,
                )
        );
    }

    public function postCrear()
    {
        $data = Input::all();// dd($data);
        $row['usuario_created_at']=$data['usuario_created_at'] = Auth::user()->id;
        $validator = Validator::make($data, $this->_rules, $this->_mensaje);
        $problema_id=null;
        if ( $validator->passes() ) {
            DB::beginTransaction();
        //********************************Problema******************************
            $id = Auth::id();
            $problema = $this->problemaRepo->create($data);
            $data['estado_problema_id'] = 1;
            $data['problema_id'] = $problema_id=$problema->id;
            $data['resultado'] = '';
            $data['fecha_estado'] = $problema->fecha_problema;
        //**********************************************************************
        //****************************Detalle Problema**************************
            $problemaDetalle = $this->problemaDetalleRepo->create($data);
        //**********************************************************************
        //*********************************Personal*****************************
        if ( Input::has('pe_area_id') || Input::has('pe_jefe') || Input::has('persona_id') || Input::has('pe_motivo') || Input::has('pe_solicita') || Input::has('pe_fecha') ) {   
            $personal=new ProblemaPersonal;
            $personal['problema_id']=$problema->id;
            $personal['usuario_created_at']=$id;
            if ( Input::has('pe_area_id') )
                $personal['area_id']=Input::get('pe_area_id');
            if ( Input::has('pe_jefe') )
                $personal['jefe']=Input::get('pe_jefe');
            if ( Input::has('persona_id') )
                $personal['persona_id']=Input::get('persona_id');
            if ( Input::has('pe_motivo') )
                $personal['motivo']=Input::get('pe_motivo');
            if ( Input::has('pe_solicita') )
                $personal['solicita']=Input::get('pe_solicita');
            if ( Input::has('pe_fecha') )
                $personal['fecha']=Input::get('pe_fecha');
            $personal->save();
        }
        //**********************************************************************
        //*********************************Legal********************************
        if ( Input::has('le_observacion') ) {   
            $problemaLegal=new ProblemaLegal;
            $problemaLegal['problema_id']=$problema->id;
            $problemaLegal['usuario_created_at']=$id;
            if ( Input::has('le_razon_id') )
                $problemaLegal['razon_id']=Input::get('le_razon_id');
            if ( Input::has('le_observacion') )
                $problemaLegal['observacion']=Input::get('le_observacion');
            if ( Input::has('le_licencia_id') )
                $problemaLegal['licencia_id']=Input::get('le_licencia_id');
            if ( Input::has('le_municipal_id') )
                $problemaLegal['municipal_id']=Input::get('le_municipal_id');
            if ( Input::has('le_articulo_id') )
                $problemaLegal['articulo_id']=Input::get('le_articulo_id');
            if ( Input::has('le_fecha') )
                $problemaLegal['fecha']=Input::get('le_fecha');
            if ( Input::has('le_entidad') )
                $problemaLegal['entidad']=Input::get('le_entidad');
            if ( Input::has('persona_id') )
                $problemaLegal['persona_id']=Input::get('persona_id');
            $problemaLegal->save();
        }
        //**********************************************************************
        //*****************************Contabilidad*****************************
        if ( Input::has('co_observacion') || Input::has('co_proveedor') ) {   
            $problemaConta=new ProblemaContabilidad;
            $problemaConta['problema_id']=$problema->id;
            $problemaConta['usuario_created_at']=$id;
            if ( Input::has('co_proveedor') )
                $problemaConta['proveedor']=Input::get('co_proveedor');
            if ( Input::has('co_observacion') )
                $problemaConta['observacion']=Input::get('co_observacion');
            if ( Input::has('co_recibo') )
                $problemaConta['recibo']=Input::get('co_recibo');
            if ( Input::has('co_fecha') )
                $problemaConta['fecha']=Input::get('co_fecha');
            $problemaConta->save();
        }
        //**********************************************************************
        //*****************************Logística********************************
        if ( Input::has('log_id') ) {   
            $problemaLog=new ProblemaLogistica;
            $problemaLog['problema_id']=$problema->id;
            $problemaLog['usuario_created_at']=$id;
            if ( Input::has('log_arrendador') )
                $problemaLog['arrendador']=Input::get('log_arrendador');
            if ( Input::has('log_moneda') )
                $problemaLog['tipo_moneda']=Input::get('log_moneda');
            if ( Input::has('log_empresa') )
                $problemaLog['empresa']=Input::get('log_empresa');
            if ( Input::has('log_ruc') )
                $problemaLog['ruc']=Input::get('log_ruc');
            if ( Input::has('log_telefono') )
                $problemaLog['telefono']=Input::get('log_telefono');
            if ( Input::has('log_observacion') )
                $problemaLog['observacion']=Input::get('log_observacion');
            if ( Input::has('log_direccion') )
                $problemaLog['direccion']=Input::get('log_direccion');
            if ( Input::has('log_personal') )
                $problemaLog['personal_contacto']=Input::get('log_personal');
            if ( Input::has('log_telpersonal') )
                $problemaLog['telefono_contacto']=Input::get('log_telpersonal');
            if ( Input::has('log_plazo') )
                $problemaLog['plazo']=Input::get('log_plazo');
            if ( Input::has('log_multa') )
                $problemaLog['tipo_multa']=Input::get('log_multa');
            if ( Input::has('log_impuesto') )
                $problemaLog['tipo_impuesto']=Input::get('log_impuesto');
            if ( Input::has('log_recibo') )
                $problemaLog['recibo']=Input::get('log_recibo');
            if ( Input::has('log_suministro') )
                $problemaLog['nro_suministro']=Input::get('log_suministro');
            if ( Input::has('log_monto') )
                $problemaLog['monto']=Input::get('log_monto');
            if ( Input::has('log_comprobante') )
                $problemaLog['tipo_comprobante']=Input::get('log_comprobante');
            if ( Input::has('log_nrocomprobante') )
                $problemaLog['nro_comprobante']=Input::get('log_nrocomprobante');
            if ( Input::has('log_autorizo') )
                $problemaLog['autorizo']=Input::get('log_autorizo');
            if ( Input::has('log_tipotelefono') )
                $problemaLog['tipo_telefono']=Input::get('log_tipotelefono');
            if ( Input::has('log_operador') )
                $problemaLog['operador']=Input::get('log_operador');
            if ( Input::has('log_cantidad') )
                $problemaLog['cantidad']=Input::get('log_cantidad');
            if ( Input::has('log_medida') )
                $problemaLog['medida']=Input::get('log_medida');
            if ( Input::has('log_fecha') )
                $problemaLog['fecha']=Input::get('log_fecha');
            $problemaLog->save();
        }
        //**********************************************************************
        //*****************************Tesorería********************************
        if ( Input::has('te_id') ) {   
            $problemaTesoreria=new ProblemaTesoreria;
            $problemaTesoreria['problema_id']=$problema->id;
            $problemaTesoreria['usuario_created_at']=$id;
            if ( Input::has('te_contrato') )
                $problemaTesoreria['contrato']=Input::get('te_contrato');
            if ( Input::has('te_gana') )
                $problemaTesoreria['gana']=Input::get('te_gana');
            if ( Input::has('te_autorizo') )
                $problemaTesoreria['autorizo']=Input::get('te_autorizo');
            if ( Input::has('te_mes') )
                $problemaTesoreria['mes']=Input::get('te_mes');
            if ( Input::has('te_nrocta') )
                $problemaTesoreria['nrocta']=Input::get('te_nrocta');
            if ( Input::has('te_banco') )
                $problemaTesoreria['banco']=Input::get('te_banco');
            $problemaTesoreria->save();
        }
        //**********************************************************************
        //*****************************Tesorería2********************************
        if ( Input::has('te2_id') ) {   
            $problemaTesoreria=new ProblemaTesoreria;
            $problemaTesoreria['problema_id']=$problema->id;
            $problemaTesoreria['usuario_created_at']=$id;
            if ( Input::has('te2_para') )
                $problemaTesoreria['para']=Input::get('te2_para');
            if ( Input::has('te2_area') )
                $problemaTesoreria['area']=Input::get('te2_area');
            if ( Input::has('te2_ode') )
                $problemaTesoreria['ode']=Input::get('te2_ode');
            if ( Input::has('te2_cajero') )
                $problemaTesoreria['cajero']=Input::get('te2_cajero');
            if ( Input::has('te2_cantidad') )
                $problemaTesoreria['cantidad']=Input::get('te2_cantidad');
            if ( Input::has('te2_empresa') )
                $problemaTesoreria['empresa']=Input::get('te2_empresa');
            if ( Input::has('te2_ultboleta') )
                $problemaTesoreria['ultboleta']=Input::get('te2_ultboleta');
            if ( Input::has('te2_enviar') )
                $problemaTesoreria['enviar']=Input::get('te2_enviar');
            if ( Input::has('te2_fecha') )
                $problemaTesoreria['fecha']=Input::get('te2_fecha');
            if ( Input::has('te2_adicional') )
                $problemaTesoreria['adicional']=Input::get('te2_adicional');
            $problemaTesoreria->save();
        }
        //**********************************************************************
        //****************************Alumno Problema***************************
            if (!Input::has('carrera_id') )
                $data['carrera_id'] = Null;
            if (!Input::has('especialidad_id') )
                $data['especialidad_id'] = Null;
            if (!Input::has('diafalto') )
                $data['diafalto'] = Null;
            if (!Input::has('ciclo_id') )
                $data['ciclo_id'] = Null;
            if (!Input::has('ciclo_ids') )
                $data['ciclo_ids'] = Null;
            if (!Input::has('semestre_ini_id') )
                $data['semestre_ini_id'] = Null;
            if (!Input::has('semestre_fin_id') )
                $data['semestre_fin_id'] = Null;
            if (!Input::has('semestre_reserva_id') )
                $data['semestre_reserva_id'] = Null;
            if (!Input::has('semestre_reincorporarse_id') )
                $data['semestre_reincorporarse_id'] = Null;
            if (!Input::has('cp_instituto') )
                $data['cp_instituto'] = Null;
            if (!Input::has('cp_persona') )
                $data['cp_persona'] = Null;
            if (!Input::has('cp_cargo') )
                $data['cp_cargo'] = Null;
            if (!Input::has('cp_area') )
                $data['cp_area'] = Null;
            if (!Input::has('ad_nota') )
                $data['ad_nota'] = Null;
            if (!Input::has('tema_seminario') )
                $data['tema_seminario'] = Null;
            if (!Input::has('hora_seminario') )
                $data['hora_seminario'] = Null;
            if (!Input::has('fecha_seminario') )
                $data['fecha_seminario'] = Null;
            if (Input::has('alumno_id')) {
                if( Input::has('ciclo_ids') ){
                    $data['ciclo_ids'] = implode(",", Input::get('ciclo_ids'));
                }
                $data['carrera'] = Null;
                $data['documento'] = Null;
                $data['observacion'] = Null;
                $alumnoProblema = $this->alumnoProblemaRepo->create($data);
            }
        //**********************************************************************
        //*************************Alumno Problema CS***************************
            if ( Input::has('alumno_id') AND Input::has('cs_ciclo_id') ) {
                $row['alumno_problema_id']=$alumnoProblema->id;
                for ($i=0; $i < count(Input::get('cs_ciclo_id')); $i++) {
                    $row['ciclo_id'] = Input::get('cs_ciclo_id')[$i];
                    $row['semestre_ini_id'] = Input::get('cs_semestre_ini_id')[$i];
                    $row['semestre_fin_id'] = Input::get('cs_semestre_fin_id')[$i];
                    $this->alumnoProblemaRepo->createAlumnoProblemaCS($row);
                }
            }
        //**********************************************************************
        //*******************************Articulo*******************************
            if ( Input::has('ar_articulo_id') ) {
                $articulo=array();
                for ($i=0; $i < count(Input::get('ar_articulo_id')); $i++) {
                    array_push($articulo,
                        array(  'articulo_id'=>Input::get('ar_articulo_id')[$i],
                                'cantidad'=>Input::get('ar_cantidad')[$i],
                                'descripcion'=>Input::get('ar_descripcion')[$i],
                                'usuario_created_at'=>$row['usuario_created_at']
                        )
                    );
                }
                $problema->articulos()->sync($articulo);
            }
        //**********************************************************************
        //*******************************Adicional******************************

        //**********************************************************************
        //***********************Alumno Problema Curso**************************
            if ( Input::has('alumno_id') AND Input::has('tc_curso') ) {
                $row['alumno_problema_id']=$alumnoProblema->id;
                for ($i=0; $i < count(Input::get('tc_curso')); $i++) {
                    $row['curso'] = Input::get('tc_curso')[$i];
                    $row['frecuencia'] = Input::get('tc_frecuencia')[$i];
                    $row['hora'] = Input::get('tc_hora')[$i];
                    $row['profesor'] = Input::get('tc_profesor')[$i];
                    $row['fecha_inicio'] = Input::get('tc_fecha_ini')[$i];
                    $row['fecha_fin'] = Input::get('tc_fecha_fin')[$i];
                    $row['nota'] = Input::get('tc_nota')[$i];
                    $row['curso'] = Input::get('tc_curso')[$i];
                    $row['frecuencia'] = Input::get('tc_frecuencia')[$i];
                    $row['hora'] = Input::get('tc_hora')[$i];
                    $row['profesor'] = Input::get('tc_profesor')[$i];
                    $row['fecha_ini'] = Input::get('tc_fecha_ini')[$i];
                    $row['fecha_fin'] = Input::get('tc_fecha_fin')[$i];
                    $row['nota'] = Input::get('tc_nota')[$i];
                    $this->alumnoProblemaRepo->createAlumnoProblemaNota($row);
                }
            }
        //**********************************************************************
        //***********************Alumno Problema Pago***************************
            if ( Input::has('alumno_id') AND Input::has('tp_fecha') ) {
                $alumnoProbPagos=[];
                $file = Input::get('tp_archivo');
                for ($i=0; $i < count(Input::get('tp_fecha')); $i++) {
                    $url = "upload/$problema->id/pago".$i.'.';
                    $ruta_archivo="";
                    if( $file[$i]!='' ){
                        $ruta_archivo = $this->fileToFile($file[$i], $problema->id, $url);
                    }
                    $alumnoProbPago =new AlumnoProblemaPago( [
                        'fecha' => Input::get('tp_fecha')[$i],
                        'recibo' => Input::get('tp_recibo')[$i],
                        'monto' => Input::get('tp_monto')[$i],
                        'ruta_archivo' => $ruta_archivo,
                        'usuario_created_at'=>$id,
                        'alumno_problema_id'=>$alumnoProblema->id
                    ]);
                    array_push($alumnoProbPagos, $alumnoProbPago);
                }
                $alumnoProblema->alumnoProbPagos()->saveMany($alumnoProbPagos);
            }
        //**********************************************************************
        //**************************Archivo Adicional***************************
            if ( Input::has('arc_nombre') ) {
                $archivos=[];
                $nombre = Input::get('arc_nombre');
                $file = Input::get('arc_archivo');
                for ($i=0; $i < count($nombre); $i++) {
                    $url = "upload/$problema->id/archivo".$i.'.';
                    $ruta_archivo = $this->fileToFile($file[$i], $problema->id, $url);
                    $archivo =new Archivo( [
                        'nombre_archivo'=>$nombre[$i],
                        'ruta_archivo'=>$ruta_archivo,
                        'usuario_created_at'=>$id,
                        'problema_id'=>$problema->id
                    ]);
                    array_push($archivos, $archivo);
                }
                $problema->archivos()->saveMany($archivos);
            }
        //**********************************************************************
            DB::commit();
            $rst=1;
            $msj='Registro actualizado correctamente';
        } else {
            $rst=2;
            $msj=$validator->messages();
        }
        return Response::json(
            array(
                    'rst'=>$rst,
                    'msj'=>$msj,
                    'problemaId'=>$problema_id,
                )
        );
    }

    public function getValidar(){
        $datos= Input::all();
        $sql="  SELECT grupo,IFNULL(campos,'') campos
                FROM tipo_problema_categorias_etiquetas
                WHERE tipo_problema_categoria_id=".$datos['categoria_tipo_problema_id'];
        $r=DB::select($sql);
        return Response::json(array('rst'=>1,'datos'=>$r));
    }
}
