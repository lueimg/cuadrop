<?php
namespace Cuadrop\Problema;
use Cuadrop\Base\BaseEntity;

class Problema extends BaseEntity
{
    protected $table = 'problemas';
    protected $fillable = ['descripcion', 'fecha_problema', 'tipo_problema_id',
    'sede_id', 'estado','usuario_created_at','usuario_updated_at'];
}