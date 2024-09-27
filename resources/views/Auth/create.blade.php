<x-layout>
    <form action="{{route('auth.store')}}" method="POST" >
        @csrf
        <label for=""></label>
        <input name="email" type="text">

        <label for=""></label>
        <input name="password" type="text">

        <button type="submit">a</button>
    </form>
</x-layout>