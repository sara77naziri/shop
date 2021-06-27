@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ویرایش برند {{$brand->name}}</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('brands.update',$brand)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">نام برند</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$brand->name}}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for="image">  تصویر</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="col-sm-5">
                                    <img src="{{str_replace('public','/storage', $brand->image)}}" width="50px">

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
