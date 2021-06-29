@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ویرایش  محصول {{ $product->name }} </h3>
                </div>
                <div class="box-body">
                    <form action="{{route('products.update', $product)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">نام محصول</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">   دسته بندی محصول
                            </label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" disabled selected>دسته بندی را انتخاب کنید ..</option>
                                @foreach($categories as $category)
                                    <option

                                        @if($product->category_id ==$category->id )
                                        selected
                                        @endif

                                        value="{{$category->id}}"> {{$category->title}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="brand_id">برند محصول</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="" disabled selected>برند را انتخاب کنید ..</option>
                                @foreach($brands as $brand)
                                    <option
                                        @if($product->brand_id ==$brand->id )
                                        selected
                                        @endif

                                        value="{{$brand->id}}"> {{$brand->name}} </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="cost">قیمت محصول</label>
                            <input type="number" class="form-control" name="cost" id="cost" value="{{$product->cost}}">
                       </div>


                        <div class="form-group">
                            <label for="slug"> اسلاگ محصول </label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{$product->slug}}">
                        </div>

                        <div class="form-group">
                            <label for="description"> توضیحات محصول </label>
                            <textarea  class="form-control" name="description" id="description"> {{$product->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for="image">  تصویر</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="col-sm-5">
                                    <img src="{{str_replace('public','/storage', $product->image)}}" width="50px">

                                </div>


</div>
                        </div>


                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" value="ثبت" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>



            @if(count($errors->all()) > 0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

@endsection
