<?php
namespace Cuadrop\Lista;
use Cuadrop\Base\BaseEntity;

class TipoArticulo extends BaseEntity
{
    protected $table = 'tipo_articulo';
    protected $fillable = ['nombre', 'estado'];

}