<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        // $user = User::with('solvers.challenge')->find($this->id);
        return [
            'id' =>$this->id,
            'test' => "Test",
            'username' => $this->username,
            // 'challenge_solves' => $user->solvers
        ];
    }
}
