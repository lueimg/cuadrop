<?php
use Cuadrop\Problema\ProblemaRepoInterface;
use Cuadrop\ProblemaDetalle\ProblemaDetalleRepoInterface;
use Cuadrop\AlumnoProblema\AlumnoProblemaRepoInterface;

class SolucionarProblemaController extends BaseController
{
    protected $_rules = array(
        'resultado'        => 'required|regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i',
        //'fecha_estado'    => 'required|regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i',
        'problema_id'  => 'required|numeric',
        'estado_problema_id'  => 'required|numeric',
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
    /**
     * cargar problemas
     * solucionar_problema/cargar
     * @return Response
     */
    public function postCargar()
    {
        if ( Request::ajax() ) {
            $problemas = $this->problemaRepo->getReporteSolucionProblemas();
            return Response::json(array('rst'=>1,'datos'=>$problemas));
        }
    }
    /**
     * cargar problemas
     * solucionar_problema/cargar
     * @return Response
     */
    public function postCargarfiltro()
    {
        if ( Request::ajax() ) {
            $datos=array();
            $datos['sede'] = Input::get('sede', array('0'));
            if ( Input::has('tipo') ){
                $datos['tipo'] = Input::get('tipo', array('0'));
            }
            else{
                $datos['tipo'] = Input::get('tipo_problema', array('0'));
            }

            if ( Input::has('estado') ){
                $datos['estado'] = Input::get('estado');
            }

            if ( Input::has('fecha_ini') and Input::has('fecha_fin') ){
                $datos['fecha_ini'] = Input::get('fecha_ini');
                $datos['fecha_fin'] = Input::get('fecha_fin');
            }

            $datos['sede'] = ($datos['sede']=='') ? array('0') : $datos['sede'] ;
            $datos['tipo'] = ($datos['tipo']=='') ? array('0') : $datos['tipo'] ;
            $problemas = $this->problemaRepo->getReporteSolucionProblemasFiltro($datos);
            return Response::json(array('rst'=>1,'datos'=>$problemas));
        }
    }

    public function postCargarfiltro2()
    {
        if ( Request::ajax() ) {
            $datos=array();
            $datos['sede'] = Input::get('sede', array('0'));
            $datos['tipo']='';
            if ( Input::has('tipo_reporte') ){
                $datos['tipo'] = Input::get('tipo_reporte');
            }

            if ( Input::has('estado') ){
                $datos['estado'] = Input::get('estado');
            }

            if ( Input::has('fecha_ini') and Input::has('fecha_fin') ){
                $datos['fecha_ini'] = Input::get('fecha_ini');
                $datos['fecha_fin'] = Input::get('fecha_fin');
            }

            $datos['sede'] = ($datos['sede']=='') ? array('0') : $datos['sede'] ;
            $problemas = $this->problemaRepo->getReporteSolucionProblemasFiltro2($datos);
            return Response::json(array('rst'=>1,'datos'=>$problemas));
        }
    }
    /**
     * nuevo problema
     * solucionar_problema/create
     * @return Response
     */
    public function postCreate()
    {
        $data = Input::all();
        $data['usuario_created_at']=Auth::id();
        //$data['estado_problema_id'] = 2;
        $validator = Validator::make($data, $this->_rules, $this->_mensaje);
        if ( $validator->passes() ) {
            $problemaDetalle = $this->problemaDetalleRepo->create($data);
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
                )
        );
    }
    /**
     * retornar daata de un problema
     * solucionar_problema/cargardetalle
     * @return Response
     */
    public function postCargardetalle()
    {
        $data=array();
        if (Input::has('problema_id')) {
            $problemaId = Input::get('problema_id');
            $problemaDetalle = $this->problemaDetalleRepo->getProblemaDetalleProblema($problemaId);
            if (isset($problemaDetalle) && count($problemaDetalle) > 0 ) {
                $data['detalle'] = $problemaDetalle;
            }
            $alumnoProblema = $this->alumnoProblemaRepo->getAlumnoProblemaProblema($problemaId);
            if (isset($alumnoProblema) && count($alumnoProblema) > 0 ) {
                $data['alumno']=$alumnoProblema;
                $alumnoProblemaId=$alumnoProblema[0]->id;
                $pago=$this->alumnoProblemaRepo->getAlumnoProblemaPagoProblema($alumnoProblemaId);
                $nota=$this->alumnoProblemaRepo->getAlumnoProblemaNotaProblema($alumnoProblemaId);
                
                if (isset($pago) && count($pago) >0 ) {
                    $data['pago']=$pago;
                }
                if (isset($nota) && count($nota) >0 ) {
                    $data['nota']=$nota;
                }
            }
            $archivo=Archivo::getArchivos();
            if (isset($archivo) && count($archivo) >0 ) {
                $data['archivo']=$archivo;
            }
        }
        return Response::json(array('rst'=>1,'datos'=>$data));
    }
}
