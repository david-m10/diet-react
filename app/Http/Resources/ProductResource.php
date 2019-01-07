<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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

            'mass_g' => $this->mass_g,
            'energy_kcal' => $this->energy_kcal,
            'energy_kj' => $this->energy_kj,
            'fat' => $this->fat,
            'saturates' => $this->saturates,
            'saturated_fatty_acids' => $this->saturated_fatty_acids,
            'carbohydrate' => $this->carbohydrate,
            'sugars' => $this->sugars,
            'fibre' => $this->fibre,
            'protein' => $this->protein,
            'salt' => $this->salt,
        ];
    }
}
