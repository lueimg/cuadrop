<?php
namespace Cuadrop\Lista;
use Cuadrop\Base\BaseEntity;

class TipoProblema extends BaseEntity
{
    protected $table = 'tipo_problema';
    protected $fillable = ['nombre', 'estado'];

}