<?php

namespace App\Http\Resources;

use App\Models\Image;
use App\Models\Type;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
            'name' => $this->name,
            'price' => $this->price,
            'discription' => $this->discription,
            'type' => Type::find($this->type),
            'images' => Image::where('id_menus',$this->id)->get(),
            'created_at' => $this->created_at,
        ];
    }
}
