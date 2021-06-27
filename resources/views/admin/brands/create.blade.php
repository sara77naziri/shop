@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ایجاد برند جدید</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">نام برند</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="image">آپلود تصویر برند</label>

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
