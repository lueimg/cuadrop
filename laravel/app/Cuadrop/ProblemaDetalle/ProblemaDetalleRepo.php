<?php
namespace Cuadrop\ProblemaDetalle;
use Cuadrop\Base\BaseRepo;
use Cuadrop\ProblemaDetalle\ProblemaDetalleRepoInterface;

class ProblemaDetalleRepo extends BaseRepo implements ProblemaDetalleRepoInterface
{
    public function getModel()
    {
        return new ProblemaDetalle;
    }
    public $filters = ['search', 'published', 'menu'];
    public function filterBySearch($q, $value)
    {
        $q->where('nombre', 'LIKE', "%$value%");
    }
    public function getProblemaDetalle()
    {
        return ProblemaDetalle::select('*')->get();
    }

}