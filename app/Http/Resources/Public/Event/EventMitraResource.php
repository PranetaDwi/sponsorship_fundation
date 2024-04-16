<?php

namespace App\Http\Resources\Public\Event;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventMitraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    { 
        return [
            'mitra_name' => $this->entrepreneur->mitra->name,
            'mitra_logo' => $this->entrepreneur->mitra->photo_file,
            'total_fund' => $this->total_amount,
        ];
    }
}
