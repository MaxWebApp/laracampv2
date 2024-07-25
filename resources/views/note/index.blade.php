<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        @session('message')
            <div class="success-message">
                {{ session('message') }}
            </div>
        @endsession

        <x-custom-button class="mt-4">{{ __('新增筆記') }}</x-custom-button>
        <!-- The only way to do great work is to love what you do. - Steve Jobs -->
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($notes as $note)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $note->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600 note_btn">{{ $note->created_at->format('j M Y, g:i a') }}</small>
                                <a href="{{route('note.show', $note)}}" class="note_btn">
                                    <small class="text-sm text-gray-600 note_link"> - {{__('瀏覽筆記')}}</small>
                                </a>
                                @unless ($note->created_at->eq($note->updated_at))
                                    <small class="text-sm text-gray-600"> - {{__('Edit')}}</small>
                                @endunless
                            </div>
                            @if ($note->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('note.edit', $note)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('note.destroy', $note) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('note.destroy', $note)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ Str::words($note->note, 30) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
