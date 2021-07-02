@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ویرایش ویژگی </h3>
                </div>
                <div class="box-body">
                    <form action="{{route('properties.update',$property)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">ویژگی</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$property->title}}">
                        </div>

                        <div class="form-group">
                            <label for="property_group_id">گروه ویژگی ها</label>
                            <select name="property_group_id" id="property_group_id" class="form-control">
                                <option value="" disabled selected> گروه ویژگی هارا انتخاب کنید ..</option>
                                @foreach($groups as $group)
                                    <option
                                        @if($group->id == $property->property_group_id)
                                            selected
                                        @endif

                                        value="{{$group->id}}">{{$group->title}}</option>
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
