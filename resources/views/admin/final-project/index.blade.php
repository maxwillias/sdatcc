<x-admin-layout>
    <x-alert />

    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-400 leading-tight w-5/6 flex items-center">
                Trabalho Conclusão de Curso
                <span class="bg-green-700 text-white text-xs px-3 py-2 rounded-full ml-2">{{ $items->total() }}</span>
            </h2>
            <div class="w-1/6 flex justify-end">
                <a href="{{ route('admin.final-projects.create') }}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
                    Novo
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden p-4 shadow-sm sm:rounded-lg border-solid border-2 border-[#5ACC58]">
            <b>Filtros</b>
            <form action="{{ route('admin.project.search') }}">
                <div class="flex items-center w-full space-x-4 bg-gray-100 p-4 rounded-lg">
                    <input type="text" name="titulo" placeholder="Titulo" class="flex-grow px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <input type="text" name="aluno" placeholder="Aluno" class="flex-grow px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <input type="text" name="orientador" placeholder="Orientador" class="flex-grow px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <input type="date" name="inicial_data" placeholder="Data Inicial" class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <input type="date" name="final_data" placeholder="Data Final" class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">

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
                                        Aluno
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
                                <tr
                                    class="bg-[#CCCFD4] h-[100px] border-b text-gray-900">
                                    <td class="px-6 py-4 text-start whitespace-normal w-[400px]">
                                        {{ $item->titulo }}
                                    </td>
                                    <td class="px-6 py-4 text-center w-[150px]">
                                        {{ $item->aluno }}
                                    </td>
                                    <td class="px-6 py-4 text-center w-[150px]">
                                        {{ $item->orientador }}
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
                        <a href="javascript:void(0)" data-modal-toggle="modal-tcc-pdf-{{$item->id}}" data-modal-target="modal-tcc-pdf-{{$item->id}}"
                         class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ver</a>
                    </li>
                    <li>
                        <a href="{{ route('project.download', ['project' => $item]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.final-projects.edit', ['final_project' => $item]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Editar</a>
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
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Tem certeza que deseja excluir esse Trabalho de conclusão de curso, esse processo é irreversível?</h3>
                            <button data-modal-hide="popup-modal-{{ $item->id }}" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Não, cancelar
                            </button>
                            <form action="{{ route('admin.final-projects.destroy', ['final_project' => $item]) }}" method="POST" id="form-destroy-{{ $item->id }}" class="inline-flex">
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

</x-admin-layout>
