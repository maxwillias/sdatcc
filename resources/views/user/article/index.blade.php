<x-user-layout>

    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-400 leading-tight w-5/6 flex items-center">
                Artigos
                <span class="bg-green-700 text-white text-xs px-3 py-2 rounded-full ml-2">{{ $items->total() }}</span>
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden p-4 shadow-sm sm:rounded-lg border-solid border-2 border-[#5ACC58]">
            <b>Filtros</b>
            <form action="{{ route('user.article.search') }}">
                <div class="flex items-center w-full space-x-4 bg-gray-100 p-4 rounded-lg">
                    <input type="text" name="titulo" placeholder="Titulo" class="flex-grow px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <div class="w-1/2">
                        <select class="w-full border select2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700 py-2 px-4">
                            <option value="" disabled selected>Selecione o aluno</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/2">
                        <select class="w-full border select2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700 py-2 px-4">
                            <option value="" disabled selected>Selecione o orientador</option>
                            @foreach ($advisors as $advisor)
                                <option value="{{ $advisor->id }}">{{ $advisor->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative">
                        <input type="date" name="inicial_data" class="block px-2.5 pb-2.5 pt-4 w-full text-sm bg-white text-gray-900 bg-transparent border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                        <label class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 left-2.5">
                            Data de inicio
                        </label>
                    </div>
                    <div class="relative">
                        <input name="final_data" type="date" class="block px-2.5 pb-2.5 pt-4 w-full text-sm bg-white text-gray-900 bg-transparent border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                        <label class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 left-2.5">
                            Data final
                        </label>
                    </div>

                    <button class="flex-grow bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg">
                    Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div>
        @foreach ($items as $item)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden p-4 shadow-sm sm:rounded-lg border-solid border-2 border-[#5ACC58]">
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
                                        Data de publicação
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-[#CCCFD4] h-[100px] border-b text-gray-900">
                                    <td class="px-6 py-4 text-start whitespace-normal w-[400px]">
                                        {{ $item->titulo }}
                                    </td>
                                    <td class="px-6 py-4 text-center w-[150px]">
                                        {{ $item->autor->nome }}
                                    </td>
                                    <td class="px-6 py-4 text-center w-[150px]">
                                        {{ $item->orientador->nome }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $item->data_publicacao->translatedFormat('j \\d\\e F \\d\\e Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex flex-col">
                                            <a href="javascript:void(0)" data-modal-toggle="modal-article-pdf-{{$item->id}}" data-modal-target="modal-article-pdf-{{$item->id}}"
                                                class="text-white bg-blue-700 hover:bg-blue-800 rounded-lg text-sm py-1 me-2 mb-2"
                                                > Ver</a>
                                            <a href="{{ route('article.download', ['article' => $item]) }}" class="text-white bg-blue-700 hover:bg-blue-800 rounded-lg text-sm py-1 me-2 mb-2">Baixar</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            {{ $items->appends(request()->input())->links() }}
        </div>
    </div>
</x-user-layout>
