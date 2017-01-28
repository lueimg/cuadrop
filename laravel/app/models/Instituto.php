<?php

class Instituto extends Base
{
    public $table = "institutos";
    public static $where =['id', 'nombre', 'estado','modalidad_id'];
    public static $selec =['id', 'nombre', 'estado','modalidad_id'];
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
    
    public function modalidades()
    {
        return $this->hasMany('Modalidad');
    }
    public function ciclos()
    {
        return $this->belongsToMany('Ciclo')->withTimestamps();
    }
    public function carreras()
    {
        return $this->belongsToMany('Carrera')->withTimestamps();
    }

    public function getInstituto(){
        $sede=DB::table('institutos')
                ->select('id','nombre','estado')
                ->where( 
                    function($query){
                        if ( Input::get('estado') ) {
                            $query->where('estado','=','1');
                        }
                    }
                )
                ->orderBy('nombre')
                ->get();
                
        return $sede;
    }

    public function getInstitutoProblema($id){
        $sql="SELECT *
                FROM institutos
                WHERE FIND_IN_SET(id,
                    (SELECT instituto_ids
                    FROM tipo_problema
                    WHERE id=$id
                    )
                )>0
                AND estado=1";
        $r=DB::select($sql);
        return $r;
    }
}
