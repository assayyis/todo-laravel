<x-app-layout>    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 text-center">
                <p class="text-5xl">Welcome to <span class="text-red-500">TodoList</span></p>
                <p class="py-10">Your go-to productivity solution! Effortlessly manage tasks and enjoy a clutter-free interface. <br>Welcome to a simpler, more organized life with Todo List!</p>
                <x-primary-button class="my-4" onclick="window.location='{{ URL::route('todos.index'); }}'">
                    Start writing todo
                </x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>
