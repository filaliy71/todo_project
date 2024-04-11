@if ($todo->status === 'completed')
    <form action="{{ route('todos.uncomplete_dash', $todo->id) }}"
          method="POST">
        @csrf
        <a href="#"
           onclick="this.parentNode.submit(); return false;">
            <label class="relative inline-flex items-center">
                <input type="checkbox" class="absolute opacity-0 w-0 h-0 cursor-pointer"
                       checked>
                <span class="cursor-pointer checkmark inline-block w-5 h-5 bg-green-500
                    rounded-full transition duration-300"></span>
            </label>
        </a>
    </form>
@else
    <form action="{{ route('todos.completed_dash', $todo->id) }}"
          method="POST">
        @csrf
        <a onclick="this.parentNode.submit(); return false;">
            <label class="relative inline-flex items-center">
                <input type="checkbox"
                       class="absolute opacity-0 w-0 h-0 cursor-pointer">
                <span class="cursor-pointer checkmark inline-block w-5 h-5 bg-gray-300 rounded-full
                    transition duration-300"></span>
            </label>
        </a>
    </form>
@endif