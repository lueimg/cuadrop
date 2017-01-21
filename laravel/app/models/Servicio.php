<?php

class Servicio extends Base
{
    public $table = "servicios";
    public static $where =['id', 'nombre', 'estado'];
    public static $selec =['id', 'nombre', 'estado'];

}
