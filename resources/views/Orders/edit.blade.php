<x-layout>
    <x-message></x-message>
    <x-form
    :inputs="['product','quantity','created_at']"
    action="{{route('orders.update',['order'=>$order])}}"
    method="POST"
    :model=$order>

    @method('PUT')
    </x-form>

   
</x-layout>  