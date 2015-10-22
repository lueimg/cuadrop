<?php
namespace Cuadrop\Lista;
use Cuadrop\Base\BaseRepo;
use Cuadrop\Lista\ListaRepoInterface;
use DB;

class ListaRepo extends BaseRepo implements ListaRepoInterface
{
    public function getModel()
    {
        return new TipoProblema;
    }
    public $filters = ['nombre', 'estado'];
    public function filterBySearch($q, $value)
    {
        $q->where('nombre', 'LIKE', "%$value%");
    }

    public function getTipoProblema()
    {
        return TipoProblema::select('*')->get();
    }
    public function getTipoCarrera()
    {
        return TipoCarrera::select('*')->get();
    }
    public function getCarrera()
    {
        return Carrera::select('*')->get();
    }
    public function getCiclo()
    {
        return Ciclo::select('*')->get();
    }
    public function getSede()
    {
        return Sede::select('*')->get();
    }
    public function getSedePersona($personaId)
    {
        $sql = "SELECT s.id, s.estado, s.nombre
                    FROM personas p 
                    JOIN `cargo_persona` cp ON p.`id`=cp.`persona_id`
                    JOIN `sede_cargo_persona` scp ON cp.id=scp.cargo_persona_id
                    JOIN `sedes` s ON scp.`sede_id`=s.id
                    WHERE p.estado=1 AND cp.estado=1 AND scp.estado=1
                    AND s.estado=1 AND p.id=? ";
        return DB::select($sql, array($personaId));
    }
}
