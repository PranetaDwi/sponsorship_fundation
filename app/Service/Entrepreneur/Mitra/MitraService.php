<?php

namespace App\Service\Entrepreneur\Mitra;

use App\Http\Requests\Entrepreneur\Mitra\MitraEnrollmentRequest;

interface MitraService
{
    public function getMitraLists();

    public function postMitraEnrollment(MitraEnrollmentRequest $request, $user_id);

}