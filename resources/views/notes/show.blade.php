<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Note') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 p-4">
           <x-amber-btn-link :href="route('notes.index')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
              </svg>
              Back
            </x-amber-btn-link>
            <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-md rounded-md overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">{{$note->title}}</h2>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">{{$note->body}}</p>
                </div>
                @if ($note->user->is(auth()->user()))

                <div class="flex justify-end p-4 bg-gray-100 dark:bg-gray-700">
                    <x-cyan-btn-link class="mr-2" :href="route('notes.edit',$note->id)">Edit</x-cyan-btn-link>

                    <form action="{{route('notes.destroy',$note->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <x-danger-button>
                            Delete
                        </x-danger-button>
                    </form>
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
