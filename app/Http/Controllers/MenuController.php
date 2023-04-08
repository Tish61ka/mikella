<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuResource;
use App\Models\Image;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function allMenu(){
        return MenuResource::collection(Menu::inRandomOrder()->get());
    }

    public function createProduct(Request $request)
    {
        Menu::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'discription' => $request->input('discription'),
            'type' => $request->input('type'),
        ]);

        $menu = Menu::get()->last();

        $fileName = $request->file->getClientOriginalName();
        $request->file->move(public_path('menu'), $fileName);

        Image::create([
            'id_menus' => $menu->id,
            'img' => '../menu/'.$fileName
        ]);
    }
    
    public function delete($id)
    {
        Menu::where('id', $id)->delete();
    }

    public function find($id)
    {
        return MenuResource::collection(Menu::where('id',$id)->get());
    }

    public function edit(Request $request)
    {
        Menu::where('id', $request->input('id_product'))->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'discription' => $request->input('discription'),
            'type' => $request->input('type')
        ]);

        $fileName = $request->file->getClientOriginalName();
        $request->file->move(public_path('menu'), $fileName);

        Image::create([
            'id_menus' => $request->input('id_product'),
            'img' => '../menu/'.$fileName
        ]);
    }
}