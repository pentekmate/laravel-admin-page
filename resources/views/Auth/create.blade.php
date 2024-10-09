<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <style>
        .transition-height {
            transition: max-height 0.5s ease-in-out;
        }
    </style>
</head>
<body class="w-full h-screen flex flex-col items-center justify-center bg-[#CBD5E1]">

<form  method="POST" action="{{route('auth.store')}}" class="  shadow-xl flex flex-col gap-4 p-8 rounded-md w-[500px] bg-white">
    @csrf    
    <div class="flex flex-col gap-2">
        <label  class="text-[#64748B] text-xl" for="email">Email</label>
        <input  class="w-full h-[36px] text-[#64748B] px-4 rounded-[4px] border border-[#CBD5E1]" type="text" name="email" id="name">
    </div>

    <div class="flex flex-col gap-2">
        <label  class="text-[#64748B] text-xl" for="password">Password</label>
        <input  class="w-full h-[36px] text-[#64748B] px-4 rounded-[4px] border border-[#CBD5E1]" type="password" name="password" id="password">
    </div>

    <div class="flex gap-2 items-center">
        <input type="checkbox">
        <label for="remember" name="remember" id="remember">Remember me</label>
    </div>

    <div class="w-full flex flex-col mt-4 items-center">
        <button type="submit" class="p-2  rounded-full w-2/4 font-bold bg-[#0EA5E9] text-white">Login</button>
        <x-message></x-message>
    </div>
</form>
</body>
</html>


