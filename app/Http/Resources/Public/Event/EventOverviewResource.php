<?php

namespace App\Http\Resources\Public\Event;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventOverviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($request->route()->getName() === 'api.overview-event-populer' || $request->route()->getName() === 'api.overview-event-by-category'){
            return [
                'id' => $this->id,
                'title' => $this->title,
                'sponsor_countdown' => $this->donation_deadline,
                'collected_donor' => $this->target_fund,
                'total_mitra' => $this->target_participants,
                'cover' => $this->eventPhotos()->first()->photo_file,
                'categories' => $this->categories()->get()->map(function ($category) {
                    return (object) [
                        'id' => $category->id,
                        'title' => $category->name,
                    ];
                }),
            ];
        } elseif($request->route()->getName() === 'api.overview-event-all'){
            return [
                'id' => $this->id,
                'title' => $this->title,
                'sponsor_countdown' => $this->donation_deadline,
                'collected_donor' => $this->target_fund,
                'total_mitra' => $this->total_mitra,
                'cover' => $this->eventPhotos()->first(),
                'event_type' => $this->event_type,
                'categories' => $this->categories()->get()->map(function ($category) {
                    return (object)[
                        'id' => $category->id,
                        'title' => $category->name,
                    ];
                }),
            ];
        }

    }
}
