<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Timetable Management System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('styles.css')}}">
    <style>
        html,
        body {
            min-height: 100vh;
            min-width: 100vw;
        }

        body {
            background: url({{asset('assets/images/bg_welcome.svg')}});
            background-size: cover;
            background-repeat: no-repeat;
        }

        .main {
            width: 90vw;
            max-width: 1400px;
            min-height: 80vh;
            display: flex;
            justify-content: center;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        .main div {
            min-width: 320px;
        }
    </style>

</head>

<body class="font-sans antialiased flex justify-center items-center ">
    <div class="main flex">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="grid grid-cols-2 items-center gap-2 py-10">
                <div class="pl-10 flex items-center">
                    <img src="{{asset('assets/images/logo.png')}}" class="pr-5" style="height: 50px;">
                    <p class="text-xl hidden lg:block lg:text-2xl font-bold p-5 text-blue-700 border-l-2">
                        Timetable Management System
                    </p>
                </div>
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] ">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] ">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] ">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <div class="flex flex-wrap justify-center items-center" style="min-height:65vh">
                <div class="h-full px-5 flex-col flex w-1/2 justify-center lg:-translate-y-32">
                    <h1 class="text-blue-900 text-4xl font-bold py-5">
                        Streamlined Scheduling
                    </h1>
                    <p class="text-blue-700 font-semibold">Simplifying schedule management by providing real-time data
                        and advanced automation for a
                        smoother and more efficient operation.</p>
                </div>
                <div class="w-1/2">
                    <img src="{{asset('assets/images/dashboard_img.png')}}">
                </div>
            </div>
        </div>
    </div>
</body>

</html>