<x-app-layout>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

        <div class="flex w-full sm:max-w-md justify-between">
            <h1 class="text-white text-lg font-bold">All comments</h1>

            <div>
                {{-- <a class="button-green p-2" href="{{ route('ticket.create') }}">Create New +</a> --}}
            </div>
        </div>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg text-white">
    @foreach ($comments as $com)
    <div >
        <p>{{ $com->username }}</p>
        <p>{{ $com->comment }}</p>
        <p>{{ $com->created_at->diffForHumans() }}</p>

        <br>
    </div>
    @endforeach

    </div>
</div>
</x-app-layout>