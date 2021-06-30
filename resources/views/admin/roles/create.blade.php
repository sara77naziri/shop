@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> ایجادنقش</h3>
                </div>
                <div class="box-body">

                    <form action="{{route('roles.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">عنوان نقش</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>

                            @foreach($permissions as $permission)
                            <div class="form-check">
                                <label class="form-check-label" >
                                <input style="opacity: 1 !important; position: static !important; left: 0;right: 0;" class="form-check-input" type="checkbox" name="permissions[]" value="{{$permission->id}}">
                                    {{$permission->label}}

                                </label>
                            </div>

                            @endforeach


                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" value="ثبت" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
