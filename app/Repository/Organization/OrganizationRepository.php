<?php

namespace App\Repository\Organization;

interface OrganizationRepository
{
    public function save($data);

    public function findAll();

    public function findById($id);
}