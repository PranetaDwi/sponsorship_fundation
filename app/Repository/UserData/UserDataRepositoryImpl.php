<?php

namespace App\Repository\UserData;

use App\Models\UserData;
use Illuminate\Support\Facades\Auth;

class UserDataRepositoryImpl implements UserDataRepository
{
    public function save($data)
    {
        return UserData::create($data);
    }

    public function fillUpdateById($data)
    {
        $id = Auth::user()->id;
        $user = UserData::findOrFail($id);
        $user->fill($data);
        $user->save();
        return UserData::find($id);
    }
}
