<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="mt-6 w-8/12 mx-auto">
        <x-add_button_green title="Create"/>
        <ul class="bg-white dark:bg-gray-800 rounded-lg shadow mx-auto">
            @foreach($todos as $todo)
                <li class="p-4 border-b border-gray-500 hover:bg-gray-100
                dark:hover:bg-gray-700
                hover:rounded-t-lg
            transition-colors duration-200 flex justify-between"
                    onclick="window.location.href = '{{ route('todo.show', ['id' => $todo->id]) }}';"
                >
                    <div class="flex items-center">
                        @if ($todo->status === 'completed')
                            <form action="{{ route('todos.uncomplete_dash', $todo->id) }}" method="POST">
                                @csrf
                                <a href="#" onclick="event.stopPropagation(); this.parentNode.submit(); return false;">
                                    <div class="dark:bg-black/10">
                                        <label class="text-white">
                                            <input class="dark:border-white-400/20 dark:scale-100 transition-all
                                            duration-500 ease-in-out dark:hover:scale-110 dark:checked:scale-100 w-5
                                             h-5" checked type="checkbox">
                                        </label>
                                    </div>

                                </a>
                            </form>
                        @else
                            <form action="{{ route('todos.completed_dash', $todo->id) }}" method="POST">
                                @csrf
                                <a href="#" onclick="event.stopPropagation(); this.parentNode.submit(); return false;">
                                    <div class="dark:bg-black/10">
                                        <label class="text-white">
                                            <input class="dark:border-white-400/20 dark:scale-100 transition-all
                                            duration-500 ease-in-out dark:hover:scale-110 dark:checked:scale-100 w-5
                                            h-5"
                                                   type="checkbox">
                                        </label>
                                    </div>

                                </a>
                            </form>
                        @endif
                        <div>
                            <h5 class="ml-4 font-bold text-gray-400">{{ $todo->title }}</h5>
                            <p class="text-gray-800 dark:text-gray-200 ml-4">
                                @if(strlen($todo->body) > 120)
                                    {{ substr($todo->body, 0, 120) . '...' }}
                                @else
                                    {{ $todo->body }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center align-middle items-center">
                        <div class="mx-2.5 my-0.5 text-gray-400 font-semibold text-xs">
                            {{ Carbon\Carbon::parse($todo->created_at)->format('M j') }}
                        </div>
                        <div>
                            <span class="px-1 font-medium text-xs rounded-full text-white {{ $todo->status ===
                            'completed' ?
                            'bg-green-500' : 'bg-yellow-500' }}">{{ $todo->status }}</span>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>