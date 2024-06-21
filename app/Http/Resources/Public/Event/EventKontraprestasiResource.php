<?php

namespace App\Http\Resources\Public\Event;

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
        if($request->route()->getName() === 'api.list-event-kontraprestasi'){
            return [
                'id' => $this->id,
                'photo_file' => $this->iconPhotoKontraprestasi->photo_file,
                'name' => $this->title,
                'range' => $this->min_sponsor.' - '.$this->max_sponsor,
                'feedback' => $this->feedback,
            ];
        } elseif ($request->route()->getName() === 'api.detail-event-kontraprestasi') {
            return [
                'id' => $this->id,
                'photo_file' => $this->iconPhotoKontraprestasi->photo_file,
                'name' => $this->title,
                'range' => $this->min_sponsor.' - '.$this->max_sponsor,
                'feedback' => $this->feedback,
            ];
        }
    }
}
