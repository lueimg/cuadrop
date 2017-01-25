<?php

class Articulo extends Base
{
    public $table = "articulos";
    public static $where =['id', 'nombre', 'tipo_articulo','estado'];
    public static $selec =['id', 'nombre', 'tipo_articulo','estado'];

    public static function getCargar(){
        $estado="";
        if( Input::has('estado') ){
            $estado=" AND a.estado=1 ";
        }
        $Ssql=" SELECT a.*,ta.nombre as tipo
                FROM articulos a
                INNER JOIN tipo_articulo ta on ta.id=a.tipo_articulo
                WHERE 1=1 
                ".$estado;
                
        $r= DB::select($Ssql);
        return $r;
    }

    public static function getListar(){
        $where="";
        if( Input::has('estado') ){
            $where.=" AND a.estado=1 ";
        }
        if( Input::has('servicio') ){
            $where.=" AND a.tipo_articulo=1 ";
        }
        $Ssql=" SELECT a.id,a.nombre
                FROM articulos a
                WHERE 1=1 
                ".$where;

        $r= DB::select($Ssql);
        return $r;
    }
}
