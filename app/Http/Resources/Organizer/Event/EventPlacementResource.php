<?php

namespace App\Http\Resources\Organizer\Event;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventPlacementResource extends JsonResource
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
            'event_start_date' => $this->event_start_date,
            'event_end_date' => $this->event_end_date,
            'event_venue' => $this->event_venue,
            'address' => $this->address,
            'city' => $this->city,
            'province' => $this->province,      
        ];
    }
}
