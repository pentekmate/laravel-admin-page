<x-layout>
    <x-back-button></x-back-button>
    <x-message></x-message>
    <p class="text-[24px] text-[#64748B]">New Post</p>
    <x-form 
        :inputs="['title', 'tags', 'content']"
        action="{{ route('posts.store') }}"
        method="POST"
    />
</x-layout>
