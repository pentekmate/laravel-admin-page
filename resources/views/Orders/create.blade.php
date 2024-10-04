<x-layout>
        <x-back-button></x-back-button>
        <x-message></x-message>
        
        <p class="text-[24px] text-[#64748B]">New Order</p>
        <x-form
        :inputs="['product', 'quantity', 'total','status','user']"
        action="{{ route('orders.store') }}"
        method="POST"
        >
       
        </x-form>

       <!--
        
        

    
    -->
   
</x-layout>