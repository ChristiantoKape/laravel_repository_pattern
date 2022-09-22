<?php

namespace App\Repositories\User;

interface UserInterface
{
    public function getAllPagination($page);
    public function findByid($id);
    public function store(array $data);
    public function update($id, array $data);
    public function delete($id);
}
