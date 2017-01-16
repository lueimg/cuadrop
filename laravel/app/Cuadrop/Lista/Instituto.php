<?php
namespace Cuadrop\Lista;
use Cuadrop\Base\BaseEntity;

class Instituto extends BaseEntity
{
    protected $table = 'institutos';
    protected $fillable = ['nombre', 'estado'];

}