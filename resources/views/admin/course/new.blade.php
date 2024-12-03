<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.courses.index') }}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
                « voltar
            </a>
            <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-2xl font-semibold mb-6">Formulário de cadastro de Curso</h1>

                <form action="{{ route('admin.courses.store') }}" method="POST">
                    @csrf

                    <!-- Nome -->
                    <div class="mb-4">
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                        <input type="text" id="nome" name="nome" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Sigla -->
                    <div class="mb-4">
                        <label for="sigla" class="block text-sm font-medium text-gray-700">Sigla</label>
                        <input type="text" id="sigla" maxlength="4" name="sigla" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm uppercase" required>
                    </div>

                    <!-- Botão de Submissão -->
                    <div>
                        <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Criar Curso</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-admin-layout>
