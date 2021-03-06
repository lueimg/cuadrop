<?php

class TipoProblema extends Base
{
    public $table = "tipo_problema";
    public static $where =['id', 'nombre', 'instituto_ids', 'estado'];
    public static $selec =['id', 'nombre', 'instituto_ids', 'estado'];
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

    public function getListar(){
        $tipoproblema=DB::table('tipo_problema as tp')
                ->select('tp.id','tp.nombre','tp.estado')
                ->where( 
                    function($query){
                        if ( Input::has('estado') ) {
                            $query->where('tp.estado','=','1');
                        }
                    }
                )
                ->groupBy('tp.id')
                ->orderBy('tp.nombre')
                ->get();
                
        return $tipoproblema;
    }

    public function getTipoProblema(){
        $tipoproblema=DB::table('tipo_problema as tp')
                ->join('tipo_problema_categorias as tpc','tp.id','=','tpc.tipo_problema_id')
                ->select('tp.id','tp.nombre','tp.estado')
                ->where( 
                    function($query){
                        if ( Input::get('estado') ) {
                            $query->where('tp.estado','=','1')
                                ->where('tpc.estado','=','1');
                        }
                        if ( Input::has('porusuario') ) {
                            $query->whereRaw('FIND_IN_SET(tpc.id,"'.Auth::user()->tipo_problema_ids.'")');
                        }
                    }
                )
                ->groupBy('tp.id')
                ->orderBy('tp.nombre')
                ->get();
                
        return $tipoproblema;
    }

    public function getTipoProblemaGrupo(){
        $tipoproblema=DB::table('tipo_problema as tp')
                ->join('tipo_problema_categorias as tpc','tp.id','=','tpc.tipo_problema_id')
                ->select('tpc.id','tpc.nombre','tp.nombre as grupo','tp.id as grupo_id')
                ->where( 
                    function($query){
                        if ( Input::get('estado') ) {
                            $query->where('tp.estado','=','1')
                                ->where('tpc.estado','=','1');
                        }
                        if ( Input::has('porusuario') ) {
                            $query->whereRaw('FIND_IN_SET(tpc.id,"'.Auth::user()->tipo_problema_ids.'")');

                        }
                    }
                )->orderBy('tp.nombre')->orderBy('tpc.nombre')->get();

        /*if ( Input::has('porusuario') ) {
            $tipoproblema->select('tpc.id','tpc.nombre','tp.nombre as grupo','tpc.estado');
        }
        else{
            $tipoproblema->select('tpc.id','tpc.nombre','tp.nombre as grupo');
        }*/

        //$tipoproblema->orderBy('nombre')->get();
                
        return $tipoproblema;
    }
}
