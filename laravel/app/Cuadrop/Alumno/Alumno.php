<?php
namespace Cuadrop\Alumno;
use Cuadrop\Base\BaseEntity;

/**
 * aca deberan ir las relaciones de las tablas y 
 * loa campos de la tabla
 */
class Alumno extends BaseEntity
{
    protected $table = 'alumnos';
    protected $fillable = ['paterno','materno','nombre','email','telefono','sexo', 'estado'];
}