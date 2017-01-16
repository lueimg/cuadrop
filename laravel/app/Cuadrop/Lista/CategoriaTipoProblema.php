<?php
namespace Cuadrop\Lista;
use Cuadrop\Base\BaseEntity;

class CategoriaTipoProblema extends BaseEntity
{
    protected $table = 'tipo_problema_categorias';
    protected $fillable = ['tipo_problema_id','nombre', 'estado'];

}
