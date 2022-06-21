<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                        => $this->id,
            'name'                      => $this->name,
            'completion_date'           => $this->completion_date,
            'completion_date_formated'  => $this->completion_date->format('d/m/Y'),
            'status'                    => $this->status,
            'user_id'                   => $this->user_id,
            'user_name'                 => $this->user->name,
            'created_at'                => $this->created_at->format('d/m/Y'),
            'updated_at'                => $this->updated_at->format('d/m/Y'),
        ];
    }
}
