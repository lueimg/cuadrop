<?php
namespace Cuadrop\AlumnoProblema;
use Cuadrop\Base\BaseRepo;
use Cuadrop\AlumnoProblema\AlumnoProblemaRepoInterface;
use DB;

/**
 * esta es la capa de lal logica de base de datos
 * tambien implementa las funciones create update delete, etc
 */
class AlumnoProblemaRepo extends BaseRepo implements AlumnoProblemaRepoInterface
{
    public function getModel()
    {
        return new AlumnoProblema;
    }
    public $filters = ['search', 'published', 'menu'];
    public function filterBySearch($q, $value)
    {
        $q->where('nombre', 'LIKE', "%$value%");
    }
    public function getAlumnoProblema()
    {
        return AlumnoProblema::select('*')->get();
    }
    public function createAlumnoProblemaNota($data)
    {
        $new = AlumnoProblemaNota::create($data);
    }
    public function createAlumnoProblemaPago($data)
    {
        $new = AlumnoProblemaPago::create($data);
    }
}