<x-layout>
    <x-back-button></x-back-button>
    <x-message></x-message>
    <x-form
    :inputs="['title', 'tags', 'content']"
    action="{{ route('posts.update',['post'=>$post]) }}"
    method="POST"
    :model=$post
    >@method('PUT')
    </x-form>
</x-layout>