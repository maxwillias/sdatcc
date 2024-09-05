<x-user-layout>
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
                                    <th scope="col" class="px-6 py-3"></th>
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
                                        {{ $item->data_publicacao }}
                                    </td>
                                    <td>
                                        <a href="{{ route('user.final-projects.show', ['finalProject', $item]) }}"> Clica</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            {{ $items->appends(request()->input())->links() }}
        </div>
    </div>
</x-user-layout>
