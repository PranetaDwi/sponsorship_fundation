<?php

namespace App\Repository\EventCategory;

interface EventCategoryRepository
{
    public function save($data);

    public function findAll();

    public function findById($id);
}