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

    <h3>وایرایش مطلب</h3>
    @include('layouts.topmenu')

    <div class="container">

        <div class="d-flex justify-content-center">
        <form action="{{ route("article.update",$image->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="Name">عنوان مطلب</label>
                <input type="text" name="name" class="form-control" placeholder="عنوان مطلب"
                       value="{{ old('name',$image->name )}}">
                @if($errors->has('name'))
                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                @endif
            </div>

            <div class="form-group">
                <label for="description">شرح مطلب</label>
                <input type="text" name="description" class="form-control" placeholder="شرح مطلب"
                       value="{{ old('description',$image->description )}}">
                @if($errors->has('description'))
                    <strong class="text-danger">{{ $errors->first('description') }}</strong>
                @endif
            </div>

            <div class="form-group">
                <div class="mb-3">
                    <label>عکس مطلب</label>
                    <input type="file" name="image" class="form-control">
                    @if($errors->has('images'))
                        <strong class="text-danger">{{ $errors->first('images') }}</strong>
                    @endif
                    <img src="{{ $image->getFirstMediaUrl('images') }}" alt="no image" width="100" height="100">
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-left">ارسال</button>
        </form>
    </div>

</div>

</body>

</html>
