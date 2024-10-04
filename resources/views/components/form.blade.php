<form class=" w-[1100px]  py-4 " action="{{ $action }}" method="{{ $method }}">
        @csrf
        {{$slot}}
        <div class="bg-white shadow-md rounded-md flex flex-col ">
        @forelse ($inputs as $input)
        <div class="min-h-[76px] border-b-[0.5px]  py-6 flex justify-between px-10">
            <label class="text-[#64748B]" for="{{$input}}">{{ucfirst($input)}}</label>
            @if($input === 'content')
            <textarea class="w-3/4 h-[100px] text-[#64748B] px-4 rounded-[4px] border border-[#CBD5E1]"  name="{{$input}}">
            {{ $model ? old($input, $model->$input) : old($input) }}
            </textarea>
            @elseif ($input==='status')
            <select  class="w-3/4 h-[36px] text-[#64748B] px-4 rounded-[4px] border border-[#CBD5E1]" name="status" id="status">
                @foreach (\App\Models\Order::$status as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
            </select>
            @elseif ($input==="user")
               <select  class="w-3/4 h-[36px] text-[#64748B] px-4 rounded-[4px] border border-[#CBD5E1]" name='user_id' id="user_id">
                    @foreach(\App\Models\User::all() as $user)
                        <option value="{{ $user->id}}">{{ $user->name === $currentUser->name? 'Me' : $user->name }}</option>
                    @endforeach
               </select>
            @else
            <input class="w-3/4 h-[36px] text-[#64748B] px-4 rounded-[4px] border border-[#CBD5E1]"  value="{{$model ? old('$input',$model->$input) : null}}" type="text" name="{{$input}}">
            @endif
        </div>
            @empty
            
            @endforelse
       
        </div>
        <div class="mt-[24px]  w-full flex justify-end">
            <button class="bg-[#0EA5E9] rounded-md  font-bold text-white text-center w-[98px] h-[36px] " type="submit">Save</button>
        </div>
</form>