<?php

class Ciclo extends Base
{
    public $table = "ciclos";
    public static $where =['id', 'nombre','estado'];
    public static $selec =['id', 'nombre','estado'];
    public function institutos()
    {
        return $this->belongsToMany('Instituto');
    }

}