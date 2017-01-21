<?php

class Semestre extends Base
{
    public $table = "semestres";
    public static $where =['id', 'nombre', 'estado'];
    public static $selec =['id', 'nombre', 'estado'];

}
