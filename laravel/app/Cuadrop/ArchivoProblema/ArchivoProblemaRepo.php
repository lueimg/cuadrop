<?php
namespace Cuadrop\ArchivoProblema;
use Cuadrop\Base\BaseRepo;
use Cuadrop\ArchivoProblema\ArchivoProblemaRepoInterface;
use DB;

/**
 * esta es la capa de lal logica de base de datos
 * tambien implementa las funciones create update delete, etc
 */
class ArchivoProblemaRepo extends BaseRepo implements ArchivoProblemaRepoInterface
{
    public function getModel()
    {
        return new ArchivoProblema;
    }
    public $filters = ['search', 'published', 'menu'];
    public function filterBySearch($q, $value)
    {
        $q->where('nombre', 'LIKE', "%$value%");
    }
    public function getArchivoProblema()
    {
        return ArchivoProblema::select('*')->get();
    }
}