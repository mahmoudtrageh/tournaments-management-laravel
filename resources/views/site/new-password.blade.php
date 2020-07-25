<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>تأكيد الكود</title>
    @include('layouts.CSS-Layout')

</head>

@include('errors.errors')

<body>

    <!--Breadcrumbs end-->
    <!--Contact form start-->
    <div class="contact-form ptb-100">
        <div class="container">
                        <h2 id="change-password" class="text-center mt-3 mb-3">تغير كلمه المرور</h2>
     
                    <div class="contact-form" style="width:50%;margin:0 auto;">
                        <p class="form-messege"></p>
                        <form id="contact-form" action="{{route('site.pass.change')}}#change-password" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="email" value="{{$email}}"/>
                            <input  type="password" class="form-control mb-3" name="password" placeholder=" كلمه المرور الجديدة">
                            <input  type="password" class="form-control mb-3" name="password_confirmation" placeholder=" تاكيد كلمه المرور الجديدة">
                            <button class="btn btn-outline-dark" type="submit">تاكيد التغير</button>
                        </form>

                    </div>

            </div>
    </div>
    <!--Contact form end-->

    @include('layouts.JS-Layout')


</body>
</html>
