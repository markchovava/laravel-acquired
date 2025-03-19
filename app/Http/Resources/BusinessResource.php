<?php

namespace App\Http\Resources;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'city_id' => $this->city_id,
            'category_id' => $this->category_id,
            'province_id' => $this->province_id,
            'image' => $this->image,
            'name' => $this->name,
            'status' => $this->status,
            'description' => $this->description,
            'price' => $this->price,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => new UserResource($this->whenLoaded('user')),
            'city' => new CityResource($this->whenLoaded('city')),
            'province' => new ProvinceResource($this->whenLoaded('province')),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'business_details' => BusinessDetailResource::collection(($this->whenLoaded('business_details')))
        ];
    }
}
