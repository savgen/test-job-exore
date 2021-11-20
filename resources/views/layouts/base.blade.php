<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Test job</title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('fonts/font-awesome/css/all.css') }}">
    </head>
    <body>
        <div class="base-container">
            <div class="header-container">
                <div class="logo">
                    <a href="/">
                        Панель управления
                    </a>
                </div>
                <div class="navigation">
                    @auth
                        @role('manager')
                            <div class="box">
                                <a href="/employees/">Cотрудники</a>
                            </div>
                        @endrole
                        <div class="box">
                            <a href="/">Статьи</a>
                        </div>
                    @endauth
                    
                </div>
                <div class="auth-button">
                    @auth
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            {{ __('Выйти') }}
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <div class="box">
                            <a href="/login" class="link-default">
                                <div><i class="fas fa-fw fa-sign-in-alt"></i></div>
                                <div>Авторизация</div>
                            </a>
                        </div>
                        <div class="box">
                            <a href="/register" class="link-default">
                                <div></div>
                                <div>Регистрация</div>
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="content-container">
                @yield('content')
            </div>
            <div class="footer-container">
                Тестовое задание &copy; 2021
            </div>
        </div>
    </body>
</html>