<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-2xl font-semibold mb-6">Formulário de Edição de TCC</h1>

                <form action="{{ route('admin.final-projects.update', ['final_project' => $item]) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <!-- Aluno -->
                    <div class="mb-4">
                        <label for="aluno" class="block mb-1 text-sm font-medium text-gray-700">Aluno</label>
                        <select name="aluno" class="w-full border select2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700 py-2 px-4">
                            <option value="{{ $item->aluno->id }}" selected>{{ $item->aluno->nome }}</option>
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
