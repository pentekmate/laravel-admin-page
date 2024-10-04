<div class="w-full bg-white h-[43px] font-bold text-[#475569] mb-[30px] flex items-center px-[20px] justify-between">
    <p>Laravel Admin</p>
    <div class="flex items-center gap-4">
        <p>{{ Auth::user()->name }}</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-blue-600">Logout</button>
        </form>
    </div>
</div>
