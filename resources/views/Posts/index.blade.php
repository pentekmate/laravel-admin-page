<x-layout>
    <x-message></x-message>
    <a href="{{route('posts.create')}}">New Post</a>
    @forelse ($posts as $post)
        <p>{{$post->title}}</p>
        <a href="{{route('posts.edit',['post'=>$post])}}">Edit</a>
        <form action="{{route('posts.destroy',['post'=>$post])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Törlés</button>
        </form>
    @empty
        
    @endforelse
</x-layout>