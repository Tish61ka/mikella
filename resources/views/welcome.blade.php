<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        * {
            margin: 0;
            padding: 0;
            list-style-type: none;
            list-style-type: none;
            box-sizing: border-box;
        }

        a {
            text-decoration: none
        }

        body {
            background: #050507;
        }

        input,
        textarea {
            outline: none;
        }

        html {
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        :root {
            --main-bg-color: #08080A;
            --main-txt-color: #E5E5E5;
            --main-h-txt-color: #F6F5F2;
            --second-txt-color: #AD9562;
            --main-border-color: #AD9562;
        }
    </style>
</head>

<body id="app">


</body>

</html>