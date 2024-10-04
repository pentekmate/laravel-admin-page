<nav class="w-[230px] px-[20px]">
    <p class="text-[20px] text-[#64748B]">Dashboards</p>
    <ul>
        <li class="my-2">
            <a class="px-2 h-[32px] {{Route::is('posts.*') ? 'text-[#0EA5E9] font-bold' : ''}} " href="{{route('posts.index')}}">Posts</a>
        </li>
        @if ($user->isAdmin)
        <li class="my-2">
            <a class="px-2  h-[32px]  {{Route::is('users.*') ? 'text-[#0EA5E9] font-bold' : ''}} "  href="{{route('users.index')}}">Users</a>
        </li>
        @endif
        <li class="my-2">
            <a class="px-2  h-[32px]  {{Route::is('orders.*') ? 'text-[#0EA5E9] font-bold' : ''}} "  href="{{route('orders.index')}}">Orders</a>
        </li>
    </ul>
</nav>