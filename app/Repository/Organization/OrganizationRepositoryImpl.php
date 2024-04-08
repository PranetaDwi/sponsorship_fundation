<?php

namespace App\Repository\Organization;

use App\Models\Organization;

class OrganizationRepositoryImpl implements OrganizationRepository
{
    public function save($data)
    {
        return Organization::create($data);
    }

    public function findAll()
    {
        return Organization::all();
    }

    public function findById($id)
    {
        return Organization::findOrFail($id);
    }
}