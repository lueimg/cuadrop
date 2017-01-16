<?php

class TipoArticulo extends Base
{
    public $table = "tipo_articulo";
    public static $where =['id', 'nombre', 'estado'];
    public static $selec =['id', 'nombre', 'estado'];

}
