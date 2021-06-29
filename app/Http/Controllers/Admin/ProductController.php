<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index',[
            'products'=>Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create',[
            'categories'=>Category::all(),
            'brands'=>Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(ProductRequest $request)
    {

        $path=  $request->file('image')->storeAs('public/image',$request->file('image')->getClientOriginalName());
        Product::query()->create([
            'name'=>$request->get('name'),
            'category_id'=>$request->get('category_id'),
            'brand_id'=>$request->get('brand_id'),
            'cost'=>$request->get('cost'),
            'slug'=>$request->get('slug'),
            'description'=>$request->get('description'),
            'image'=>$path,

        ]);
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function edit(Product $product)
    {

    return view('admin.products.edit',[

        'categories'=>Category::all(),
        'brands'=>Brand::all(),
        'product'=>$product
    ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {

        $slugExists=Product::query()->where('slug',$request->get('slug'))
            ->where('id', '!=','$product->id')
            ->exists();
        if($slugExists){
            return back()->withErrors(['slug'=>'اسلاگ موجود است']);
        }


        $path=$product->image;
        if($request->hasFile('image')){

            $path=$request->file('image')->storeAs('public/image',$request->file('image')->getClientOriginalName());

        }
        $product->update([
            'name'=>$request->get('name' ,$product->name),
            'category_id'=>$request->get('category_id' ,$product->category_id),
            'brand_id'=>$request->get('brand_id' ,$product->brand_id),
            'cost'=>$request->get('cost' ,$product->cost),
            'slug'=>$request->get('slug' ,$product->slug),
            'description'=>$request->get('description' ,$product->description),
            'image'=>$path,

        ]);
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
}
