<?php

namespace App\Repository\User;

interface UserRepository
{
    public function save($data);

    public function findAll();

    public function findById($id);

    public function findByAccountId($accountId);

    public function findByEmail($email);

    public function updateStatus($id, $status);

    public function resetPassword($id, $password);

    public function fillUpdateById($data);
}