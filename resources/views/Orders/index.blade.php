<x-layout>
    <div class="flex flex-col gap-4">
        @if ($user->isAdmin)
        <div class="flex gap-4" >
            <x-card title="Total Revenue" :revenue='$totalRevenue'></x-card>
            <x-card title="Daily Orders" :cardData='$avgOrders'></x-card>
        </div>
        @endif
        <p class="text-[24px]">Orders</p>
     
        <div class="flex justify-between items-center">
            <x-searchbar placeholder="Search by id" name="id" route="{{route('orders.index')}}">
            </x-searchbar>
            <x-button route='orders.create'>
                New Order
            </x-button>
        </div>

        <x-message></x-message>
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
</x-layout>