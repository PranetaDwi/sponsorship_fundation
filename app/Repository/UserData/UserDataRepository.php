<?php

namespace App\Repository\UserData;

interface UserDataRepository
{
    public function save($data);

    public function fillUpdateById($data);
}
