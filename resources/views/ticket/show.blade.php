<x-app-layout>


    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

    <h1 class="text-white text-lg font-bold"><p>{{ $ticket->title }}</p></h1>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            

        
        <div class="text-white flex justify-between py-4">
            <p>{{ $ticket->description }}</p>
            <p>{{ $ticket->created_at->diffForHumans() }}</p>

            @if($ticket->attachment)
                <a class="ml-2" href="{{ "/storage/" . $ticket->attachment }}">Attachment</a>
            @endif
        </div>

        <div class="flex justify-between">
        <div class="flex">

            <a href="{{ route('ticket.edit', $ticket->id) }}">

                <x-primary-button class="button-blue">Edit</x-primary-button>
            </a>
            
            <form class="ml-2" action="{{ route('ticket.destroy', $ticket->id) }}" method="post">
                @method('delete')
                @csrf
                <x-primary-button class="button-red">Delete</x-primary-button>
            </form>
    </div>

    @if (auth()->user()->isAdmin)
                    <div class="flex">
                        <form action="{{ route('ticket.update', $ticket->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="resolved" />
                            <x-primary-button class="button-green">Resolve</x-primary-button>
                        </form>
                        <form action="{{ route('ticket.update', $ticket->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="rejected" />
                            <x-primary-button class="ml-2 button-red">Reject</x-primary-button>
                        </form>
                    </div>
                @else
                    <p class="text-white">Status: {{ $ticket->status }} </p>
                @endif

    </div>

</div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <form action="{{ route('comment.create') }}" method="post">
                @csrf
            <div class="mt-4">
                <x-input-label for="comment" :value="__('Comment')" />
                <x-textarea name="comment" id="comment" value=""/>
            </div>
            <x-primary-button class="">
                {{ __('Comment') }}
            </x-primary-button>
        </form><br>
        <a href="{{ route('comment.create') }}">

            <x-primary-button class="button-blue">All comments</x-primary-button>
        </a>
    </div>
</div>
</x-app-layout>