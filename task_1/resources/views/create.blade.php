<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Task') }}
        </h2>
    </x-slot>

    <form class="py-12" method="POST" action="/tasks/create">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex justify-end p-6">
                <x-primary-button>{{ __('create') }}</x-primary-button>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col gap-4">
                    <h2 class="font-semibold">
                        {{ __("Here are your Tasks") }}
                    </h2>
                    <div class="w-full">
                        <x-input-label for="title" :value="__('Title for the task')" />
                        <x-text-input id="title" name="title" type="text" />
                    </div>
                    <div class="w-full">
                        <x-input-label for="description" :value="__('Description for the task')" />
                        <x-text-input id="description" name="description" type="text" />
                    </div>
                    <div class="w-full">
                        <x-input-label for="due_date" :value="__('Due Date for the task')" />
                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="date" name="due_date" id="due_date" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
