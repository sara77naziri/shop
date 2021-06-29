@extends('admin.layout.master')

@section('content')
    <div class="col-md-12 col-lg-3">
        <div class="card">


    <div class="row">
        <div class="col-sm-12">
            <div class="box">

                <div class="box-body">
                    <form action="{{route('products.pictures.store',$product)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label for="image">آپلود تصویر </label>
                        <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" value="ثبت" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

                <div class="card">

            @foreach($product->pictures as $picture)


                <img class="card-img-top" src="{{str_replace('public','/storage',$picture->path)}}" alt="Card image cap" width="300">

                <form action="{{route('products.pictures.destroy' ,['product'=>$product , 'picture'=>$picture])}}" method="post">

                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-sm btn-danger" value="حذف">
                </form>

            @endforeach

        </div>
        <!-- /.card -->
    </div>
@endsection
