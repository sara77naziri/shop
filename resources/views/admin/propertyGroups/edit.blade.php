@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ویرایش گروه ویژگی ها:</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('propertyGroups.update',$property)}}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="title">عنوان گروه :</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$property->title}}">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submin" id="submit" value="ثبت" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
