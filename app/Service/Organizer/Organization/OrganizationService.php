<?php

namespace App\Service\Organizer\Organization;

use App\Http\Requests\Organizer\Organization\OrganizationEnrollmentRequest;
use App\Models\Organization;

interface OrganizationService
{
    public function getOrganizationLists();

    public function postOrganizationEnrollment(OrganizationEnrollmentRequest $request, $user_id);

    // public function addOrganization(string $id);

}