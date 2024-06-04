<?php

namespace App\Repository\ParticipantCategory;

use App\Models\ParticipantCategory;

class ParticipantCategoryRepositoryImpl implements ParticipantCategoryRepository
{
    public function save($data)
    {
        return ParticipantCategory::create($data);

    }

}