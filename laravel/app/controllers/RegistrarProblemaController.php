<?php
use Cuadrop\Problema\ProblemaRepoInterface;
use Cuadrop\ProblemaDetalle\ProblemaDetalleRepoInterface;
use Cuadrop\AlumnoProblema\AlumnoProblemaRepoInterface;
use Cuadrop\AlumnoProblema\AlumnoProblemaPago;

class RegistrarProblemaController extends BaseController
{
    protected $_rules = array(
        //'descripcion'        => 'required|regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i',
        //'fecha_problema'    => 'required|regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i',
        'tipo_problema_id'  => 'required|numeric',
        'sede_id'           => 'required|numeric',
        'instituto_id'           => 'required|numeric',
        //'email'             => 'required|email|unique:alumnos,email',
        //'telefono'          => 'required|min:6'
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
        if ($type=='vnd.openxmlformats-officedocument.wordprocessingml.document') $type='docx';
        if ($type=='sheet') $type='xlsx';
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
                            'curso' => Input::get('tp_curso')[$i],
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
}