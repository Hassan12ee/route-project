<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "Product_id"=>$this->id,
            "Product_name"=>$this->name,
            "Product_price"=>$this->price,
            "Product_desc"=>$this->desc,
            "Product_Quantity"=>$this->quantity,
            "Product_photo"=>asset("storage"."/".$this->photo),

        ];
    }
}
