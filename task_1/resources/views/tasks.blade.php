<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex justify-end p-6">
                <a href="{{ url('tasks/create') }}">
                    <x-primary-button>{{ __('new task') }}</x-primary-button>
                </a>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col gap-4">
                    <h2 class="font-semibold">
                        {{ __("Here are your Tasks") }}
                    </h2>

                    <ul class="text-sm flex flex-col gap-2">
                        @foreach ($tasks as $task)
                            <x-list-item :task="$task"></x-list-item>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
