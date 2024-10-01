<x-layout>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    @forelse($orders as $order)
        <div class="flex gap-4">
            <p>{{$order->product}}</p>
            <a href="{{route('orders.edit',['order'=>$order])}}">Szerkesztés</a>
            <form 
            action="{{route('orders.destroy',['order'=>$order])}}"
            method="POST"
            >
            @csrf
            @method('delete')
            <button type="submit">Törlés</button>
            </form>
        </div>
    @empty
    @endforelse

    <a href="{{route('orders.create')}}">New Order</a>

    {{$orders->links()}}

</x-layout>