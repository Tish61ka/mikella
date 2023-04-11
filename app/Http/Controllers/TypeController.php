<?php

namespace App\Http\Controllers;

use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function all()
    {
        return Type::all();
    }

    public function add(Request $request)
    {
        Type::create([
            'type' => $request->input('type')
        ]);
    }

    public function delete($id)
    {
        Type::where('id', $id)->delete();
    }
}
