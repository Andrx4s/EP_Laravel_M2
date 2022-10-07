<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Практическая работа</title>
    <link rel="stylesheet" href="/public/assets/css/bootstrap.css">
    <script src="/public/assets/js/bootstrap.bundle.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Практика)))</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Главная</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Авторизация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Посты
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('posts.create')}}">Добавить пост</a></li>
                            <li><a class="dropdown-item" href="{{route('posts.index')}}">Посты</a></li>
                        </ul>
                    </li>
                    @if(Auth::user()->role->name == 'Администратор')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Администрирование
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{route('admin.roles.index')}}">Просмотр ролей</a></li>
                                <li><a class="dropdown-item" href="{{route('admin.roles.create')}}">Добавить роль</a></li>
                                <li><a class="dropdown-item" href="{{route('admin.user.index')}}">Все пользователи</a></li>
                                <li><a class="dropdown-item" href="{{route('admin.user.create')}}">Добавить пользователя</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">Выход</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>
