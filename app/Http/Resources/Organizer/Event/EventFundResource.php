<?php

namespace App\Http\Resources\Organizer\Event;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventFundResource extends JsonResource
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
            'target_fund' => $this->target_fund,
            'sponsor_deadline' => $this->sponsor_deadline,
        ];
    }
}
