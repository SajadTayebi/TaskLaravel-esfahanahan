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
    <h2>لیست مطالب</h2>

    @include('layouts.topmenu')

            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>عنوان مطلب</th>
                    <th>عکس</th>
                    <th>نام کاربر ایجادکننده</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($images as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td>{{ $image->name }}</td>
                        <td><img src="{{ $image->getFirstMediaUrl('images') }}" alt="no image" width="70" height="70"></td>
                        <td>{{$image->user->name}}</td>
                        <td><a class="btn btn-xs btn-primary" href="{{ route('article.show',$image->id) }}">
                                نمایش
                            </a></td>
                        @auth
                        <td>
                            @if(auth()->user()->name == $image->user->name)
                            <a class="btn btn-xs btn-primary" href="{{ route('article.edit',$image->id) }}">
                                ویرایش
                            </a>
                                @endif
                        </td>
                        @endauth
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
</body>

</html>
