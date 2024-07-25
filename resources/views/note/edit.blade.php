<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
        <h1>修改筆記</h1>

        <form method="POST" action="{{ route('note.update', $note) }}">
            @csrf
            @method('patch')
            <textarea
                name="note"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('note', $note->note) }}</textarea>
            <x-input-error :messages="$errors->get('note')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('儲存') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
