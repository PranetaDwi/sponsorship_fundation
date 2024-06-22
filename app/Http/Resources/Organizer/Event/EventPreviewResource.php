<?php

namespace App\Http\Resources\Organizer\Event;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventPreviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'type_event' => $this->type_event,
            'cover' => $this->eventPhotos()->first()->photo_file,
            'event_date' => date('d F Y', strtotime($this->eventPlacement->event_start_date)),
            'sponsor_countdown' => 'Sisa '.Carbon::now()->diffInDays(Carbon::parse($this->eventFund->sponsor_deadline)).' hari lagi',
            'total_mitra' => $this->sponsors->unique('entrepreneur_id')->count(),
            'fund_information' => 'Rp' . number_format($this->sponsors->sum('amount'), 0, ',', '.').' terkumpul dari Rp'.number_format($this->eventFund->target_fund, 0, ',', '.'),
            'persentase' => ($this->sponsors->sum('amount') / $this->eventFund->target_fund) * 100,
            'progress' => $this->sponsors->sum('amount') / $this->eventFund->target_fund,
            'cover' => $this->eventPhotos()->first()->photo_file,
            'categories' => $this->categories()->get()->map(function ($category) {
                return (object) [
                    'title' => $category->name,
                ];
            }),
        ];
    }
}
