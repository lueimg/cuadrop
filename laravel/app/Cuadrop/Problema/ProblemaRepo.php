<?php
namespace Cuadrop\Problema;
use Cuadrop\Base\BaseRepo;
use Cuadrop\Problema\ProblemaRepoInterface;

class ProblemaRepo extends BaseRepo implements ProblemaRepoInterface
{
    public function getModel()
    {
        return new Problema;
    }
    public $filters = ['search', 'published', 'menu'];
    public function filterBySearch($q, $value)
    {
        $q->where('nombre', 'LIKE', "%$value%");
    }
    public function getProblema()
    {
        return Problema::select('*')->get();
    }
}