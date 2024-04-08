<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->resource !== null) {
            return [
                'account_id' => $this->account_id,
                'full_name' => $this->userData->full_name,
                'role' => $this->role,
            ];
        }
        
        return parent::toArray($request);
    }
}
