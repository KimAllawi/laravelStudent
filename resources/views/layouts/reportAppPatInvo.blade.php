<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm">
            <div class="container" style="margin-left:250px">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="{{ route('login') }}">الصفحة الرئيسية</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        </button>

                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link fs-3 text-shadow-lg"
                                        href="{{ route('patients.index') }}">المستخدمين</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-3" href="{{ route('Appointments.index') }}">المواعيد</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-3" href="{{ route('Treatments.index') }}">العلاجات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-3" href="{{ route('Invoices.index') }}">الفواتير</a>
                                </li>

                            </ul>
                        </div>
                    </nav>

                </div>

            </div>
    </div>
    </nav>


    <main class="">
        @yield('reportInvoices')
    </main>
    </div>
