<?php
namespace Cuadrop\Lista;
use Cuadrop\Base\BaseRepo;
use Cuadrop\Lista\ListaRepoInterface;

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
}
