<?php
use Cuadrop\Lista\ListaRepoInterface;

/**
 * controlador para las listas que seras option en html
 */
class ListaController extends \BaseController
{
    protected $listaRepo;
    public function __construct(ListaRepoInterface $listaRepo)
    {
        $this->listaRepo = $listaRepo;
    }
    /**
     * Store a newly created resource in storage.
     * POST /lista/dia
     *
     * @return Response
     */
    public function postTipoproblema()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $tipoProblema = $this->listaRepo->getTipoProblema();
            return Response::json(array('rst'=>1,'datos'=>$tipoProblema));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /lista/dia
     *
     * @return Response
     */
    public function postTipocarrera()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $tipoCarrera = $this->listaRepo->getTipoCarrera();
            return Response::json(array('rst'=>1,'datos'=>$tipoCarrera));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /lista/dia
     *
     * @return Response
     */
    public function postCarrera()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $carrera = $this->listaRepo->getCarrera();
            return Response::json(array('rst'=>1,'datos'=>$carrera));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /lista/dia
     *
     * @return Response
     */
    public function postCiclo()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $ciclo = $this->listaRepo->getCiclo();
            return Response::json(array('rst'=>1,'datos'=>$ciclo));
        }
    }

}