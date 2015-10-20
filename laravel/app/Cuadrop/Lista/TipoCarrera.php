<?php
namespace Cuadrop\Lista;
use Cuadrop\Base\BaseEntity;

class TipoCarrera extends BaseEntity
{
    protected $table = 'tipo_carrera';
    protected $fillable = ['nombre', 'estado'];

}