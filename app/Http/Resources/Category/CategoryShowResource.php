<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at->translatedFormat('d-M-Y'),
            'updated_at' => $this->updated_at->translatedFormat('d-M-Y'),
        ];
    }

    public function with($request)
    {
        return ['status' => true, 'message' => 'success'];
    }
}
