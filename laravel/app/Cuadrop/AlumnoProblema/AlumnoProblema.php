<?php
namespace Cuadrop\AlumnoProblema;
use Cuadrop\Base\BaseEntity;

/**
 * aca deberan ir las relaciones de las tablas y 
 * loa campos de la tabla
 */
class AlumnoProblema extends BaseEntity
{
    protected $table = 'alumno_problema';
    protected $fillable = ['problema_id','alumno_id','carrera_id','ciclo_id',
    'carrera','documento', 'observacion', 'estado','usuario_created_at','usuario_updated_at'];
}