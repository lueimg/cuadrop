<?php

class Modalidad extends Base
{
    public $table = "modalidades";
    public static $where =['id', 'nombre'];
    public static $selec =['id', 'nombre'];
}