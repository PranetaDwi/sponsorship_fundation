<?php

namespace App\Http\Resources\Organizer\Event;

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
            'sponsor_deadline' => $this->donation_deadline,
            'target_fund' => $this->target_fund,
            'event_start_date' => $this->event_start_date,
            'event_end_date' => $this->event_end_date,
        ];
    }
}
