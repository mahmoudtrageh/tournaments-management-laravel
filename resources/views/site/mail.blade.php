<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>الرئيسية</title>
    @include('layouts.CSS-Layout')

</head>

<body class="text-center">

<p>تم تسجيل فريق جديد بنجاح</p>

<p>اسم الفريق: {{$teams->name}}<p>
<p>اسم المسؤول: {{$teams->manager_name}}<p>
<p>ايميل المسؤول: {{$teams->manager_email}}<p>
@include('layouts.JS-Layout')


</body>
</html>