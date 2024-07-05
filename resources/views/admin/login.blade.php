<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.ico')}}">
    <title>Elstar - HTML Tailwind Admin Template</title>

    <!-- Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">
</head>
<body>
<!-- App Start-->
<div id="root">
    <!-- App Layout-->
    <div class="app-layout-blank flex flex-auto flex-col h-[100vh]">
        <div class="h-full flex flex-auto flex-col justify-between">
            <main class="h-full">
                <div class="page-container relative h-full flex flex-auto flex-col">
                    <div class="grid lg:grid-cols-3 h-full">
                        <div class="col-span-2 bg-no-repeat bg-cover py-6 px-16 flex-col justify-between bg-white dark:bg-gray-800 hidden lg:flex" style="background-image: url('{{asset('admin/img/others/auth-cover-bg.jpg')}}');">
                            <div class="logo">
                                <img src="{{asset('admin/img/logo/logo-dark-full.png')}}" alt="Elstar logo">
                            </div>
                            <div>
                                <h3 class="text-white mb-4">Jump start your project with Elstar</h3>
                                <p class="text-lg text-white opacity-80 max-w-[700px]">Elstar comes with a complete set of UI components crafted with Tailwind CSS, it fulfilled most of the use case to create modern and beautiful UI and application</p>
                            </div>
                            <span class="text-white">Copyright © 2023
                                        <span class="font-semibold">Telefonistan</span>
                                    </span>
                        </div>
                        <div class="flex flex-col justify-center items-center bg-white dark:bg-gray-800">
                            <div class="xl:min-w-[450px] px-8">
                                <div class="mb-8">
                                    <h3 class="mb-1">Hosgeldiniz !</h3>
                                    <p>Lutfen Giris Yapiniz!</p>
                                </div>
                                <div>
                                    <form action="{{route('authenticate')}}" method="post">
                                        @csrf
                                        <div class="form-container vertical">
                                            <div class="form-item vertical">
                                                <label class="form-label mb-2">Kullanici E-Posta</label>
                                                <div>
                                                    <input
                                                            class="input"
                                                            type="text"
                                                            name="email"
                                                            autocomplete="off"
                                                            placeholder="E-Posta Adresiniz"
                                                            value=""
                                                    >
                                                </div>
                                            </div>
                                            <div class="form-item vertical">
                                                <label class="form-label mb-2">Sifre</label>
                                                <div>
                                                            <span class="input-wrapper">
                                                                <input
                                                                        class="input pr-8"
                                                                        type="password"
                                                                        name="password"
                                                                        autocomplete="off"
                                                                        placeholder="Sifre"
                                                                        value=""
                                                                >
                                                                <div class="input-suffix-end">
                                                                    <span class="cursor-pointer text-xl">
                                                                        <svg
                                                                                stroke="currentColor"
                                                                                fill="none"
                                                                                stroke-width="2"
                                                                                viewBox="0 0 24 24"
                                                                                aria-hidden="true"
                                                                                height="1em"
                                                                                width="1em"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                        >
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="flex justify-between mb-6">
                                                <label class="checkbox-label mb-0">
                                                    <input class="checkbox" type="checkbox" name="remember" value="true" checked>
                                                    <span class="ltr:ml-2 rtl:mr-2">Beni Hatirla</span>
                                                </label>
                                                <a class="text-primary-600 hover:underline" href="#">Sifremi Unuttum?</a>
                                            </div>
                                            <button class="btn btn-solid w-full" type="submit">Giris Yap</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
</div>

<!-- Core Vendors JS -->
<script src="{{asset('admin/js/vendors.min.js')}}"></script>

<!-- Other Vendors JS -->

<!-- Page js -->

<!-- Core JS -->
<script src="{{asset('admin/js/app.min.js')}}"></script>
</body>

</html>