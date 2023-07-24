<li class="flex flex-row gap-8 border-b rounded p-2" style={margin-bottom: 0.5rem;}>
    <p class="w-full p-2 font-semibold">{{ $task->title }}</p>
    <p class="w-full p-2">{{ $task->description }}</p>
    <p class="w-full p-2">{{ date('F d, y', strtotime($task->due_date)) }}</p>
</li>
