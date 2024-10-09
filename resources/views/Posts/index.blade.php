<x-layout>
    <div class="flex flex-col gap-4">
    <x-message></x-message>

    <p class="text-[24px]">Posts</p>

    <div class="flex justify-between items-center">
        <x-searchbar placeholder="Search by title" name="title" route="{{route('posts.index')}}">
        </x-searchbar>
        <x-button route='posts.create'>
            New Post
        </x-button>
    </div>

    <x-table-component 
    :items="$posts"
    :columns="[
        ['field' => 'id', 'label' => 'ID','class'=>'text-center text-[#0EA5E9] font-bold'],
        ['field' => 'title', 'label' => 'Title','class'=>' w-full ml-6 text-start'],
        ['field' => 'tags', 'label' => 'Tags','class'=>' w-full ml-12 text-start'],
        ['field' => 'created_at', 'label' => 'Created At'],
    ]"
    editRoute="posts.edit"
    deleteRoute="posts.destroy"
    modelName="post"
    columnWidths="50px 4fr 2fr 2fr 1fr"/>
    </div>
</x-layout>
