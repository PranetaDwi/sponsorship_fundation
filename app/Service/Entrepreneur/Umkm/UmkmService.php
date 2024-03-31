<?php

namespace App\Service\Entrepreneur\Umkm;

use App\Http\Requests\Entrepreneur\Umkm\UmkmEnrollmentRequest;

interface UmkmService
{
    public function getumkmLists();

    public function postumkmEnrollment(UmkmEnrollmentRequest $request, $user_id);

}