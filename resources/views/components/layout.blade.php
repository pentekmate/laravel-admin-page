<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Laravel Admin Page</title>
</head>
<body class="w-screen overflow-x-hidden bg-[#CBD5E1] flex flex-col font-default-font">
    <x-header></x-header>
 
    <div class="flex m-0 p-0">
        <x-side-navigator></x-side-navigat>
        <div class="w-[1100px]">
            {{$slot}}
        </div>
    </div>
</body>
</html>