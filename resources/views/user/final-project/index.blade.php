<x-user-layout>

    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-400 leading-tight w-5/6 flex items-center">
                Trabalho Conclusão de Curso
                <span class="bg-green-700 text-white text-xs px-3 py-2 rounded-full ml-2">{{ $items->total() }}</span>
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <form action="{{ route('user.project.search') }}">
            <div class="flex items-center w-full max-w-4xl space-x-4 bg-gray-100 p-4 rounded-lg">
                <input type="text" name="titulo" placeholder="Titulo" class="flex-grow px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <input type="text" name="aluno" placeholder="Aluno" class="flex-grow px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <input type="text" name="orientador" placeholder="Orientador" class="flex-grow px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <input type="date" name="inicial_data" placeholder="Data Inicial" class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <input type="date" name="final_data" placeholder="Data Final" class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">

                <button class="flex-grow bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none">
                Buscar
                </button>
            </div>
        </form>
    </div>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            {{ $items->appends(request()->input())->links() }}
        </div>
        @foreach ($items as $item)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden p-4 shadow-sm sm:rounded-lg border-solid border-2 border-[#5ACC58]">
                    <b>Trabalho Conclusão de Curso</b>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
                            <thead class="text-xs text-white uppercase bg-[#5ACC58] dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Título
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Aluno
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Orientador
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Data de publicação
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-[#CCCFD4] h-[100px] border-b dark:bg-gray-800 dark:border-gray-700 text-gray-900">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                        {{ $item->titulo }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->aluno }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->orientador }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->data_publicacao->translatedFormat('j \\d\\e F \\d\\e Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="javascript:void(0)" data-modal-toggle="modal-tcc-pdf-{{$item->id}}" data-modal-target="modal-tcc-pdf-{{$item->id}}"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                            > Ver</a>
                                        <a href="{{ route('project.download', ['project' => $item]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Baixar</a>
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            {{ $items->appends(request()->input())->links() }}
        </div>
    </div>
</x-user-layout>
