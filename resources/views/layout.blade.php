<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/Logo.ico" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="Türkiye"
        referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#172554",
                        arkaplan: "#0f172a",
                        mavi: "#3771fa",
                    },
                },
            },
        };
    </script>
    <title>Rankzz Co.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A Blog Project Made By Rankzz">
</head>

<body class="bg-arkaplan">
    <nav class="h-16 flex justify-between items-center pt-6 pl-6 mb-4">
        <div class="mb-2">
            <a href="/" class="flex items-center">
                <img src="{{asset('images/Logo.png')}}" class="h-16 w-16" alt="Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SeeBlog</span>
            </a>
        </div>
        <ul class="flex space-x-6 mr-6 mb-2 text-lg">
            @auth
            <li>
                <a href="/listings/mylistings" class="text-white hover:text-mavi">
                    My Listings
                    <i class="fa-solid fa-pencil"></i>
                </a>
            </li>
            <li>
                <a href="/user" class="text-white hover:text-mavi">
                    {{auth()->user()->name}}
                    <i class="fa-solid fa-user-circle"></i>
                </a>
            </li>
            <li>
                <form action="/logout" class="inline" method="POST">
                    @csrf
                    <button type="submit" class="text-white hover:text-mavi">
                        Logout
                        <i class="fa-solid fa-door-open"></i>
                    </button>
                </form>
            </li>

            @else

            <li>
                <a href="/register" class="text-white hover:text-mavi">
                    <i class="fa-solid fa-user-plus"></i>
                    Register
                </a>
            </li>
            <li>
                <a href="/login" class="text-white hover:text-mavi">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login
                </a>
            </li>
            @endauth
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <x-footer-card></x-footer-card>
    </footer>
    <x-flash-message></x-flash-message>
</body>

</html>
