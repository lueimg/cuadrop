<?php
namespace Cuadrop\AlumnoProblema;
use Cuadrop\Base\BaseEntity;

/**
 * aca deberan ir las relaciones de las tablas y 
 * loa campos de la tabla
 */
class ArchivoProblema extends BaseEntity
{
    protected $table = 'archivo_problema';
    protected $fillable = ['problema_id','archivo_id',
    'nombre_archivo','ruta_archivo', 'usuario_updated_at', 'usuario_deleted_at','usuario_created_at'];
}