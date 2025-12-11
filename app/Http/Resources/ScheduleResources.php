<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'location' => $this->location,
            'waste_type' => $this->waste_type,
            'pcikup_time' => $this->pickup_time,
            'status' => $this->status,
        ];
    }
}
