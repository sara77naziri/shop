<?php


namespace App\Http\Controllers\Client;


use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductController
{
public function show(Product  $product){
    return view('client.products.show',[
        'product'=>$product,

    ]);
}
}
