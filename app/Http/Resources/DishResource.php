<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DishResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'name' => $this->name,
            'description_short' => $this->description_short,
            'description' => $this->description,

            'time_preparation' => $this->time_preparation,
            'time_making' => $this->time_making,
            'persons_min' => $this->persons_min,
            'persons_max' => $this->persons_max,

            'is_public' => $this->is_public,
            'main_image_url' => $this->main_image_url,
            'favorites_count' => random_int(1, 99),

            'created_at' => $this->created_at,
        ];
    }
}
