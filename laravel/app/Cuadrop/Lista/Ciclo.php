<?php
namespace Cuadrop\Lista;
use Cuadrop\Base\BaseEntity;

class Ciclo extends BaseEntity
{
    protected $table = 'ciclos';
    protected $fillable = ['nombre', 'estado'];

}