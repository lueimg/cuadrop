<?php
namespace Cuadrop\AlumnoProblema;
use Cuadrop\Base\BaseEntity;

/**
 * aca deberan ir las relaciones de las tablas y 
 * loa campos de la tabla
 */
class AlumnoProblemaPago extends BaseEntity
{
    protected $table = 'alumno_problema_pago';
    protected $fillable = ['alumno_problema_id','curso','ruta_archivo','recibo','monto',
    'estado','usuario_created_at','usuario_updated_at'];
}