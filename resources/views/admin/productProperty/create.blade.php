@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> ویژگی های محصول {{$product->name}}</h3>
                </div>
                <div class="box-body">



                    @php
                        $propertyGroups=$product->category->propertyGroups;
                    @endphp

                    <form action="{{route('products.properties.store',$product)}}" method="post" >
                        @csrf

                        @foreach($propertyGroups as $group)


                            <h3>
                                {{$group->title}}
                            </h3>

                            @foreach($group->properties as $property)
                                <div class="form-group">

                                    <label for="name">{{$property->title}} </label>
                                    <input type="text" name="properties[{{$property->id}}]['value']" value="{{$property->getValueForProduct($product)}}" id="" class="form-control">
                                </div>

                            @endforeach

                        @endforeach



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
<?php
