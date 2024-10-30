<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-2xl font-semibold mb-6">Formulário de Criação de Artigo</h1>

                <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Autor -->
                    <div class="mb-4">
                        <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
                        <input type="text" id="autor" name="autor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Orientador -->
                    <div class="mb-4">
                        <label for="orientador" class="block text-sm font-medium text-gray-700">Orientador</label>
                        <input type="text" id="orientador" name="orientador" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Título -->
                    <div class="mb-4">
                        <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" id="titulo" name="titulo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Data de Publicação -->
                    <div class="mb-4">
                        <label for="data_publicacao" class="block text-sm font-medium text-gray-700">Data de Publicação</label>
                        <input type="date" id="data_publicacao" name="data_publicacao" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Arquivo -->
                    <div class="mb-4">
                        <label for="arquivo" class="block text-sm font-medium text-gray-700">Arquivo</label>
                        <input type="file" id="arquivo" name="arquivo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Botão de Submissão -->
                    <div>
                        <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Criar Artigo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-admin-layout>
