<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'category' => $this->category,
            'summary' => $this->summary,
            'description' => $this->description,
            'url' => $this->url,
            'repository_url' => $this->repository_url,
            'image' => $this->image,
            'images' => $this->images ?? [],
            'stack' => $this->stack ?? [],
            'href' => route('projects.show', $this->slug),
        ];
    }
}
