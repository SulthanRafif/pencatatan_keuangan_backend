<?php

namespace App\Http\Resources\FinancialRecord;

use Illuminate\Http\Resources\Json\JsonResource;

class FinancialRecordIndexResource extends JsonResource
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
            'income' => $this->income,
            'expenditure' => $this->expenditure,
            'balance' => $this->balance,
            'user' => $this->user,
            'category' => $this->category
        ];
    }

    public function with($request)
    {
        return ['status' => true, 'message' => 'success'];
    }
}
