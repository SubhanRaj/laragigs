<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{asset('images/favicon.ico')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    @vite('resources/css/app.css')
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/"><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
            <li>
                <span class="font-bold capitalise">
                    <a href="/profile" class="hover:text-laravel"><i class="fa-solid fa-user"></i>
                        Welcome {{auth()->user()->name}}
                    </a>
                </span>
            </li>
            <li>
                <a href="/manage" class="hover:text-laravel"><i class="fa-solid fa-wrench"></i>
                    Manage Listings
                </a>
            </li>
            <li>
                <form class="inline hover:text-laravel" method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-right-from-bracket"></i>Logout
                    </button>
                </form>
            </li>
            @else
            <li>
                <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
            </li>
            <li>
                <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a>
            </li>
            @endauth
        </ul>
    </nav>
    <main>
        {{$slot}}
    </main>
    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; {{date('Y')}}, All Rights reserved</p>
        @auth
        <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
        @endauth
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#toggle').click(function() {
                    var password = $('input[name="password"]');
                    var type = password.attr('type');
                    if (type === 'password') {
                        password.attr('type', 'text');
                        $('#toggle i').removeClass('fa-eye').addClass('fa-eye-slash');
                    } else {
                        password.attr('type', 'password');
                        $('#toggle i').removeClass('fa-eye-slash').addClass('fa-eye');
                    }
                    password.focus().blur();
                });
            });
        </script>
    </footer>
    <x-flash-message />
</body>

</html>