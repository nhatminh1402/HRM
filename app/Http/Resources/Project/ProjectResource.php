<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'code_project' => $this->code_project,
            'name' => $this->name,
            'description' => $this->description,
            'selectedEmployees' => $this->employees->pluck('id')->toArray(),
            'created_at' => $this->created_at ? $this->created_at->format('Y/m/d H:i') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('Y/m/d H:i') : null,
        ];
    }
}
