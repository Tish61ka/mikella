<?php

namespace App\Http\Resources;

use App\Models\Menu;
use App\Models\ProductsOrder;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_price' => $this->order_price,
            'status' => $this->status,
            'products' => ProductsOrderResource::collection(ProductsOrder::where('id_order', $this->id)->get())
        ];
    }
}
