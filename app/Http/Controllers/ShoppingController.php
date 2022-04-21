<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shopping;

class ShoppingController extends Controller
{
    public function shopping(Request $req){
        $dat = Shopping::create([
            'name' => $req->name,
        ]);
        return response()->json([
            'name' => $dat->name,
            'id' => $dat->id,
            'created_at' => $dat->created_at,
        ]);
    }
}
