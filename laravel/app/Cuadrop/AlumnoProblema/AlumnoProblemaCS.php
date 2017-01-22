<?php
namespace Cuadrop\AlumnoProblema;
use Cuadrop\Base\BaseEntity;

/**
 * aca deberan ir las relaciones de las tablas y 
 * loa campos de la tabla
 */
class AlumnoProblemaCS extends BaseEntity
{
    protected $table = 'alumno_problema_cs';
    protected $fillable = ['alumno_problema_id','ciclo_id','semestre_ini_id',
    'semestre_fin_id','estado','usuario_created_at','usuario_updated_at'];
}
