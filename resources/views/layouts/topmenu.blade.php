    <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ $message }}
            </div>
        @endif
        <div class="col-md-12">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <nav class="navbar navbar-expand-sm">
                    <ul class="navbar-nav">
                        @auth
                            <li>
                                <button class="btn">
                                نام کاربری: {{Auth::user()->name}}
                                </button>
                            </li>
                            <li><a href="{{ route('article.create') }}" class="btn btn-success">ایجاد</a></li>
                            <li>
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">خروج</button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{route('register')}}" class="btn btn-primary">ثبت نام کاربر جدید</a>
                            </li>
                            <li>
                                <a href="{{route('login')}}" class="btn btn-warning">فرم ورود</a>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
    </div>

