<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPropertyController extends Controller
{
    public function index(Product $product){
        return view('admin.productProperty.index',[
            'product'=>$product,

        ]);

    }


    public function store(Request $request,Product $product){
            $product->properties()->sync($request->get('properties'));
            return redirect()->back();
    }
    public function create(Product $product){
        return view('admin.productProperty.create'.[
            'product'=>$product
            ]);
    }
}
