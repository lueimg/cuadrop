<?php

class CategoriaTipoProblema extends Base
{
    public $table = "tipo_problema_categorias";
    public static $where =['id', 'nombre','tipo_problema_id', 'estado'];
    public static $selec =['id', 'nombre','tipo_problema_id', 'estado'];
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
        $Ssql="SELECT ctp.*,tp.nombre as tipo_problema
                FROM tipo_problema_categorias ctp 
                INNER JOIN tipo_problema tp on ctp.tipo_problema_id=tp.id
                ";
                
        $r= DB::select($Ssql);
        return $r;
    }

    public function getCategoriaTipoProblema(){
        $CategoriaTipoProblema=DB::table('tipo_problema_categorias')
                ->select('id','nombre','tipo_problema_id','estado')
                ->where( 
                    function($query){
                        if ( Input::get('estado') ) {
                            $query->where('estado','=','1');
                        }
                        if ( Input::get('tipo_problema_id') ) {
                            $query->where('tipo_problema_id','=',Input::get('tipo_problema_id'));
                        }
                    }
                )
                ->orderBy('nombre')
                ->get();
                
        return $CategoriaTipoProblema;
    }
}
