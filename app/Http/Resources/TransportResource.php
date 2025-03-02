<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class TransportResource extends JsonResource{
    public function toArray($request){
        return [
            "id" => $this->id,
            "name" => $this->name,
            "type" => $this->type,
            "capacity" => $this->capacity,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
