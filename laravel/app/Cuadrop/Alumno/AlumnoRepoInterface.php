<?php
namespace Cuadrop\Alumno;
use Cuadrop\Base\BaseEntity;

interface AlumnoRepoInterface
{
    public function findOrFail($id);
    public function search(array $data = array(), $paginate = false);
    public function create(array $data);
    public function update($entity, array $data);
    public function delete($entity);
}