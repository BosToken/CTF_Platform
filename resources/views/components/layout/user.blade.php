<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#161A1D] overflow-auto scrollbar-hide">
    <x-navbar.navbar></x-navbar.navbar>
    <x-scrollbar.scrollbar></x-scrollbar.scrollbar>
    {{ $slot }}
</body>
</html>