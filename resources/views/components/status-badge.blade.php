<div class="">
    @if ($title === 'shipped')
        <div class="bg-[#E0F2FE] w-[80px] flex items-center justify-center p-2 rounded-full">
            <p class="text-[12px] font-bold text-[#0EA5E9]">SHIPPED</p>
        </div>
    @elseif ($title=== 'return')
        <div class="bg-[#FEE2E2] w-[80px] flex items-center justify-center p-2 rounded-full">
            <p class="text-[12px] font-bold text-[#EF4444]">RETURN</p>
        </div>
    @elseif ($title=== 'completed')
        <div class="bg-[#DCFCE7] w-[80px] flex items-center justify-center p-2 rounded-full">
            <p class="text-[12px] font-bold text-[#22C55E]">COMPLETED</p>
        </div>
    @elseif ($title=== 'pending')
        <div class="bg-[#FEF9C3] w-[80px] flex items-center justify-center p-2 rounded-full">
            <p class="text-[12px] font-bold text-[#EAB308]">PENDING</p>
        </div>
    @endif
</div>