@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">
                         محصولات
                    </h1>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام محصول </th>
                                <th>نام دسته بندی </th>
                                <th>نام برند </th>
                                <th>قیمت محصول </th>
                                <th>اسلاگ محصول </th>
                                <th>توضیحات محصول </th>

                                <th>تصویر</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->category->title}}</td>
                                    <td>{{$product->category->title}}</td>
                                    <td>{{$product->brand->name}}</td>
                                    <td>{{$product->cost}}</td>
                                    <td>{{$product->slug}}</td>
                                    <td>{{$product->description}}</td>

                                    <td>
                                        <img src="{{str_replace('public','/storage', $product->image)}}" width="50px"></td>


                                    <td>
                                        <a href="{{route('products.edit', $product)}}" class="btn btn-sm btn-primary">ویرایش</a>
                                    </td>

                                    <td>
                                        <form action="{{route('products.destroy', $product)}}" method="post">
                                            @csrf
                                @method('DELETE')
                                    <input type="submit" class="btn btn-sm btn-danger" value="حذف">
                                </form>
                            </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>نام محصول</th>

                            </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="/admin/assets/vendor_components/datatable/datatables.min.js"></script>

    <!-- Superieur Admin for Data Table -->
    <script src="/admin/js/pages/data-table.js"></script>


@endsection
