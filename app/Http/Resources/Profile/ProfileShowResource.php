<?php

namespace App\Http\Resources\Profile;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileShowResource extends JsonResource
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
            'user_id' => $this->user_id,
            'fullname' => $this->fullname,
            'address' => $this->address,
            'place_of_birth' => $this->place_of_birth,
            'date_of_birth' => $this->date_of_birth,
            'profession' => $this->profession,
            'gender' => $this->gender,
            'created_at' => $this->created_at->translatedFormat('d-M-Y'),
            'updated_at' => $this->updated_at->translatedFormat('d-M-Y'),
        ];
    }

    public function with($request)
    {
        return ['status' => true, 'message' => 'success'];
    }
}
