<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdsResource extends JsonResource
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
            'id' => $this->id,
            'photos' => $this->getPhotos(),
            'title' => $this->title,
            'user_name' => $this->user->name,
            'user_phone' => $this->user->phone,
            'brand' => $this->brand,
            'color' => $this->color,
            'price' => $this->price . " AED",
            'kilometers' => $this->kilometers . " KM",
            'condition' => $this->condition,
            'description' => $this->description,
            'posted_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
