<?php

namespace App\Repository\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepositoryImpl implements UserRepository
{
    public function save($data)
    {
        return User::create($data);
    }

    public function findAll()
    {
        return User::all();
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function findByAccountId($accountId){
        return User::where('account_id', $accountId)->firstOrFail();
    }

    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function updateStatus($id, $status)
    {
        User::where('id', $id)->update(['status' => $status]);

        return User::find($id);
    }

    public function resetPassword($id, $password)
    {
        return User::where('id', $id)->update(['password' => bcrypt($password)]);
    }

    public function fillUpdateById($data)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->update($data);
        $user->save();
        return User::find($id);
    }
}
