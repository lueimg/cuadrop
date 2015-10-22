<?php
namespace Cuadrop\Base;

use Cuadrop\Lista;
use Cuadrop\Problema;
use Cuadrop\ProblemaDetalle;
use Cuadrop\Alumno;
use Cuadrop\AlumnoProblema;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Cuadrop\Lista\ListaRepoInterface',
            'Cuadrop\Lista\ListaRepo');
        $this->app->bind('Cuadrop\Problema\ProblemaRepoInterface',
            'Cuadrop\Problema\ProblemaRepo');
        $this->app->bind('Cuadrop\ProblemaDetalle\ProblemaDetalleRepoInterface',
            'Cuadrop\ProblemaDetalle\ProblemaDetalleRepo');
        $this->app->bind('Cuadrop\Alumno\AlumnoRepoInterface',
            'Cuadrop\Alumno\AlumnoRepo');
        $this->app->bind('Cuadrop\AlumnoProblema\AlumnoProblemaRepoInterface',
            'Cuadrop\AlumnoProblema\AlumnoProblemaRepo');
    }
}