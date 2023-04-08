<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductsOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function allAdmin()
    {
        return OrderResource::collection(Order::all());
    }

    public function editStatus($id, Request $request)
    {
        Order::where('id', $id)->update([
            'status' => $request->input('status')
        ]);
    }

    public function allEndOrders()
    {
        return OrderResource::collection(Order::where('id_user', Auth::user()->id)->where('status', 'Завершен')->get());
    }
    
    public function all()
    {
        return OrderResource::collection(Order::where('id_user', Auth::user()->id)->where('status', '!=', 'Завершен')->get());
    }

    public function createOrder(Request $request)
    {
        $mycart = Cart::select('id_product','count')->where('id_user', Auth::user()->id)->get();

            Order::create([
                'id_user' => Auth::user()->id,
                'order_price' => $request->input('summ'),
            ]);

        $myorder = Order::select('id')->where('id_user',Auth::user()->id)->get()->last();
        
        for ($i=0; $i < count($mycart); $i++) {
            ProductsOrder::create([
                'id_order' => $myorder->id,
                'id_product' => $mycart[$i]['id_product'],
                'count' => $mycart[$i]['count']
            ]);
        }

        Cart::where('id_user', Auth::user()->id)->delete();
    }
}
