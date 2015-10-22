<?php
use Cuadrop\Problema\ProblemaRepoInterface;
use Cuadrop\ProblemaDetalle\ProblemaDetalleRepoInterface;

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
    public function __construct(ProblemaRepoInterface $problemaRepo,
        ProblemaDetalleRepoInterface $problemaDetalleRepo)
    {
        $this->problemaRepo = $problemaRepo;
        $this->problemaDetalleRepo = $problemaDetalleRepo;
    }
    public function postCargar()
    {
        if ( Request::ajax() ) {
            $problemas = $this->problemaRepo->getReporteSolucionProblemas();
            return Response::json(array('rst'=>1,'datos'=>$problemas));
        }
    }
    /**
     * nuevo problema
     *
     * @return Response
     */
    public function postCreate()
    {
        $data = Input::all();
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
}