<x-user-layout>

    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-md sm:text-xl text-gray-400 leading-tight w-5/6 flex items-center">
                Trabalho Conclusão de Curso
                <span class="bg-green-700 text-white text-sm sm:text-xs px-3 py-2 rounded-full ml-2">{{ $items->total() }}</span>
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden p-4 shadow-sm sm:rounded-lg border-solid border-2 border-[#5ACC58]">
            <b class="ms-4">Filtros</b>
            <form action="{{ route('user.project.search') }}">
                <div class="max-w-6xl mx-auto p-6 bg-gray-100 rounded-xl shadow-sm border border-gray-200">
                    <div class="flex flex-wrap gap-4 mb-4">
                        <div class="flex-grow min-w-[300px]">
                            <input type="text" value="{{ request()->titulo ?? null }}" name="titulo" placeholder="Titulo" class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-4 mb-4">
                        <div class="flex-grow min-w-[300px]">
                            <input type="text" value="{{ request()->palavras_chave ?? null }}" name="palavras_chave" placeholder="Palavras chave" class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="min-w-[200px]">
                            <select name="aluno" class="w-full select2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700">
                                @if (request()->aluno)
                                    <option value="{{ request()->aluno }}" selected>{{ $students->firstWhere('id', request()->aluno)->nome }}</option>
                                @else
                                    <option value="" disabled selected>Selecione o aluno</option>
                                @endif
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="min-w-[200px]">
                            <select name="orientador" class="w-full select2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700">
                                @if (request()->orientador)
                                    <option value="{{ request()->orientador }}" selected>{{ $advisors->firstWhere('id', request()->orientador)->nome }}</option>
                                @else
                                    <option value="" disabled selected>Selecione o orientador</option>
                                @endif
                                @foreach ($advisors as $advisor)
                                    <option value="{{ $advisor->id }}">{{ $advisor->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-4 items-end">
                        <div class="min-w-[300px]">
                            <select name="curso" class="w-full select2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700">
                                @if (request()->curso)
                                    <option value="{{ request()->curso }}" selected>{{ $courses->firstWhere('id', request()->curso)->sigla }}</option>
                                @else
                                    <option value="" disabled selected>Selecione o curso</option>
                                @endif
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->sigla }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex-grow min-w-[200px] relative">
                            <input type="date" value="{{ request()->inicial_data ?? null }}" name="inicial_data" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700"/>
                            <label class="absolute text-sm text-gray-500 -top-2 left-2 bg-white px-1">
                                Data de inicio
                            </label>
                        </div>
                        <div class="flex-grow min-w-[200px] relative">
                            <input name="final_data" value="{{ request()->final_data ?? null }}" type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700"/>
                            <label class="absolute text-sm text-gray-500 -top-2 left-2 bg-white px-1">
                                Data final
                            </label>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex items-center gap-2 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Buscar
                            </button>
                            <a href="{{ route('user.final-projects.index') }}" class="flex items-center gap-2 px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Limpar
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div>
        @if ($items->total())
            @foreach ($items as $item)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden p-4 shadow-sm sm:rounded-lg border-solid border-2 border-[#5ACC58]">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
                                <thead class="text-xs text-white uppercase bg-[#5ACC58] dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start">
                                            Título
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Aluno
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Orientador
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Curso
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Data de publicação
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-[#CCCFD4] h-[100px] border-b dark:bg-gray-800 dark:border-gray-700 text-gray-900">
                                        <td class="px-6 py-4 text-start whitespace-normal w-[400px]">
                                            {{ $item->titulo }}
                                        </td>
                                        <td class="px-6 py-4 text-center w-[150px]">
                                            {{ $item->aluno->nome }}
                                        </td>
                                        <td class="px-6 py-4 text-center w-[150px]">
                                            {{ $item->orientador->nome }}
                                        </td>
                                        <td class="px-6 py-4 text-center w-[150px]">
                                            {{ $item->curso->nome }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $item->data_publicacao->translatedFormat('j \\d\\e F \\d\\e Y') }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex flex-col">
                                                <a href="javascript:void(0)" data-modal-toggle="modal-tcc-pdf-{{$item->id}}" data-modal-target="modal-tcc-pdf-{{$item->id}}"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 rounded-lg text-sm py-1 me-2 mb-2"
                                                    > Ver</a>
                                                <a href="{{ route('project.download', ['project' => $item]) }}" class="text-white bg-blue-700 hover:bg-blue-800 rounded-lg text-sm py-1 me-2 mb-2">Baixar</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Modal embed --}}
                <div id="modal-tcc-pdf-{{$item->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    {{ $item->titulo }}
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-tcc-pdf-{{$item->id}}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <embed src="{{ route('project.embed', ['project' => $item]) }}" width="100%" height="400px" />
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
                <div class="flex justify-center items-center h-48 bg-gray-100 rounded-lg">
                    <p class="text-gray-500 text-lg font-medium">Não há registros a serem exibidos.</p>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            {{ $items->appends(request()->input())->links() }}
        </div>
    </div>
</x-user-layout>
