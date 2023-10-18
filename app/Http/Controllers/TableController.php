<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund;
use Auth;
class TableController extends Controller
{
    public function show(Request $request){
        $query = Fund::latest();
        if($request->has('search') && !empty($request->input('search'))){
            $query->where('name', 'like', "%" .$request->input('search') . '%')
            ->orWhere('isin', 'like', "%" .$request->input('search') . '%')
            ->orWhere('wkn', 'like', "%" .$request->input('search') . '%');
        }

        $funds = $query->paginate(30);

        return view('home', compact('funds')); 
    }

    

    
}
