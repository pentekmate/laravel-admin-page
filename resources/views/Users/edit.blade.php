<x-layout>
  <div class="flex flex-col gap-4">
        <x-back-button></x-back-button>
        <x-message></x-message>
        
        <p class="text-[24px] text-[#64748B]">User details : {{$user->name}}</p>
        <x-form
        :inputs="['name', 'email', 'has2FA','isAdmin']"
        action="{{ route('users.update',['user'=>$user]) }}"
        method="POST"
        :model="$user"
        >
        @method('PUT')
        </x-form>

        <p class="text-[24px] text-[#64748B]">{{$user->name}}'s orders</p>

        <div class="py-4">
        <x-table-component 
                :items="$orders"
                :columns="[
                    ['field' => 'id', 'label' => 'ID','class'=>'text-center text-[#0EA5E9] font-bold'],
                    ['field' => 'user', 'relation'=>'name', 'label' => 'User','class'=>'text-start ml-[30%]'],
                    ['field' => 'product', 'label' => 'Product','class'=>'ml-[30%]'],
                    ['field' => 'quantity', 'label' => 'Quantity'],
                    ['field' => 'total', 'label' => 'Total'],
                    ['field' => 'status', 'label' => 'Status'],
                ]"
                editRoute="orders.edit"
                deleteRoute="orders.destroy"
                modelName="order"
                columnWidths="50px 4fr 2fr 2fr 1fr 1fr 1fr"/>
        </div>
    </div>
</x-layout>


 

    
