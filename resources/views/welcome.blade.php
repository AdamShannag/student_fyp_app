<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- SEO -->
    <meta name="description"
        content="Save time and get to market faster with this free fully responsive single page html template built with TailwindCSS." />
    <link rel="canonical" href="https://talland-basic-app.vercel.app/" />
    <!-- end SEO -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    sans: ['Roboto', 'sans-serif'],
                },
                extend: {},
            },
        };
    </script>
    <style>
        * {
            font-size: 16px;
        }

        .bg-image-blur {
            background-image: url('./assets/app_bg.png');
            background-position: right center;
            background-repeat: no-repeat;
            height: 846px;
            width: 868px;
            z-index: -1;
            right: 125px;
            top: 19px;
        }
    </style>
    <title>FYP</title>
</head>

<body class="text-slate-700 bg-white-50">
    <!-- header -->
    <header
        class="p-4 lg:py-2 lg:px-0 container mx-auto grid lg:flex lg:justify-between grid-cols-2 text-slate-700 mt-4">
        <nav class="flex items-center">
            <img class="w-20 mx-5" src="assets/logo.png" alt="logo" />

            <ul class="lg:flex hidden">
                <li class="mr-8">
                    <a class="font-medium hover:text-slate-900" href="#">Home</a>
                </li>
                <li class="mr-8">
                    <a class="font-medium hover:text-slate-900" href="#">Features</a>
                </li>
            </ul>
        </nav>
        <div class="hidden lg:block">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="mx-1 hover:underline p-4">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="mx-1 hover:underline p-4">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-4 py-3 bg-blue-400 hover:bg-blue-600 hover:cursor-pointer text-white font-medium rounded mx-1">
                            Get Started For Free
                        </a>
                    @endif
                @endauth
        </div>
        @endif

        </div>
        <!-- mobile menu button -->
        <button type="button"
            class="lg:hidden justify-self-end inline-flex items-center justify-center rounded-md bg-gray-50 p-2 hover:bg-gray-400 hover:text-white focus:outline-none"
            aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!--
          Menu open: "hidden", Menu closed: "block"
        -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
          Menu open: "block", Menu closed: "hidden"
        -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <!-- mobile menu -->
        <div id="mobile-menu" class="col-span-2 bg-slate-50 p-2 mt-4 rounded shadow-lg hidden lg:hidden">
            <ul class="w-full py-2">
                <li
                    class="bg-slate-900 text-white hover:bg-slate-400 focus:bg-slate-400 hover:text-white focus:text-white p-2 rounded">
                    <a class="font-medium hover:text-slate-900" href="#">Demos</a>
                </li>
                <li class="hover:bg-slate-400 focus:bg-slate-400 hover:text-white focus:text-white p-2 rounded">
                    <a class="font-medium hover:text-slate-900" href="#">About</a>
                </li>
                <li class="hover:bg-slate-400 focus:bg-slate-400 hover:text-white focus:text-white p-2 rounded">
                    <a class="font-medium hover:text-slate-900" href="#">Blog</a>
                </li>
                <li class="hover:bg-slate-400 focus:bg-slate-400 hover:text-white focus:text-white p-2 rounded">
                    <a class="font-medium hover:text-slate-900" href="#">Pages</a>
                </li>
                <li class="hover:bg-slate-400 focus:bg-slate-400 hover:text-white focus:text-white p-2 rounded">
                    <a class="font-medium hover:text-slate-900" href="#">Contact</a>
                </li>
            </ul>
            <div class="border-t border-gray-400 pt-4">
                <a href="{{ route('register') }}"
                    class="block w-full text-center p-4 bg-slate-900 hover:bg-slate-700 hover:cursor-pointer text-white font-medium rounded mx-1">
                    Get Started For Free
                </a>
                <a href="{{ route('login') }}"
                class="block w-full text-center mx-1 hover:underline p-4">
                    Login
                </a>
            </div>
        </div>
    </header>
    <!-- hero -->
    <section
        class="py-8 px-4 md:px-8 lg:py-16 2xl:py-40 2xl:px-60 mx-auto grid grid-cols-1 gap-8 lg:grid-cols-12 relative">
        <div class="col-span-6 xl:place-self-center mb-8 mt-8 xl:mt-0 lg:mb-0">
            <h1 class="text-3xl md:text-4xl xl:text-5xl 3xl:text-6xl font-medium text-center lg:text-left">
                Just one click away <br />
                to create and manage <br />
                final year projects!
            </h1>
            <p class="my-8 max-w-lg mx-auto lg:mx-0 text-center lg:text-left">
                A final year project (FYP) is a project or academic assignment that every undergraduate student
                must complete on their own in order to graduate. The purpose of it is to show off the
                abilities and knowledge that students have learned throughout their courses.
            </p>
            <div class="flex flex-col lg:flex-row items-center">
                <a href="{{ route('register') }}"
                    class="w-full lg:w-max px-4 py-3 bg-blue-500 hover:bg-blue-600 hover:cursor-pointer text-white font-medium rounded lg:mr-8 mb-4 lg:mb-0">
                    Let's Get Started
                </a>

            </div>
        </div>
        <div class="col-span-6 relative">

            <img src="./assets/educ.png" alt="">
        </div>
    </section>
    <!-- benefits -->
    <section
        class="py-8 px-4 md:px-8 lg:py-16 2xl:py-40 2xl:px-60 2xl:py-20 mx-auto grid gap-y-4 gap-x-8 grid-cols-11 relative bg-gray-100">
        <h2 class="text-3xl md:text-4xl font-medium text-center col-span-11">
            Some features that set <br />
            FYP apart from others
        </h2>
        <p class="max-w-lg mx-auto text-center col-span-11 leading-relaxed mb-8">
            FYP provides certain unique features, such as the ability to rapidly and easily create and manage final year
            projects for students.
        </p>
        <div
            class="border border-slate-200 rounded-lg lg:col-span-3 col-span-11 lg:col-start-2 p-8 text-center lg:text-left bg-white">
            <h3 class="text-xl font-medium my-4">Innovative Solution</h3>
            <small>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic
                nostrum, quaerat blanditiis architecto.</small>
        </div>
        <div class="border border-slate-200 rounded-lg lg:col-span-3 col-span-11 p-8 text-center lg:text-left bg-white">
            <h3 class="text-xl font-medium my-4">Fully functional</h3>
            <small>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic
                nostrum, quaerat blanditiis architecto.</small>
        </div>
        <div class="border border-slate-200 rounded-lg lg:col-span-3 col-span-11 p-8 text-center lg:text-left bg-white">
            <h3 class="text-xl font-medium my-4">Secure Database</h3>
            <small>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic
                nostrum, quaerat blanditiis architecto.</small>
        </div>
    </section>

    <!-- footer -->
    <footer class="py-8 px-4 md:px-8 lg:py-16 2xl:px-60 mx-auto relative">

        <div class="flex items-center flex-col lg:flex-row text-gray-400">
            <div class="flex items-center mb-2">
                <a class="mr-6" href="#"><img class="opacity-70" src="./assets/facebook.svg"
                        alt="facebook" /></a>
                <a class="mr-6" href="#"><img class="opacity-70" src="./assets/instagram.svg"
                        alt="instagram" /></a>
                <a class="mr-6" href="#"><img class="opacity-70" src="./assets/twitter.svg"
                        alt="twitter" /></a>
                <a class="mr-6" href="#"><img class="opacity-70" src="./assets/github.svg"
                        alt="github" /></a>
            </div>
            <a class="mb-2 lg:mb-0 text-center lg:text-left mr-6" href="#">Privacy Polciy</a>
            <a class="mb-2 lg:mb-0 text-center lg:text-left mr-6" href="#">Terms and conditions</a>
            <a class="mb-2 lg:mb-0 text-center lg:text-left mr-6" href="#">Support</a>
            <p class="text-center lg:text-left lg:ml-auto">
                Copyright 2022, All Rights Reserved by FYP
            </p>
        </div>
    </footer>
</body>

</html>
