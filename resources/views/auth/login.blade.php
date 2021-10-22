<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ورود کاربران</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body dir="rtl" style="text-align:right">
<div class="container mt-5">
    <a href="{{route('article')}}" class="btn btn-warning float-left">بازگشت به صفحه اصلی</a>

    <h3>ورود کاربران</h3>
    @include('layouts.topmenu')

    <div class="container">

        <div class="d-flex justify-content-center">
            <form action="{{route('login')}}" method="POST">
                @csrf


                <div class="form-group">
                    <label for="title">ایمیل</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{old('email')}}">
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">رمز ورود</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">مرا بخاطر بسپار</label>
                    <input type="checkbox" class="form-check-input" name="remember">

                </div>

                <div class="form-group">
                    <label for="title"></label>
                    <button type="submit" class="btn btn-success float-left">ورود</button>
                </div>

            </form>


        </div>
    </div>
</body>

</html>
