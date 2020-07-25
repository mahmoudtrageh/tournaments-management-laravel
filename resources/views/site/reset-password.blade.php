<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>إنشاء رقم سري</title>
    @include('layouts.CSS-Layout')

</head>

@include('errors.errors')

<body>

    <!--header section end-->
    <!--Breadcrumbs start-->
    <div class="breadcrumbs text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs-title">
                        <h2 class="mt-3">نسيت كلمه المرور </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumbs end-->
    <!--Contact form start-->
    <div class="contact-form ptb-100">
        <div class="container">
            <div class="row">
                    <div class="contact-form w-50" style="margin:0 auto;">
                        <p class="form-messege"></p>
                        <form id="contact-form" action="{{route('site-check')}}#reset-password" method="post">
                            {{csrf_field()}}
                            <input class="form-control mb-2" type="email" name="email" placeholder=" ادخل البريد الالكتروني">

                            <button class="btn btn-outline-dark" type="submit">تاكيد</button>
                        </form>


                </div>
            </div>
        </div>
    </div>
    <!--Contact form end-->


    @include('layouts.JS-Layout')


</body>
</html>
