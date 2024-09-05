<x-user-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold mb-6">Detalhes do TCC</h1>

            <!-- Aluno -->
            <div class="mb-4">
                <h2 class="text-lg font-medium text-gray-700">Aluno:</h2>
                <p class="mt-1 text-gray-600">{{ $item->aluno }}</p>
            </div>

            <!-- Orientador -->
            <div class="mb-4">
                <h2 class="text-lg font-medium text-gray-700">Orientador:</h2>
                <p class="mt-1 text-gray-600">{{ $item->orientador }}</p>
            </div>

            <!-- Título -->
            <div class="mb-4">
                <h2 class="text-lg font-medium text-gray-700">Título:</h2>
                <p class="mt-1 text-gray-600">{{ $item->titulo }}</p>
            </div>

            <!-- Resumo -->
            <div class="mb-4">
                <h2 class="text-lg font-medium text-gray-700">Resumo:</h2>
                <p class="mt-1 text-gray-600">{{ $item->resumo }}</p>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <h2 class="text-lg font-medium text-gray-700">Status:</h2>
                <p class="mt-1 text-gray-600 capitalize">{{ $item->status }}</p>
            </div>

            <!-- Data de Publicação -->
            <div class="mb-4">
                <h2 class="text-lg font-medium text-gray-700">Data de Publicação:</h2>
                <p class="mt-1 text-gray-600">{{ $item->data_publicacao }}</p>
            </div>

            <!-- Arquivo -->
            <div class="mb-4">
                <h2 class="text-lg font-medium text-gray-700">Arquivo:</h2>
                <a href="{{ route('download', ['project' => $item]) }}" class="text-blue-500 hover:underline" target="_blank">Baixar Arquivo</a>
            </div>

        </div>
    </div>

</x-user-layout>
