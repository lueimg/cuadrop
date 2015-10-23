<?php
namespace Cuadrop\ProblemaDetalle;
use Cuadrop\Base\BaseRepo;
use Cuadrop\ProblemaDetalle\ProblemaDetalleRepoInterface;
use DB;

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
    public function getProblemaDetalleProblema($problemaId)
    {
        return DB::table('problema_detalle as pd')
        ->join(
            'estado_problema as ep',
            'pd.estado_problema_id','=','ep.id'
        )
        ->select(
            'pd.id', 'pd.fecha_estado','pd.resultado','ep.nombre as estado',
            'ep.clase_boton', 'pd.created_at'
        )
        ->where('pd.problema_id', '=', $problemaId)
        ->where('pd.estado', '=', '1')
        ->where('ep.estado', '=', '1')
        ->orderBy('pd.created_at')
        ->get();
    }
}