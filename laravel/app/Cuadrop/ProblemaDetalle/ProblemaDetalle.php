<?php
namespace Cuadrop\ProblemaDetalle;
use Cuadrop\Base\BaseEntity;

class ProblemaDetalle extends BaseEntity
{
    protected $table = 'problema_detalle';
    protected $fillable = ['problema_id','estado_problema_id','fecha_estado',
    'resultado', 'estado','usuario_created_at','usuario_updated_at'];
}