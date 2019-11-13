<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Restaurants extends JsonResource
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
            'RestaurantName' => $this->name,
            'Branch' => $this->branch,
            'Phone' => $this->phone,
            'Email' => $this->email,
            'Logo' => $this->logo,
            'Address' => $this->address,
            'HouseNumber' => $this->housenumber,
            'Postcode' => $this->postcode,
            'City' => $this->city,
            'Latitude' => $this->latitude,
            'Longitude' => $this->longitude,
            'Url' => $this->url,
            'Open' => $this->open,
            'BestMatch' => $this->bestMatch,
            'NewestScore' => $this->newestScore,
            'RatingAverage' => $this->ratingAverage,
            'Popularity' => $this->popularity,
            'AverageProductPrice' => $this->averageProductPrice,
            'DeliveryCosts' => $this->deliveryCosts,
            'MinimumOrderAmount' => $this->minimumOrderAmount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
