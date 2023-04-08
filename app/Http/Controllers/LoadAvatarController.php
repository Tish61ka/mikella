<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoadAvatarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
    
        $fileName = $request->file->getClientOriginalName();  
     
        $request->file->move(public_path('uploads'), $fileName);
   
        /*  
            Write Code Here for
            Store $fileName name in DATABASE from HERE 
        */

        DB::table('users')
            ->where('id', "=", $request->input('id'))
            ->update(['avatar' => '../uploads/'.$fileName]);  

    
      
        // auth('sanctum')->user()->update([
        //     'id' => $request->id,
        //     'avatar' => $fileName
        // ]);
     
        return back()
            ->with('success','You have successfully upload file.')
            ->with('file', $fileName);
    }
}
