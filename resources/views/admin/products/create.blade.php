@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ایجاد محصول جدید</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">نام محصول</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="category_id">   دسته بندی محصول
                                  </label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" disabled selected>دسته بندی را انتخاب کنید ..</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"> {{$category->title}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="brand_id">برند محصول</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="" disabled selected>برند را انتخاب کنید ..</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}"> {{$brand->name}} </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="cost">قیمت محصول</label>
                            <input type="number" class="form-control" name="cost" id="cost">
                        </div>
                        <div class="form-group">
                            <label for="slug"> اسلاگ محصول </label>
                            <input type="text" class="form-control" name="slug" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="description"> توضیحات محصول </label>
                            <textarea  class="form-control" name="description" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">آپلود تصویر محصول</label>

                            <input type="file" name="image" id="image" class="form-control">
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
