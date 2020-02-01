<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class searchController extends Controller
{
    public function getSearch(){
        return view('search');
    }
    public function searchPost(Request $request){
        $inp = $request->all();
        
    }
}
