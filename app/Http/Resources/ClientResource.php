<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'phone' => $this->resource->phone,
            'city' => $this->resource->city,
            'last_name' => $this->resource->last_name,
            'first_name' => $this->resource->first_name,
            'second_name' => $this->resource->second_name,
            'gender' => $this->resource->gender,
            'status' => $this->resource->status,
            'birth_date' => $this->resource->birth_date->format('d-m-Y'),
        ];
    }
}
