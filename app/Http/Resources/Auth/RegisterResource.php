<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
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
            'username' => $this->username,
            'email' => $this->email,
            'created_at' => $this->created_at->translatedFormat('d-M-Y')
        ];
    }

    public function with($request)
    {
        return ['status' => true, 'message' => 'register berhasil'];
    }
}
