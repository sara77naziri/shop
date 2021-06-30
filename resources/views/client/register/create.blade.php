@extends('client.layout.master')
@section('home')




<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li><a href="login.html">حساب کاربری</a></li>
            <li><a href="register.html">ثبت نام</a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-9" id="content">
                <h1 class="title">ثبت نام حساب کاربری</h1>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="box">
                            <div class="box-body">
                <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="login.html">صفحه لاگین</a> مراجعه کنید.</p>
                <form class="form-horizontal" action="{{route('client.register.sendMail')}}" method="post">
                    @csrf
                    <fieldset id="account">
                        <legend>اطلاعات شخصی شما</legend>
                        <div style="display: none;" class="form-group required">
                            <label class="col-sm-2 control-label">گروه مشتری</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="1" name="customer_group_id">
                                        پیشفرض</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="email">ادرس ایمیل خود را وارد کنید:</label>

                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" value="ارسال کد" class="btn btn-primary">
                        </div>

                    </fieldset>
                </form>
            </div>
                        </div></div>
                </div>
            <!--Middle Part End -->
            <!--Right Part Start -->

            <!--Right Part End -->
        </div>
    </div>
</div>




@endsection
