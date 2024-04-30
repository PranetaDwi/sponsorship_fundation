<?php

namespace App\Http\Resources\Organizer\Event;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventCategoriesResource extends JsonResource
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
            'name' => $this->name,
            'icon' => $this->icon,
        ];
        return parent::toArray($request);
    }
}
