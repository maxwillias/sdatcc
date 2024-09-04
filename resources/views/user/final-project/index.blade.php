<x-user-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            {{ $items->appends(request()->input())->links() }}
        </div>
        @foreach ($items as $item)
            <x-final-project titulo="{{ $item->titulo }}" status="{{ $item->status }}" orientador="{{ $item->orientador }}"
                data-publicacao="{{ $item->data_publicacao }}" aluno="{{ $item->aluno }}" />
        @endforeach
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            {{ $items->appends(request()->input())->links() }}
        </div>
    </div>
</x-user-layout>
