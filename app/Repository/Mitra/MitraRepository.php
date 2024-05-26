<?php

namespace App\Repository\Mitra;

interface MitraRepository
{
    public function save($data);

    public function findAll();

    public function findById($id);

    public function update($data, $id);
}