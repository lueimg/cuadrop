<?php
namespace Cuadrop\Lista;
use Cuadrop\Base\BaseEntity;

class EstadoProblema extends BaseEntity
{
    protected $table = 'estado_problema';
    protected $fillable = ['nombre', 'estado','estado_problema','clase_boton'];

}