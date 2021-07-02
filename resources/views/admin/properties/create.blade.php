@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ایجاد  ویژگی </h3>
                </div>
                <div class="box-body">
                    <form action="{{route('properties.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">ویژگی </label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>

                        <div class="form-group">
                            <label for="property_group_id"> گروه ویژگی </label>
                            <select name="property_group_id" id="property_group_id" class="form-control">
                                <option value="" disabled selected> گروه ویژگی را انتخاب کنید ..</option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            </select>
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
