<?php
use Cuadrop\Problema\ProblemaRepoInterface;

class SolucionarProblemaController extends BaseController
{
    protected $_rules = array(
        //'descripcion'        => 'required|regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i',
        //'fecha_problema'    => 'required|regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i',
        'tipo_problema_id'  => 'required|numeric',
        'sede_id'           => 'required|numeric',
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
    public function __construct(ProblemaRepoInterface $problemaRepo)
    {
        $this->problemaRepo = $problemaRepo;
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
        $data = Input::all();// dd($data);
    }
}