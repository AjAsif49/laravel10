<x-app-layout>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

    <h1 class="text-white text-lg font-bold">Support Tickets</h1>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            

        @foreach ($tickets as $ticket)
        <div class="text-white flex justify-between py-4">
            <p>{{ $ticket->title }}</p>
            <p>{{ $ticket->created_at->diffForHumans() }}</p>

        </div>
        @endforeach

</div>
</div>
</x-app-layout>