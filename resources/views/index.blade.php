<x-user-layout>
    <div class="py-12">
        <div>
            {{ $items->appends(request()->input())->links() }}
        </div>
        @foreach ($items as $item)
            <x-final-project titulo="{{ $item->titulo }}" status="{{ $item->status }}" orientador="{{ $item->orientador }}"
                data-publicacao="{{ $item->data_publicacao }}" aluno="{{ $item->aluno }}" />
        @endforeach
        <div>
            {{ $items->appends(request()->input())->links() }}
        </div>
    </div>
</x-user-layout>
