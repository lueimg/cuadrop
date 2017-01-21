<?php

class Especialidad extends Base
{
    public $table = "especialidades";
    public static $where =['id', 'nombre','carrera_id', 'estado'];
    public static $selec =['id', 'nombre','carrera_id', 'estado'];
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
    
    public static function getCargar(){
        $Ssql="SELECT e.*,c.nombre as carrera
                FROM especialidades e 
                INNER JOIN carreras c on e.carrera_id=c.id
                ";
                
        $r= DB::select($Ssql);
        return $r;
    }

    public function getEspecialidad(){
        $especialidad=DB::table('especialidades')
                ->select('id','nombre','carrera_id','estado')
                ->where( 
                    function($query){
                        if ( Input::get('estado') ) {
                            $query->where('estado','=','1');
                        }
                        if ( Input::get('carrera_id') ) {
                            $query->where('carrera_id','=',Input::get('carrera_id'));
                        }
                        if ( Input::get('porusuario') ) {
                            $query->whereRaw('FIND_IN_SET(id,"'.Auth::user()->carrera_ids.'")');
                        }
                    }
                )
                ->orderBy('nombre')
                ->get();
                
        return $especialidad;
    }
}
