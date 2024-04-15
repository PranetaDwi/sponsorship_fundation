<?php

namespace App\Http\Resources\Public\Event;

use Carbon\Carbon;
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
                'sponsor_countdown' => 'Sisa '.Carbon::now()->diffInDays(Carbon::parse($this->eventFund->sponsor_deadline)).' hari lagi',
                'collected_donor' => 'Rp' . number_format($this->sponsors->sum('amount'), 0, ',', '.'),
                'total_mitra' => $this->sponsors->unique('entrepreneur_id')->count(),
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
                'sponsor_countdown' => 'Sisa '.Carbon::now()->diffInDays(Carbon::parse($this->eventFund->sponsor_deadline)).' hari lagi',
                'collected_donor' => 'Rp' . number_format($this->sponsors->sum('amount'), 0, ',', '.'),
                'total_mitra' => $this->sponsors->unique('entrepreneur_id')->count(),
                'cover' => $this->eventPhotos()->first()->photo_file,
                'type_event' => $this->type_event,
                'categories' => $this->categories()->get()->map(function ($category) {
                    return (object) [
                        'id' => $category->id,
                        'title' => $category->name,
                    ];
                }),
            ];
        }

    }
}
