<?php
namespace Cuadrop\Problema;
use Cuadrop\Base\BaseEntity;

interface ProblemaRepoInterface
{
    public function findOrFail($id);
    public function search(array $data = array(), $paginate = false);
    public function create(array $data);
    public function update($entity, array $data);
    public function delete($entity);
}