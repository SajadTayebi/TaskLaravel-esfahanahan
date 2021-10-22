<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$pagetitle}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body dir="rtl" style="text-align:right;">
<div class="container mt-5">
    <a href="{{route('article')}}" class="btn btn-warning float-left">بازگشت به صفحه اصلی</a>

    <h3>{{$images->name}}</h3>
    <div class="container">

        نام کاربر ایجاد کننده مطلب:{{$images->user->name}}<br><br>
        <img src="{{ $images->getFirstMediaUrl('images') }}" alt="no image" width="300" height="90"><br><br>
            <div class="clearfix"></div>
            توضیحات:{{$images->description}}<br><br>

    </div>
</div>
</body>
</html>
