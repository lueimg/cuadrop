<?php
namespace Cuadrop\Alumno;
use Cuadrop\Base\BaseRepo;
use Cuadrop\Alumno\AlumnoRepoInterface;

/**
 * esta es la capa de lal logica de base de datos
 * tambien implementa las funciones create update delete, etc
 */
class AlumnoRepo extends BaseRepo implements AlumnoRepoInterface
{
    public function getModel()
    {
        return new Alumno;
    }
    public $filters = ['search', 'published', 'menu'];
    public function filterBySearch($q, $value)
    {
        $q->where('nombre', 'LIKE', "%$value%");
    }
    public function getAlumno()
    {
        return Alumno::select('*')->get();
    }
}