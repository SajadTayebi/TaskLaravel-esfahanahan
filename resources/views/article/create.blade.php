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

<body dir="rtl" style="text-align:right">
<div class="container mt-5">
    <a href="{{route('article')}}" class="btn btn-warning float-left">بازگشت به صفحه اصلی</a>

    <h3>ایجاد مطلب جدید</h3>
    @include('layouts.topmenu')

    <div class="container">

        <div class="d-flex justify-content-center">
        <form action="{{route("article.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Name">عنوان مطلب</label>
                <input type="text" name="name" class="form-control" placeholder="عنوان مطلب">
                @if($errors->has('name'))
                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                @endif
            </div>

            <div class="form-group">
                <label for="description">شرح مطلب</label>
                <textarea type="text" name="description" class="form-control" placeholder="شرح مطلب"></textarea>
                @if($errors->has('name'))
                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                @endif
            </div>

            <div class="form-group">
                <div class="mb-3">
                    <label>عکس مطلب</label>
                    <input type="file" name="image" class="form-control">
                    @if($errors->has('images'))
                        <strong class="text-danger">{{ $errors->first('images') }}</strong>
                    @endif
                </div>
            </div>
                <label for="title">نام نویسنده:{{Auth::user()->name}}</label>
                <input type="hidden"  name="user_id" value="{{Auth::user()->id}}" >

            <button type="submit" class="btn btn-primary float-left">ارسال</button>
        </form>
    </div>
    </div>

</div>

</body>

</html>
