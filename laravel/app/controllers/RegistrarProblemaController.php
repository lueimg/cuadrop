<?php
use Cuadrop\Problema\ProblemaRepoInterface;

class RegistrarProblemaController extends BaseController
{
    protected $problemaRepo;
    public function __construct(ProblemaRepoInterface $problemaRepo)
    {
        $this->problemaRepo = $problemaRepo;
    }
    public function postCargar()
    {
        if ( Request::ajax() ) {
            $problemas = $this->problemaRepo->getProblema();
            return Response::json(array('rst'=>1,'datos'=>$problemas));
        }
        return Response::json(
            array(
                'estado'=>true,
                'msj'=>'Se realizo la carga con exito'
            )
        );
        //echo json_encode(array('estado'=>true,'data'=>''));
    }
}