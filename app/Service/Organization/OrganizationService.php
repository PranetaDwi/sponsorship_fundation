<?php

namespace App\Service\Organization;

use App\Http\Requests\Organization\OrganizationEnrollmentRequest;
use App\Models\Organization;

interface OrganizationService
{
    public function getOrganizationLists();

    public function postOrganizationEnrollment(OrganizationEnrollmentRequest $request);

    public function addOrganization(string $id);

}