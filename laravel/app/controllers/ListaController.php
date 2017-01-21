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
     * POST /lista/tipoproblema
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
    public function postEstadoproblemaestado()
    {
        if ( Request::ajax() ) {
            $estado=array('0','1');
            if( !Input::has('estado') ){
            $estado=array('0');
            }
            $tipoProblema = $this->listaRepo->getEstadoProblemaEstado($estado);
            return Response::json(array('rst'=>1,'datos'=>$tipoProblema));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /lista/tipocarrera
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
     * POST /lista/carrera
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
     * obtener carreras por tipo carrera
     */
    public function postCarreratipocarrera()
    {
        if (Request::ajax()) {
            $carrera = $this->listaRepo->getCarreraTipoCarrera();
            return Response::json(array('rst'=>1,'datos'=>$carrera));
        }
    }

    /**
     * cargar carreras por instituto
     * POST /lista/carrerainstituto
     *
     * @return Response
     */
    public function postCarrerainstituto()
    {
        if (Request::ajax()) {
            $carrera = $this->listaRepo->getCarreraInstituto();
            return Response::json(array('rst'=>1,'datos'=>$carrera));
        }
    }

    /**
     * cargar ciclos por instituto
     * POST /lista/cicloinstituto
     *
     * @return Response
     */
    public function postCicloinstituto()
    {
        if (Request::ajax()) {
            $ciclo = $this->listaRepo->getCicloInstituto();
            return Response::json(array('rst'=>1,'datos'=>$ciclo));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /lista/ciclo
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
    /**
     * obtener ciclos por tipo carrera
     */
    public function postCiclotipocarrera()
    {
        if (Request::ajax()) {
            $ciclo = $this->listaRepo->getCicloTipoCarrera();
            return Response::json(array('rst'=>1,'datos'=>$ciclo));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /lista/sedepersona
     *
     * @return Response
     */
    public function postSedepersona()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $sede = $this->listaRepo->getSedePersona(Auth::user()->id);
            return Response::json(array('rst'=>1,'datos'=>$sede));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /lista/instituto
     *
     * @return Response
     */
    public function postInstituto()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $instituto = $this->listaRepo->getInstituto();
            return Response::json(array('rst'=>1,'datos'=>$instituto));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /lista/tipoarticulo
     *
     * @return Response
     */
    public function postTipoarticulo()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $tipoArticulo = $this->listaRepo->getTipoarticulo();
            return Response::json(array('rst'=>1,'datos'=>$tipoArticulo));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /lista/articulo
     *
     * @return Response
     */
    public function postArticulo()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $tipo= Input::get('tipo_articulo');
            $articulo = $this->listaRepo->getArticuloPorTipo($tipo);
            return Response::json(array('rst'=>1,'datos'=>$articulo));
        }
    }

}
