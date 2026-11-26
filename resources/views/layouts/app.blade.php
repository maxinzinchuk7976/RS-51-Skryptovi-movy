
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Облік товарів')</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .header-content {
            background-color: #ffffff;
            width: 100%;
            height: 5vw;
            text-align: left;
            display: flex;
            align-items: center;
            flex-direction: row;
            border-width: 0.2vw+0.2vh;
            border-color: #202020;
            border-style: solid;
            background-image: url("{{ asset('images/header-bg.png') }}");
            background-repeat: repeat;
        }
        .product-photo {
            max-height: 15vh;
        }
        .header-content entry {
            text-align: center;
            width: 10%;
            height: 100%;
            border-style: solid;
            border-width: 0.1vw+0.1vh;
            border-color: #202020;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .header-content entry:hover {
            background-color: #f0f0f0;
            border-color: #000000;
        }
        entry, entry a {
            text-decoration: none;
            color: black;
            font-family: Lobster;
            font-size: 2vw;
        }
        main {
            padding-left:  5vw;
            padding-right: 5vw;
            padding-top: 0;
            padding-down: 0;
            margin: 0;
            overflow: hidden;
            display: block;
            min-height: 85vh;
            width: 100%;
            background-image: url("{{ asset('images/main-bg.png') }}");
            background-repeat: repeat;
        }
        main * {
        }
        #content {
            width: 100%;
        }
        footer {
            text-align: center;
            align-items: center;
            background-image: url("{{ asset('images/footer-bg.png') }}");
            background-repeat: repeat;
            width: 100%;
            min-height: 5vh;
            font-family: SansSerif;
            font-size: 1vw;
        }
        footer * {
            margin: 0;
            padding-top: 1vh;
        }
        .w-5 {
            max-width: 2vw;
        }
    </style>
</head>
    <body>
        <header class="header-content">
            <entry style="width: 20%" > Облік товарів магазину одягу </entry>
            <entry> <a href="{{ url('/about') }}">Про нас</a> </entry>
            <entry> <a href="{{ url('/contact') }}">Контакти</a> </entry>
            <entry> <a href="{{ url('/.') }}">Панель керування</a> </entry>
            <entry> <a href="{{ url('/product/') }}">Каталог</a> </entry>
            <entry> <a href="{{ route('country.index') }}">Країни</a> </entry>
        </header>
        <main>
            <div id="content">
                @yield('content')
            </div>
        </main>
        <footer>
            <p>&copy; {{ date('Y') }} КПІ ім. Ігоря Сікорського. ВСІ ПРАВА ЗАХИЩЕНІ 2026 © </p>
        </footer>
    </body>
</html>
