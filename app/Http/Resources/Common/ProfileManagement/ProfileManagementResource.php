<?php

namespace App\Http\Resources\Common\ProfileManagement;

use App\Models\Entrepreneur;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileManagementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($this->role === "organizer"){
            return [
                'photo_file' => $this->organizer->organization->photo_file,
                'full_name' => $this->userData->full_name,
                'email' => $this->userData->user->email,
                'phone' => $this->userData->phone,
                'name' => $this->organizer->organization->name,
                'address' => $this->organizer->organization->address,
                'province' => $this->organizer->organization->province,
                'city' => $this->organizer->organization->city,
                'description' => $this->organizer->organization->description,

            ];
        } else {
            return [
                'photo_file' => $this->entrepreneur->mitra->photo_file,
                'full_name' => $this->userData->full_name,
                'email' => $this->userData->user->email,
                'phone' => $this->userData->phone,
                'name' => $this->entrepreneur->mitra->name,
                'address' => $this->entrepreneur->mitra->address,
                'province' => $this->entrepreneur->mitra->province,
                'city' => $this->entrepreneur->mitra->city,
                'description' => $this->entrepreneur->mitra->description,
            ]; 
        }
    }
}
