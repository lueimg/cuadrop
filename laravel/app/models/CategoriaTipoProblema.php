<?php

class CategoriaTipoProblema extends Base
{
    public $table = "categoria_tipo_problema";
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
                FROM categoria_tipo_problema ctp 
                INNER JOIN tipo_problema tp on ctp.tipo_problema_id=tp.id
                ";
                
        $r= DB::select($Ssql);
        return $r;
    }

    public function getCategoriaTipoProblema(){
        $CategoriaTipoProblema=DB::table('categoria_tipo_problema')
                ->select('id','nombre','tipo_problema_id','estado')
                ->where( 
                    function($query){
                        if ( Input::get('estado') ) {
                            $query->where('estado','=','1');
                        }
                    }
                )
                ->orderBy('nombre')
                ->get();
                
        return $CategoriaTipoProblema;
    }
}
