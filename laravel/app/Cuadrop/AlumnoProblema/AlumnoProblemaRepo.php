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
    public function getAlumnoProblemaNotaProblema($alumnoProblemaId)
    {
        return AlumnoProblemaNota::select('*')
        ->where('alumno_problema_id', $alumnoProblemaId)
        ->get();
    }
    public function createAlumnoProblemaPago($data)
    {
        $new = AlumnoProblemaPago::create($data);
    }
    public function getAlumnoProblemaPagoProblema($alumnoProblemaId)
    {
        return AlumnoProblemaPago::select('*')
        ->where('alumno_problema_id', $alumnoProblemaId)
        ->get();
    }
    public function getAlumnoProblemaProblema($problemaId)
    {
        $sql="SELECT ap.id, IFNULL(c.nombre,carrera) AS carrera,
            IFNULL(ci.nombre,'') AS ciclo, documento,
            observacion, CONCAT(a.paterno,' ',a.materno,', ',a.nombre) AS alumno
            FROM alumno_problema ap
            JOIN `alumnos` a 
            ON ap.alumno_id=a.id
            LEFT JOIN carreras c 
            ON ap.carrera_id=c.id
            LEFT JOIN ciclos ci
            ON ap.ciclo_id=ci.id
            WHERE ap.problema_id=?";
        return DB::select($sql, array($problemaId));
    }
    public function createAlumnoProblemaCS($data)
    {
        $new = AlumnoProblemaCS::create($data);
    }
    public function getAlumnoProblemaCSProblema($alumnoProblemaId)
    {
        return AlumnoProblemaCS::select('*')
        ->where('alumno_problema_id', $alumnoProblemaId)
        ->get();
    }
}
