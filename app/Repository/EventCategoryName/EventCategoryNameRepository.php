<?php

namespace App\Repository\EventCategoryName;

interface EventCategoryNameRepository
{
    public function save($data);

    public function findAll();

    public function findById($id);
}