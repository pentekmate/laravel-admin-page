<div class="w-[1100px] shadow-md rounded-md bg-white">
    <div class="min-h-[60px] px-4 flex items-center justify-end w-full ">
       @if ($filters)
        <select class="w-9/4 h-[36px] text-[#64748B] px-4 rounded-[4px] border border-[#CBD5E1]" onchange="location = this.value">
            @foreach ($filters as $key => $label )
            <option value="{{route($filterRoute,[...request()->query(),'filter' =>$key])}}"
            @if (request('filter') === $key) 
            selected 
            @endif
            > 
                {{$label}}
            </option>
            @endforeach
        </select>
           
       @endif
    </div>

    <div class="grid grid-cols-{{count($columns)}} font-bold w-full bg-[#CBD5E1] h-[36px] items-center"
         @if($columnWidths)
            style="grid-template-columns: {{$columnWidths}}"
         @else
            style="grid-template-columns: 50px 4fr 2fr 2fr 1fr"
         @endif
    >
        @foreach($columns as $column)
            <div class="text-center">{{strtoupper($column['label']) }}</div>
        @endforeach
    </div>

    <div class="grid grid-cols-{{count($columns)}} w-full bg-white"
         @if($columnWidths)
            style="grid-template-columns: {{$columnWidths}}"
         @else
            style="grid-template-columns: 50px 4fr 2fr 2fr 1fr"
         @endif
    >
        @forelse ($items as $item)
            @foreach($columns as $column)
                <div class="border-b-[0.5px] h-[51px]  flex items-center justify-center  ">
                    @if($column['label']==='Created At')
                    <p class="overflow-hidden w-full h-2/4 {{ $column['class'] ?? 'text-center' }} ">{{ str_replace("-","/",explode(' ',$item[$column['field']])[0])  }}</p>
                    @elseif ($column['label']==='Status')
                    <x-status-badge :title="$item[$column['field']]"></x-status-badge>
                    @else
                    <p class="overflow-hidden w-full h-2/4 {{ $column['class'] ?? 'text-center' }} ">
                    @if (array_key_exists('relation', $column) )
                        {{ $item->{$column['field']}->{$column['relation']} }} 
                    @else
                        {{$item[$column['field']]}}
                    @endif
                    </p>
                    @endif
                </div>
            @endforeach
            <div class="border-b-[0.5px] h-[51px] flex gap-2 items-center">
                <a href="{{ route($editRoute, [$modelName => $item]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#94A3B8" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>

                </a>
                <form class="mt-1" action="{{ route($deleteRoute, [$modelName => $item]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#94A3B8" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>

                    </button>
                </form>
            </div>
           
        @empty
            <p>No items available.</p>
        @endforelse
    </div>
    @if(isset($items) && $items instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{$items->links()}}
    @endif
</div>
