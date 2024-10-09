
@if(session('success'))
    <div class=" bg-[#DCFCE7] py-3 px-2 rounded-md text-[#16A34A] text-md my-4 font-bold border ">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-[#FEE2E2] py-3 px-2 rounded-md text-[#DC2626] text-md my-4 font-bold border">

            {{ session('error') }}
    </div>
    @dd(session()->all())

@endif

@error('password')
        <div class="bg-[#FEE2E2] w-2/3 flex items-center justify-center py-3 px-2 rounded-md text-[#DC2626] text-md mt-4 font-bold border">
            {{ $message }}
        </div>
@enderror
@error('email')
        <div class="bg-[#FEE2E2]  w-2/3 py-3 flex items-center justify-center  px-2 rounded-md text-[#DC2626] text-md mt-4 font-bold border">
            {{ $message }}
        </div>
@enderror