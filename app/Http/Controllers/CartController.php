<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function all()
    {
        return CartResource::collection(Cart::where('id_user',Auth::user()->id)->get());
    }

    public function add($id, Request $request)
    {
        $mycart = Cart::where('id_user',Auth::user()->id)->where('id_product',$id)->get()->first();
        $count = $request->input('counter');

        if(!$mycart){
            Cart::create([
                'id_user' => Auth::user()->id,
                'id_product' => $id,
                'count' => $count
            ]);
        }
        else{
            $count += $mycart->count;
            Cart::where('id_user',Auth::user()->id)->where('id_product',$id)->update([
                'count' => $count
            ]);
        }        
    }

    public function delete($id)
    {
        $mycart = Cart::where('id_user',Auth::user()->id)->where('id_product',$id)->get()->first();

        if($mycart->count == 1){
            Cart::where('id_user',Auth::user()->id)->where('id_product',$id)->delete();
        }
        else{
            $count = $mycart->count - 1;
            Cart::where('id_user',Auth::user()->id)->where('id_product',$id)->update([
                'count' => $count
            ]);
        }
    }
}
