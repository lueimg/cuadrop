<?php

class Articulo extends Base
{
    public $table = "articulos";
    public static $where =['id', 'nombre', 'tipo_articulo','estado'];
    public static $selec =['id', 'nombre', 'tipo_articulo','estado'];

}
