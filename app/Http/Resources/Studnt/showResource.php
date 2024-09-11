<?php

namespace App\Http\Resources\Studnt;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class showResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "group" => $this->group,
            "total_points" => $this->total_points,
            "current_points" => $this->current_points + $this->added_points,
            "added_points" => $this->added_points,
            "barcode" => $this->barcode,
            "created_at" => $this->created_at->toIso8601String(),
            "updated_at" => $this->updated_at->toIso8601String(),
        ];
    }
}
