<x-admin-layout>
    <x-alert />

    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-400 leading-tight w-5/6 flex items-center">
                Artigos
                <span class="bg-green-700 text-white text-xs px-3 py-2 rounded-full ml-2">{{ $items->total() }}</span>
            </h2>
            <div class="w-1/6 flex justify-end">
                <a href="{{ route('admin.articles.create') }}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
                    Novo
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden p-4 shadow-sm sm:rounded-lg border-solid border-2 border-[#5ACC58]">
            <b class="ms-4">Filtros</b>
            <form action="{{ route('admin.article.search') }}">
                <div class="max-w-6xl mx-auto p-6 bg-gray-100 rounded-xl shadow-sm border border-gray-200">
                    <div class="flex flex-wrap gap-4 mb-4">
                        <div class="flex-grow max-w-[200px]">
                            <input type="text" value="{{ request()->issn ?? null }}" name="issn" placeholder="ISSN" id="issn" maxlength="9" class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="flex-grow min-w-[300px]">
                            <input type="text" value="{{ request()->publicado_em ?? null }}" name="publicado_em" placeholder="Publicado em" class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="flex-grow min-w-[300px]">
                            <input type="text" value="{{ request()->palavras_chave ?? null }}" name="palavras_chave" placeholder="Palavras chave" class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-4 mb-4">
                        <div class="flex-grow min-w-[300px]">
                            <input type="text" value="{{ request()->titulo ?? null }}" name="titulo" placeholder="Titulo" class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="min-w-[200px]">
                            <select name="autor" class="w-full select2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700">
                                @if (request()->autor)
                                    <option value="{{ request()->autor }}" selected>{{ $students->firstWhere('id', request()->autor)->nome }}</option>
                                @else
                                    <option value="" disabled selected>Selecione o autor</option>
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
                            <a href="{{ route('admin.articles.index') }}" class="flex items-center gap-2 px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
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
                    <div class="bg-white overflow-hidden p-4 shadow-sm sm:rounded-lg border-solid border-2 border-[#5ACC58]">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-700">
                                <thead class="text-xs text-white uppercase bg-[#5ACC58]">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start">
                                            Título
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Autor
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
                                    <tr
                                        class="bg-[#CCCFD4] h-[100px] border-b dark:bg-gray-800 dark:border-gray-700 text-gray-900">
                                        <td class="px-6 py-4 text-start whitespace-normal w-[400px]">
                                            {{ $item->titulo }}
                                        </td>
                                        <td class="px-6 py-4 text-center w-[150px]">
                                            {{ $item->autor->nome }}
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
                                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown{{ $item->id }}" class="text-white bg-blue-700 hover:bg-blue-800 rounded-lg text-sm px-5 py-2 text-center inline-flex items-center" type="button">Mais <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Dropdown ações --}}
            <div id="dropdown{{ $item->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="javascript:void(0)" data-modal-toggle="modal-article-pdf-{{$item->id}}" data-modal-target="modal-article-pdf-{{$item->id}}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ver</a>
                        </li>
                        <li>
                            <a href="{{ route('article.download', ['article' => $item]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.articles.edit', ['article' => $item]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Editar</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a data-modal-target="popup-modal-{{ $item->id }}" data-modal-toggle="popup-modal-{{ $item->id }}" href="javascript:void(0);" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Excluir
                        </a>
                    </div>
            </div>

            {{-- Modal excluir --}}
            <div id="popup-modal-{{ $item->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $item->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Fechar modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Tem certeza que deseja excluir esse Artigo, esse processo é irreversível?</h3>
                                <button data-modal-hide="popup-modal-{{ $item->id }}" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    Não, cancelar
                                </button>
                                <form action="{{ route('admin.articles.destroy', ['article' => $item]) }}" method="POST" id="form-destroy-{{ $item->id }}" class="inline-flex">
                                    @csrf
                                    @method('delete')
                                    <button data-modal-hide="popup-modal-{{ $item->id }}" type="submit" class="text-white ms-3 bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Sim, excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal embed --}}
                <div id="modal-article-pdf-{{$item->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    {{ $item->titulo }}
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-article-pdf-{{$item->id}}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <embed src="{{ route('article.embed', ['article' => $item]) }}" width="100%" height="400px" />
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

</x-admin-layout>
