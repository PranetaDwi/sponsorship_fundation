<?php

namespace App\Http\Resources\Public\Event;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventInformationResource extends JsonResource
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
            'cover' => $this->eventPhotos()->first()->photo_file,
            'title' => $this->title,
            'event_start_date' => $this->eventPlacement->event_start_date,
            'event_end_date' => $this->eventPlacement->event_end_date,
            'organization' => $this->organizer->organization->name,
            'address' => 'di '.$this->eventPlacement->address.', '.$this->eventPlacement->city.', '.$this->eventPlacement->province,
            'fund_information' => 'Rp' . number_format($this->sponsors->sum('amount'), 0, ',', '.').' terkumpul dari Rp'.number_format($this->eventFund->target_fund, 0, ',', '.'),
            'persentase' => ($this->sponsors->sum('amount') / $this->eventFund->target_fund) * 100,
            'total_mitra' => $this->sponsors->unique('entrepreneur_id')->count(),
            'sponsor_countdown' => 'Sisa '.Carbon::now()->diffInDays(Carbon::parse($this->eventFund->sponsor_deadline)).' hari lagi',
            'target_participants' => $this->target_participants,
            'participant_categories' => $this->participantCategories()->get()->map(function ($category) {
                return (object) [
                    'name' => $category->name,
                ];
            }),
            'participant_description' => $this->participant_description,
            'event_desciprtion' => $this->description,
            'categories' => $this->categories()->get()->map(function ($category) {
                return (object) [
                    'title' => $category->name,
                ];
            }),
        ];
    }
}
