<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class RouteResource extends JsonResource{
    public function toArray($request){
        return [
            "id" => $this->id,
            "transport_id" => $this->transport_id,
            "origin" => $this->origin,
            "destination" => $this->destination,
            "departure_time" => $this->departure_time,
            "arrival_time" => $this->arrival_time,
            "price" => $this->price,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
