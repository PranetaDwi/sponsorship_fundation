<?php

namespace App\Service\Umkm;

use App\Http\Requests\Umkm\UmkmEnrollmentRequest;

interface UmkmService
{
    public function getumkmLists();

    public function postumkmEnrollment(UmkmEnrollmentRequest $request);

    public function addUmkm(string $id);

}