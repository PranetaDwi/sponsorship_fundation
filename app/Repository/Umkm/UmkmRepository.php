<?php

namespace App\Repository\Umkm;

interface UmkmRepository
{
    public function save($data);

    public function findAll();

    public function findById($id);
}