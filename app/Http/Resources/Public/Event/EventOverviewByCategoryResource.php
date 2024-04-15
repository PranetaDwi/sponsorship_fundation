<?php

namespace App\Http\Resources\Public\Event;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventOverviewByCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->event->id,
            'title' => $this->event->title,
            'sponsor_countdown' => 'Sisa '.Carbon::now()->diffInDays(Carbon::parse($this->event->eventFund->sponsor_deadline)).' hari lagi',
            'collected_donor' => 'Rp' . number_format($this->event->sponsors->sum('amount'), 0, ',', '.'),
            'total_mitra' => $this->event->sponsors->unique('entrepreneur_id')->count(),
            'cover' => $this->event->eventPhotos()->first()->photo_file,
            'type_event' => $this->event->type_event,
            'categories' => $this->event->categories()->get()->map(function ($category) {
                return (object) [
                    'id' => $category->id,
                    'title' => $category->name,
                ];
            }),
        ];
    }
}
