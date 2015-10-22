<?php
namespace Cuadrop\Problema;
use Cuadrop\Base\BaseRepo;
use Cuadrop\Problema\ProblemaRepoInterface;
use DB;

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
    public function getReporteSolucionProblemas()
    {
        $sql= "SELECT p.id, s.nombre AS sede, tp.nombre AS tipo_problema,
                descripcion, ep.id AS estado_problema_id, ep.clase_boton,
                p.tipo_problema_id, p.sede_id, p.fecha_problema,
                pd.id AS problema_detalle_id, p.created_at AS fecha_registro,
                pd.fecha_estado, pd.resultado, ep.nombre AS estado_problema
                FROM problemas p
                JOIN tipo_problema tp ON p.tipo_problema_id=tp.id
                JOIN sedes s ON p.sede_id=s.id
                JOIN problema_detalle pd ON p.id=pd.problema_id
                JOIN (SELECT MAX(id) AS id
                            FROM problema_detalle
                            WHERE estado=1
                            GROUP BY problema_id) pd2
                ON pd.id=pd2.id
                JOIN estado_problema ep ON pd.estado_problema_id=ep.id
                LEFT JOIN alumno_problema ap ON p.id=ap.problema_id
                LEFT JOIN alumnos a ON ap.alumno_id=a.id
                LEFT JOIN carreras c ON ap.carrera_id = c.id
                LEFT JOIN tipo_carrera tc ON c.tipo_carrera_id=tc.id
                WHERE p.estado=1 AND pd.estado=1
                ORDER BY p.created_at DESC";
        return DB::select($sql);
    }
}