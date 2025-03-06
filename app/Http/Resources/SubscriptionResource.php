<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
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
            'membership_id' => $this->membership_id,
            'status' => $this->status,
            'amount_paid' => $this->amount_paid,
            'expiry_date' => $this->expiry_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'membership' => new MembershipResource($this->whenLoaded('membership')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
