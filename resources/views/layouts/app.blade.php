
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
            background-color: bisque;
            width: 100%;
            height: 10%;
            margin: 0;
            padding: 0;
            text-align: left;
            display: flex;
            align-items: center;
            flex-direction: row;
        }
        .header-content entry {
            text-align: center;
            width: 10%;
            height: 100%;
            border-style: solid;
            border-width: 0.1vw+0.1vh;
            border-color: chocolate;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .header-content entry:hover {
            background-color: beige;
        }
        entry, entry a {
            text-decoration: none;
            color: black;
            font-family: Lobster;
            font-size: 2vw;
        }
        main {
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: block;
            min-height: 85vh;
            width: 100%;
            background-color: azure;
        }
        main * {
        }
        footer {
            text-align: center;
            align-items: center;
            background-color: lightgray;
            width: 100%;
            min-height: 5vh;
            font-family: SansSerif;
            font-size: 1vw;
        }
        footer * {
            margin: 0;
            padding-top: 1vh;
        }
    </style>
</head>
    <body>
        <header class="header-content">
            <entry style="width: 20%; background-color: antiquewhite"> Облік товарів магазину одягу </entry>
            <entry> <a href="{{ url('/#') }}">Головна</a> </entry>
            <entry> <a href="{{ url('/#') }}">Каталог</a> </entry>
            <entry> <a href="{{ url('/#') }}">Панель керування</a> </entry>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <p>&copy; {{ date('Y') }} КПІ ім. Ігоря Сікорського. ВСІ ПРАВА ЗАХИЩЕНІ 2026 © </p>
        </footer>
    </body>
</html>
