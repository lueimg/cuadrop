<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Archivo extends Base
{
    public $table = "archivos";
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $guarded =[];
    protected $fillable =[ 'problema_id','nombre_archivo','ruta_archivo','usuario_created_at',
    'usuario_updated_at','usuario_deleted_at'
    ];
    public static $where =['id', 'problema_id','nombre_archivo','ruta_archivo','usuario_created_at',
    'usuario_updated_at','usuario_deleted_at'
    ];
    public static $selec =['id', 'problema_id','nombre_archivo','ruta_archivo','usuario_created_at',
    'usuario_updated_at','usuario_deleted_at'
    ];
    /**
     * Problema relationship
     */
    public function problema()
    {
        return $this->belongsTo('Problema');
    }

    public static function getArchivos()
    {
        $sql="  SELECT nombre_archivo,ruta_archivo
                FROM archivos
                WHERE problema_id=".Input::get('problema_id');

        $r=DB::select($sql);

        return $r;
    }
}
