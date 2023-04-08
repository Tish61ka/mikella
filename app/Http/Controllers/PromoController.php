<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function all()
    {
        return Promo::all();
    }

    public function delete($id)
    {
        Promo::where('id', $id)->delete();
    }

    public function add(Request $request)
    {
        Promo::create([
            'promo' => $request->input('promo')
        ]);
    }
}
