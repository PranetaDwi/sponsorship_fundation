<?php

namespace App\Repository\EventPhoto;

interface EventPhotoRepository
{
    public function save($data);

    public function findAll();

    public function findById($id);
}