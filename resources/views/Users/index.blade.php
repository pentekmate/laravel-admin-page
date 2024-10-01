<x-layout>

    <div class="">HELLO</div>
    
    <div>
        @php
            
       $filters =[
            ''=>'Latest',
            'has_2_FA'=>'Has 2FA',
            'is_Admin'=>'Is Admin'
        ]
        @endphp
        @foreach ($filters as $key => $label )
        <a href="{{route('users.index',[...request()->query(),'filter' =>$key])}}">
            {{$label}}
        </a>
            
        @endforeach
    </div>

    @forelse ( $users as $user )
    <div class="flex gap-4 mt-4">
        <p> {{$user->name}}</p>
        <p> {{$user->has2FA}}</p>
        <p> {{$user->isAdmin===0? 'is not Admin' : 'is Admin'}}</p>
        <p> {{$user->id}} </p>
        <p><a href="{{route('users.edit',['user'=>$user])}}">Szerkeszt</a></p>
        <form action="{{route('users.destroy',['user'=>$user])}}" method="POST">
        @csrf
        @method('DELETE')
            <button type="submit">Törlés</button>
        </form>
    </div>
    @empty
    <p>No users detected</p>
    
    @endforelse


</x-layout>