@props(['title'])
<a href="{{route('todo.create')}}">
    <button class="mb-4 bg-green-950 text-green-400 border border-green-400 border-b-4 font-medium
overflow-hidden
relative
px-4 py-2 rounded-md hover:brightness-150 hover:border-t-4 hover:border-b active:opacity-75 outline-none duration-300 group">

        <span class="bg-green-400 shadow-green-400 absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-md opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
        {{$title}}
    </button>
</a>