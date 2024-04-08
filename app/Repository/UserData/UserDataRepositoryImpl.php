<?php

namespace App\Repository\UserData;

use App\Models\UserData;

class UserDataRepositoryImpl implements UserDataRepository
{
    public function save($data)
    {
        return UserData::create($data);
    }

    public function fillUpdateById($id, $data)
    {
        $user = UserData::find($id);
        $user->fill($data);
        $user->save();

        return UserData::find($id);
    }
}
