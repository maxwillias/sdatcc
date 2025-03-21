<x-admin-layout>
    <x-errors />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.final-projects.index') }}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
                « voltar
            </a>
            <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-2xl font-semibold mb-6">Formulário de Criação de TCC</h1>

                <form action="{{ route('admin.final-projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Aluno -->
                    <div class="mb-4">
                        <label for="aluno" class="block mb-1 text-sm font-medium text-gray-700">Aluno <span class="text-red-500">*</span></label>
                        <select name="aluno" required class="w-full border select2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700 py-2 px-4">
                            <option value="" disabled selected>Selecione o aluno</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Orientador -->
                    <div class="mb-4">
                        <label for="orientador" class="block mb-1 text-sm font-medium text-gray-700">Orientador <span class="text-red-500">*</span></label>
                        <select name="orientador" required class="w-full border select2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700 py-2 px-4">
                            <option value="" disabled selected>Selecione o orientador</option>
                            @foreach ($advisors as $advisor)
                                <option value="{{ $advisor->id }}">{{ $advisor->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Curso -->
                    <div class="mb-4">
                        <label for="curso" class="block mb-1 text-sm font-medium text-gray-700">Curso <span class="text-red-500">*</span></label>
                        <select name="curso" required class="w-full border select2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700 py-2 px-4">
                            <option value="" disabled selected>Selecione o curso</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Título -->
                    <div class="mb-4">
                        <label for="titulo" class="block text-sm font-medium text-gray-700">Título <span class="text-red-500">*</span></label>
                        <input type="text" id="titulo" name="titulo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Palavras chave -->
                    <div class="mb-4">
                        <label for="palavras_chave" class="block text-sm font-medium text-gray-700">Palavras chave <span class="text-red-500">*</span></label>
                        <input type="text" id="palavras_chave" name="palavras_chave" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Data de Publicação -->
                    <div class="mb-4">
                        <label for="data_publicacao" class="block text-sm font-medium text-gray-700">Data de Publicação <span class="text-red-500">*</span></label>
                        <input type="date" id="data_publicacao" name="data_publicacao" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Arquivo -->
                    <div class="mb-4">
                        <label for="arquivo" class="block text-sm font-medium text-gray-700">Arquivo <span class="text-red-500">*</span></label>
                        <input type="file" accept=".pdf" id="arquivo" name="arquivo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Botão de Submissão -->
                    <div>
                        <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Criar TCC</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-admin-layout>
