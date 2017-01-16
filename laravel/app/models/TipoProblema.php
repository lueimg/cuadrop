<?php

class TipoProblema extends Base
{
    public $table = "tipo_problema";
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

    public function getTipoProblema(){
        $tipoproblema=DB::table('tipo_problema')
                ->select('id','nombre','estado')
                ->where( 
                    function($query){
                        if ( Input::get('estado') ) {
                            $query->where('estado','=','1');
                        }
                        if ( Input::has('porusuario') ) {
                            $query->whereRaw('FIND_IN_SET(id,"'.Auth::user()->tipo_problema_ids.'")');
                        }
                    }
                )
                ->orderBy('nombre')
                ->get();
                
        return $tipoproblema;
    }
}
