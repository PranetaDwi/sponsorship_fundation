<?php

namespace App\Http\Resources\Organizer\Event;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventDetailBundlingResource extends JsonResource
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
            'type' => $this->type_event,
            'status' => $this->status_event,
            'categories' => $this->categories()->first()->id,
            'target_participants' => $this->target_participants,
            'participant_categories' => $this->participantCategories()->first()->name,
            'participant_description' => $this->participant_description,
            'event_desciprtion' => $this->description,
            'event_start_date' => Carbon::parse($this->eventPlacement->event_start_date)->format('d/m/Y'),
            'event_end_date' => Carbon::parse($this->eventPlacement->event_end_date)->format('d/m/Y'),
            'organization' => $this->organizer->organization->name,
            'province' => $this->eventPlacement->province,
            'event_venue' => $this->eventPlacement->event_venue,
            'city' => $this->eventPlacement->city,
            'address' => $this->eventPlacement->address,
            'target_dana' => $this->eventFund->target_fund,
            'sponsor_deadline' => Carbon::parse($this->eventFund->sponsor_deadline)->format('d/m/Y'),  
        ];
    }
}
