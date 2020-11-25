<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    //
    public function addProduct(){
    	$products = [
    		["name" => "phone"],
    		["name" => "tablet"],
    		["name" => "tab"],
    		["name" => "computer"],
    		["name" => "pc"],
    		["name" => "laptop"],
    		["name" => "pendrive"],
    		["name" => "mouse"],
    	];

    	Product::insert($products);
    	return "Product has been inserted successfully!";
    }

    public function search(){
    	return view ('search');
    }

    public function autocomplete(Request $request){
    	$datas = Product::select("name")
    					->where ("name","LIKE","%{$request->terms}%")
    					->get();
    	return response()->json($datas);
    }
}
