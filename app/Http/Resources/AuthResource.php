<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
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
            'role_id' => $this->role_id,
            'membership_id' => $this->membership_id,
            'fname' => $this->fname,
            'lname' => $this->lname,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'linkedin' => $this->linkedin,
            'skillset' => $this->skillset,
            'acquisition' => $this->acquisition,
            'bio' => $this->bio,
            'password' => $this->password,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'role' => new RoleResource($this->whenLoaded('role')),
            'membership' => new MembershipResource($this->whenLoaded('membership')),
        ];
    }
}
