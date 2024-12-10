<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.articles.index') }}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
                « voltar
            </a>
            <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-2xl font-semibold mb-6">Formulário de Edição de Artigo</h1>

                <form action="{{ route('admin.articles.update', ['article' => $item]) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <!-- Autor -->
                    <div class="mb-4">
                        <label for="autor" class="block mb-1 text-sm font-medium text-gray-700">Autor</label>
                        <select name="autor" class="w-full border select2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700 py-2 px-4">
                            <option value="{{ $item->autor->id }}" selected>{{ $item->autor->nome }}</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Orientador -->
                    <div class="mb-4">
                        <label for="orientador" class="block mb-1 text-sm font-medium text-gray-700">Orientador</label>
                        <select name="orientador" class="w-full border select2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700 py-2 px-4">
                            <option value="{{ $item->orientador->id }}" selected>{{ $item->orientador->nome }}</option>
                            @foreach ($advisors as $advisor)
                                <option value="{{ $advisor->id }}">{{ $advisor->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Título -->
                    <div class="mb-4">
                        <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" id="titulo" name="titulo" value="{{ $item->titulo }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- ISSN -->
                    <div class="mb-4">
                        <label for="issn" class="block text-sm font-medium text-gray-700">ISSN</label>
                        <input type="text" id="issn" maxlength="9" name="issn" value="{{ $item->issn }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Publicado em -->
                    <div class="mb-4">
                        <label for="publicado_em" class="block text-sm font-medium text-gray-700">Publicado em</label>
                        <input type="text" id="publicado_em" name="publicado_em" value="{{ $item->publicado_em }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Palavras chave -->
                    <div class="mb-4">
                        <label for="palavras_chave" class="block text-sm font-medium text-gray-700">Palavras chave</label>
                        <input type="text" id="palavras_chave" name="palavras_chave" value="{{ $item->palavras_chave }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Data de Publicação -->
                    <div class="mb-4">
                        <label for="data_publicacao" class="block text-sm font-medium text-gray-700">Data de Publicação</label>
                        <input type="date" id="data_publicacao" name="data_publicacao" value="{{ $item->data_publicacao->format('Y-m-d') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Arquivo -->
                    <div class="mb-4">
                        <label for="arquivo" class="block text-sm font-medium text-gray-700">Arquivo</label>
                        <input type="file" id="arquivo" name="arquivo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <!-- Botão de Submissão -->
                    <div>
                        <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-admin-layout>
