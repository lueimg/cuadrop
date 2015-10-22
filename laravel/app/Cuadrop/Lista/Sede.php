<?php
namespace Cuadrop\Lista;
use Cuadrop\Base\BaseEntity;

class Sede extends BaseEntity
{
    protected $table = 'sedes';
    protected $fillable = ['nombre', 'estado'];

}