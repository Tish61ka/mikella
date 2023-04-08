<?php

namespace App\Http\Resources;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'id' => $this->id,
            'id_user' => User::find($this->id_user),
            'id_product' => Menu::find($this->id_product),
            'comment' => $this->comment
        ];
    }
}
