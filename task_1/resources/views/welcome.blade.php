<x-layout>
    <section class="flex flex-col gap-4">
        <h1 class="text-2xl font-semibold">Login or Register to view your dashboard</h1>
        <div class="flex flex-row items-center justify-center gap-8">
            <x-button href="{{ url('/login') }}">Log In</x-button>
            <x-button href="{{ url('/register') }}">Register</x-button>
        </div>
    </section>
</x-layout>
