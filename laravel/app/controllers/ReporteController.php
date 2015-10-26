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
        
        $problemas = Problema::ListadoProblema();
            
    }
}
