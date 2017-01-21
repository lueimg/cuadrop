<?php

class Carrera extends Base
{
    public $table = "carreras";
    public static $where =['id', 'nombre', 'estado'];
    public static $selec =['id', 'nombre', 'estado'];
    /**
     * Cargos relationship
     */
    /*public function cargos()
    {
        return $this->belongsToMany('Cargo');
    }*/
    /**
     * Rutas relationship
     */
    public function rutas()
    {
        return $this->hasMany('Ruta');
    }
    public function institutos()
    {
        return $this->belongsToMany('Instituto');
    }
    public static function getCarrera(){
        $carrera=DB::table('carreras as c')
                ->join(
                    'tipo_carrera as tc',
                    'tc.id','=','c.tipo_carrera_id'
                )
                ->select('c.id','c.nombre','tc.nombre as tipo','c.tipo_carrera_id','c.estado')
                ->where( 
                    function($query){
                        if ( Input::get('estado') ) {
                            $query->where('c.estado','=','1');
                        }
                    }
                )
                ->orderBy('nombre')
                ->get();
                
        return $carrera;
    }
}
