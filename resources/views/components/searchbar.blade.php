<form class="flex gap-4 items-center" method="GET" route={{$route}}>
    @csrf
    @if (request()->$name)
    <input  id="searchInput" value="{{request()->$name}}"   name={{$name}} placeholder="{{$placeholder}}" class="w-[300px] shadow-lg p-1 rounded-full"/>
    @else
    <input  id="searchInput"  name={{$name}} placeholder="{{$placeholder}}" class="w-[300px] shadow-lg p-1 rounded-full"/>
    @endif
    <button type="submit" class="bg-[#0EA5E9] text-white px-2 py-1.5 rounded-md" >Search</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#searchInput').on('input', function() {
            var query = $(this).val(); 

            // Itt frissítjük az URL-t az új keresési paraméterrel
            var url = "{{ $route }}" + "?{{ $name }}=" + query;

            // Az oldal újratöltése az új keresési URL-lel
            setTimeout(()=>{
                window.location.href = url;
            },1000)
        });
    });
</script>