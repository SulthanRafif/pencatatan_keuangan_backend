<?php

namespace App\Http\Resources\FinancialRecord;

use Illuminate\Http\Resources\Json\JsonResource;

class FinancialRecordShowResource extends JsonResource
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
            'income' => $this->income,
            'expenditure' => $this->expenditure,
            'balance' => $this->balance,
            'created_at' => $this->created_at->translatedFormat('d-M-Y'),
            'updated_at' => $this->updated_at->translatedFormat('d-M-Y'),
        ];
    }

    public function with($request)
    {
        return ['status' => true, 'message' => 'success'];
    }
}
