<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>
    <div class="flex items-center my-14 w-8/12 mx-auto">
        <div class="flex justify-center items-center md:flex-row md:space-x-4 mx-auto w-full max-w-2xl">
            <div class="flex flex-col w-full md:w-3/4">
                <div class="text-center mb-4">
                    <h1 class="text-3xl font-bold text-white">Create New Todo</h1>
                </div>

                <form method="POST" action="{{ route('todo.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                        <input type="text" id="title" name="title"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror">
                        <div class="text-red-600">@error('title')
                            {{ $message }}
                            @enderror</div>
                    </div>
                    <div class="mb-4">
                        <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea id="body" name="body" rows="5"
                                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('body') border-red-500 @enderror"></textarea>
                        <div class="text-red-600">
                            @error('body')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="priority" class="block text-gray-700 text-sm font-bold mb-2">Priority</label>
                        <select id="priority" name="priority"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="1">High</option>
                            <option value="2">Medium</option>
                            <option value="3">Low</option>

                        </select>
                        <div class="text-red-600">
                            @error('priority')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end">
                        <x-add_button_blue title="Create Todo"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>