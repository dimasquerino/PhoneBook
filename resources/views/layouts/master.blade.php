<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Laravel 9</title>

    <link rel="shortcut icon" href="{{ url('images/favicon.ico') }}" type="image/png">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.3/dist/flowbite.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body class="bg-gray-50 min-h-screen flex justify-center items-center font-nunito">
    <div class="flex flex-col items-center w-full px-4 md:px-0">
        <div class="bg-white p-4 md:p-6 rounded-3xl shadow-md w-full md:w-3/4 xl:w-2/4">
            @include('includes.header')
            @yield('content')
            @include('includes.footer')
        </div>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="shadow bg-red-300 hover:bg-red-500 focus:shadow-outline focus:outline-none text-white py-2 px-4 py-2 mt-4 rounded cursor-pointer">Sair
            </button>
        </form>
    </div>
    <script src="https://unpkg.com/flowbite@1.4.3/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js" integrity="sha512-hAJgR+pK6+s492clbGlnrRnt2J1CJK6kZ82FZy08tm6XG2Xl/ex9oVZLE6Krz+W+Iv4Gsr8U2mGMdh0ckRH61Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('script')
</body>
</html>
