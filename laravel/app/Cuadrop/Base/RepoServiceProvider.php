<?php
namespace Cuadrop\Base;

use Cuadrop\Lista;
use Cuadrop\Problema;
//use Cuadrop\Problema;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Cuadrop\Lista\ListaRepoInterface',
            'Cuadrop\Lista\ListaRepo');
        $this->app->bind('Cuadrop\Problema\ProblemaRepoInterface',
            'Cuadrop\Problema\ProblemaRepo');
        //$this->app->bind('Cuadrop\Lista\ListaRepoInterface',
            //'Cuadrop\Lista\ListaRepo');
    }
}