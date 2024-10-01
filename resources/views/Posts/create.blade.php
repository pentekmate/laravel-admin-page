<x-layout>
    <x-back-button></x-back-button>
    <x-message></x-message>
    <x-form 
        :inputs="['title', 'tags', 'content']"
        action="{{ route('posts.store') }}"
        method="POST"
    />
</x-layout>
