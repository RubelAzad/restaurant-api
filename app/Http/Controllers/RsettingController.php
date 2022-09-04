<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsetting;

class RsettingController extends Controller
{    
    /**
     * menuId
     *
     * @param  mixed $id
     * @return void
     */
    public function menuId($id){
        $menuList = Rsetting::where('id','=',$id)->get();
        return response()->json($menuList); 
    }
}
