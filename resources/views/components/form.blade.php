<form class=" w-[1100px] flex bg-white flex-col h-screen shadow-md rounded-md" action="{{ $action }}" method="{{ $method }}">
        @csrf
        {{$slot}}
        @forelse ($inputs as $input)
        <div class="h-[76px] flex justify-between items-center px-10">
            <label for="{{$input}}">{{ucfirst($input)}}</label>
            @if($input === 'content')
            <textarea  name="{{$input}}">
            {{ $model ? old($input, $model->$input) : old($input) }}
            </textarea>
            @else
            <input class="w-3/4 h-[36px] px-4 rounded-[4px] border border-[#CBD5E1]"  value="{{$model ? old('$input',$model->$input) : null}}" type="text" name="{{$input}}">
            @endif
        </div>
            @empty
            
            @endforelse
            <button type="submit">Save</button>
</form>