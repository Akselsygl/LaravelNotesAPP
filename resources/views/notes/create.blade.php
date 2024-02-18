<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Note') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 p-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Create Note") }}
                    <div class="float-right">
                          <x-amber-btn-link :href="route('notes.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
                              </svg>
                              Back
                          </x-amber-btn-link>
                    </div>
                    <form method="post" action="{{ route('notes.store') }}" class="mt-6 space-y-6 ">
                        @csrf
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="body" :value="__('Body')" />
                            <x-textarea-input name="body" class="mt-1 block w-full">{{old('body')}} </x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('body')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Create') }}</x-primary-button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
