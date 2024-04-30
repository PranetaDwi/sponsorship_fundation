<?php

namespace App\Service\Admin\EventCategoryManagement;

use App\Http\Requests\Admin\EventCategoryManagement\PostEventCategoryRequest;

interface EventCategoryManagementService
{
    
    public function getCategoryLists();

    public function postEventCategory(PostEventCategoryRequest $request);

}