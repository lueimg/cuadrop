<?php
namespace Cuadrop\Lista;
use Cuadrop\Base\BaseEntity;

class Articulo extends BaseEntity
{
    protected $table = 'articulos';
    protected $fillable = ['nombre', 'estado','tipo_articulo'];

}