<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todo Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center mb-4">
                        <div class="mr-4 flex items-center">
                            @if ($todo->status === 'completed')
                                <form action="{{ route('todos.uncomplete', $todo->id) }}"
                                      method="POST">
                                    @csrf
                                    <a href="#"
                                       onclick="this.parentNode.submit(); return false;">
                                        <label class="text-white">
                                            <input class="dark:border-white-400/20 dark:scale-100 transition-all
                                            duration-500 ease-in-out dark:hover:scale-110 dark:checked:scale-100 w-5
                                            h-5"
                                                   checked
                                                   type="checkbox">
                                        </label>
                                    </a>
                                </form>
                            @else
                                <form action="{{ route('todos.completed', $todo->id) }}"
                                      method="POST">
                                    @csrf
                                    <a onclick="this.parentNode.submit(); return false;">
                                        <label class="text-white">
                                            <input class="dark:border-white-400/20 dark:scale-100 transition-all
                                            duration-500 ease-in-out dark:hover:scale-110 dark:checked:scale-100 w-5
                                            h-5"
                                                   type="checkbox">
                                        </label>
                                    </a>
                                </form>
                            @endif
                            @if($todo->status === 'completed')
                                <span class="text-gray-700 text-lg font-semibold ml-3 line-through transition
                            ">{{ $todo->title }}</span>
                            @else
                                <span class="text-gray-700 text-lg font-semibold ml-3
                            ">{{ $todo->title }}</span>
                            @endif

                        </div>
                        <div class="flex-grow"></div>
                        <div>
                            <span class="px-2 py-1 rounded-full text-white {{ $todo->status === 'completed' ? 'bg-green-500' : 'bg-yellow-500' }}">{{ $todo->status }}</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h2 class="text-lg font-semibold mb-2">Description:</h2>
                        <textarea readonly
                                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('body') border-red-500 @enderror"
                                  rows="3">{{ $todo->body }}</textarea>
                    </div>

                    <div class="mb-4">
                        <h2 class="text-lg font-semibold mb-2">Priority:</h2>
                        <span class="px-2 py-1 rounded-full text-white {{ $todo->priority === 1 ? 'bg-red-500' : ($todo->priority === 2 ? 'bg-yellow-500' : 'bg-green-500') }}">{{ $todo->priority }}</span>
                    </div>

                    <div class="mb-4">
                        <h2 class="text-lg font-semibold mb-2">Created:</h2>
                        <p class="text-gray-700">{{ $todo->created_at->format('M d, Y h:i A') }}</p>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('dashboard') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>