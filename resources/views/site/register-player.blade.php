
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>الرئيسية</title>
    @include('layouts.CSS-Layout')

</head>

<body class="text-center">

<p>تم تسجيل لاعب جديد في الفريق الخاص بك </p>

<p>اسم الفريق: {{$registers->name}}<p>
<p>اسم اللاعب: {{$players->name}}<p>

@include('layouts.JS-Layout')


</body>
</html>