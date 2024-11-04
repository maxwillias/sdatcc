<x-admin-layout>
    <x-alert />

    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-400 leading-tight w-5/6 flex items-center">
                Alunos
                <span class="bg-green-700 text-white text-xs px-3 py-2 rounded-full ml-2">{{ $items->total() }}</span>
            </h2>
            <div class="w-1/6 flex justify-end">
                <a href="{{ route('admin.students.create') }}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
                    Novo
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden p-4 shadow-sm sm:rounded-lg border-solid border-2 border-[#5ACC58]">
            <b>Filtros</b>
            <form action="{{ route('admin.student.search') }}">
                <div class="flex items-center w-full space-x-4 bg-gray-100 p-4 rounded-lg">
                    <input name="aluno_nome" value="{{ request()->aluno_nome ?? null }}" type="text" name="nome" placeholder="Nome" class="flex-grow px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <div class="w-1/2">
                        <select name="curso" class="w-full border select2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-700 py-2 px-4">
                            @if (request()->curso)
                                <option value="{{ request()->curso }}" selected>{{ $courses->firstWhere('id', request()->curso)->nome }}</option>
                            @else
                                <option value="" disabled selected>Selecione o curso</option>
                            @endif
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->nome }}</option>
                            @endforeach
                        </select>
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
                <div class="bg-white overflow-hidden p-4 shadow-sm sm:rounded-lg border-solid border-2 border-[#5ACC58]">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-700">
                            <thead class="text-xs text-white uppercase bg-[#5ACC58]">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Curso
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="bg-[#CCCFD4] h-[100px] border-b dark:bg-gray-800 dark:border-gray-700 text-gray-900">
                                    <td class="px-6 py-4 text-center whitespace-normal w-[400px]">
                                        {{ $item->nome }}
                                    </td>
                                    <td class="px-6 py-4 text-center w-[400px]">
                                        {{ $item->curso->nome }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex flex-col items-center">
                                            <a href="{{ route('admin.students.edit', ['student' => $item]) }}" class="text-white bg-blue-700 hover:bg-blue-800 rounded-lg text-sm py-1 me-2 mb-2 w-[100px]">
                                                Editar
                                            </a>
                                            <a data-modal-target="popup-modal-{{ $item->id }}" data-modal-toggle="popup-modal-{{ $item->id }}" href="javascript:void(0);" class="text-white bg-blue-700 hover:bg-blue-800 rounded-lg text-sm py-1 me-2 mb-2 w-[100px]">
                                                Excluir
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Tem certeza que deseja excluir esse Aluno, esse processo é irreversível?</h3>
                            <button data-modal-hide="popup-modal-{{ $item->id }}" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                                Não, cancelar
                            </button>
                            <form action="{{ route('admin.students.destroy', ['student' => $item]) }}" method="POST" id="form-destroy-{{ $item->id }}" class="inline-flex">
                                @csrf
                                @method('delete')
                                <button data-modal-hide="popup-modal-{{ $item->id }}" type="submit" class="text-white ms-3 bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Sim, excluir
                                </button>
                            </form>
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
