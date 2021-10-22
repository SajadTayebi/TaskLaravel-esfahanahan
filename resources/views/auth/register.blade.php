<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ثبت نام کاربران</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body dir="rtl" style="text-align:right">
<div class="container mt-5">
    <a href="{{route('article')}}" class="btn btn-warning float-left">بازگشت به صفحه اصلی</a>

    <h3>ثبت نام کاربران</h3>
    @include('layouts.topmenu')

    <div class="container">

        <div class="d-flex justify-content-center">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">نام کاربری</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{old('name')}}">
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">ایمیل</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{old('email')}}">
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">رمز عبور</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">تکرار رمز عبور</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation">
                    @error('password_confirmation')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="title"></label>
                    <button type="submit" class="btn btn-success float-left">ثبت نام</button>
                </div>

            </form>


        </div>
    </div>
</div>
</body>

</html>
