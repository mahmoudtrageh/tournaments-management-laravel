<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>الرئيسية</title>
    @include('layouts.CSS-Layout')

</head>

<body class="text-center">

<p>تم تفعيل الفريق الخاص بك بنجاح</p>

<p>كود التسجيل الخاص باللاعبين: {{$user->code}}<p>

    @include('layouts.JS-Layout')


</body>
</html>