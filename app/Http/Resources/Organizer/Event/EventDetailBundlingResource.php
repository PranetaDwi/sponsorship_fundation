<?php

namespace App\Http\Resources\Organizer\Event;

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
            'event_start_date' => $this->eventPlacement->event_start_date,
            'event_end_date' => $this->eventPlacement->event_end_date,
            'organization' => $this->organizer->organization->name,
            'province' => $this->eventPlacement->province,
            'city' => $this->eventPlacement->city,
            'address' => $this->eventPlacement->address,
            'target_dana' => $this->eventFund->target_fund,
            'sponsor_deadline' => $this->eventFund->sponsor_deadline,  
        ];
    }
}
