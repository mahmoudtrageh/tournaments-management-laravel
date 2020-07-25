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


    <!--Contact form start-->
    <div class="contact-form ptb-100">
        <div class="container">
                   
                    <h2 id="confirm-code" class="text-center mt-3 mb-3">تأكيد الكود</h2>

            <div class="alert alert-success messagesub text-center">
                برجاء إدخال الكود المرسل للبريد الإلكترونى
            </div>
                    <div class="contact-form" style="width:50%;margin:0 auto;">
                        <p class="form-messege"></p>
                        <form id="contact-form" action="{{route('code.confirmation')}}#confirm-code" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="email" value="{{$email}}"/>
                            <input  class="form-control mb-3" type="email" placeholder="البريد الالكتروني" value="{{$email}}" readonly >
                            <input  class="form-control mb-3" type="text" name="code" placeholder="ادخل الكود">

                            <button class="btn btn-outline-dark" type="submit">تاكيد</button>
                        </form>

                    </div>

        </div>
    </div>
    <!--Contact form end-->


    @include('layouts.JS-Layout')


</body>
</html>