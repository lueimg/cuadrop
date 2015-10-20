<?php
namespace App\Cuadrop\Problema;
use Cuadrop\Base\BaseEntity;

class Problema extends BaseEntity
{
    protected $table = 'problemas';
    protected $fillable = ['nombre', 'estado'];
}