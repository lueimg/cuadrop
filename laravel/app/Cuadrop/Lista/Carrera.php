<?php
namespace Cuadrop\Lista;
use Cuadrop\Base\BaseEntity;

class Carrera extends BaseEntity
{
    protected $table = 'carreras';
    protected $fillable = ['nombre', 'estado'];

}