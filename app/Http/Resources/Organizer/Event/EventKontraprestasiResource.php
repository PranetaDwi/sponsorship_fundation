<?php

namespace App\Http\Resources\Organizer\Event;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventKontraprestasiResource extends JsonResource
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
            'icon_photo_kontraprestasi' => $this->icon_photo_kontraprestasi_id->iconhotoKontraprestasi->photo_file,
            'title' => $this->title,
            'min_sponsor' => $this->min_sponsor,
            'max_sponsor' => $this->max_sponsor,
            'feedback' => $this->feedback,
        ];
    }
}
