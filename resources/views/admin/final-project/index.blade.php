<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            {{ $items->appends(request()->input())->links() }}
        </div>
        @foreach ($items as $item)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden p-4 shadow-sm sm:rounded-lg border-solid border-2 border-[#5ACC58]">
                    <b>Trabalho {{ $item->status }}</b>
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
                                <tr
                                    class="bg-[#CCCFD4] h-[100px] border-b dark:bg-gray-800 dark:border-gray-700 text-gray-900">
                                    <td scope="row" class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                        {{ $item->titulo }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->aluno }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->orientador }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->data_publicacao }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown{{ $item->id }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Mais <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
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
                        <a href="{{ route('admin.final-projects.show', ['final_project' => $item]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Detalhes</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.final-projects.edit', ['final_project' => $item]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Editar</a>
                    </li>
                </ul>
                <div class="py-2">
                    <form action="{{ route('admin.final-projects.destroy', ['final_project' => $item]) }}" method="POST" id="form-destroy-{{ $item->id }}">
                        @csrf
                        @method('delete')
                        <a href="javascript:void(0);" onclick="document.getElementById('form-destroy-{{ $item->id }}').submit()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Excluir</a>
                    </form>
                </div>
           </div>
        @endforeach
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            {{ $items->appends(request()->input())->links() }}
        </div>
    </div>
</x-admin-layout>
