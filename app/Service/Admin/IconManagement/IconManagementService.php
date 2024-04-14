<?php

namespace App\Service\Admin\IconManagement;

use App\Http\Requests\Admin\IconManagement\PostIconRequest;

interface IconManagementService
{
    public function getIconLists();

    public function postIconKontraprestasi(PostIconRequest $request);


}