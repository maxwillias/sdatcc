<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.advisors.index') }}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
                « voltar
            </a>
            <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-2xl font-semibold mb-6">Formulário de Edição de Orientador</h1>

                <form action="{{ route('admin.advisors.update', ['advisor' => $item]) }}" method="POST">
                    @method('put')
                    @csrf

                    <!-- Nome -->
                    <div class="mb-4">
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome <span class="text-red-500">*</span></label>
                        <input type="text" id="nome" name="nome" value="{{ $item->nome }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <!-- Curso -->
                    <div class="mb-4">
                        <label for="curso" class="block text-sm font-medium text-gray-700 mb-1">Curso <span class="text-red-500">*</span></label>
                        <select name="curso" required class="w-full border select2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700 py-2 px-4">
                            <option value="{{$item->curso->id}}" selected>{{$item->curso->nome}}</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->nome }}</option>
                            @endforeach
                        </select>
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
