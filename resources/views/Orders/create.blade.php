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
    <form action="{{route('orders.store')}}" method="POST">
        @csrf
        <label  for="product">Product</label>
        <input name='product' type="text">

        <label  for="quantity">Quantity</label>
        <input name='quantity'  type="text">

        <label  for="total">Total</label>
        <input name='total' type="text">

        <label  for="status">Status</label>
        <select name="status" id="status">
            @foreach (\App\Models\Order::$status as $status)
                <option value="{{ $status }}">{{ $status }}</option>
            @endforeach
        </select>

        <button type="submit">
            Save
        </button>
    </form>
</x-layout>