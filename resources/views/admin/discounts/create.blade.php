@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ایجاد تخفیف</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('products.discounts.store',$product)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="value">تخفیف</label>
                            <input type="number" class="form-control" name="value" id="value" max="100" min="0">
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
