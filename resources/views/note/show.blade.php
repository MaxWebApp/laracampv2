<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
        <h1>瀏覽筆記</h1>
        <h4 class="mt-6 text-gray-600">{{ $note->created_at }}</h4>
        <x-primary-button class="mt-4">{{ __('退出') }}</x-primary-button>
        <a href="{{ route('note.index') }}">{{ __('Cancel') }}</a>
        <div class="note_body">{{ $note->note }}</div>
    </div>
</x-app-layout>
