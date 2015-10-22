<?php
namespace Cuadrop\AlumnoProblema;
use Cuadrop\Base\BaseEntity;

/**
 * aca deberan ir las relaciones de las tablas y 
 * loa campos de la tabla
 */
class AlumnoProblemaNota extends BaseEntity
{
    protected $table = 'alumno_problema_nota';
    protected $fillable = ['alumno_problema_id','curso','frecuencia','hora',
    'profesor','fecha_inicio', 'fecha_fin', 'nota', 'estado','usuario_created_at','usuario_updated_at'];
}