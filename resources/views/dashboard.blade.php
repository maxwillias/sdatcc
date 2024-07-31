<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden p-4 shadow-sm sm:rounded-lg border-solid border-2 border-[#5ACC58]">
                <b>Trabalho em concluído</b>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-[#CCCFD4] h-[100px] border-b dark:bg-gray-800 dark:border-gray-700 text-gray-900">
                                <th scope="row"
                                    class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                    Sistema de Gerenciamento de Trabalhos de Conclusão de Curso do IFNMG - Campus
                                    Januária.
                                </th>
                                <td class="px-6 py-4">
                                    Willias Júnior Farias de Souza
                                </td>
                                <td class="px-6 py-4">
                                    Raphael Hoed Magalhães
                                </td>
                                <td class="px-6 py-4">
                                    5 de Outubro de 2024
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden p-4 shadow-sm sm:rounded-lg border-solid border-2 border-[#5ACC58]">
                <b>Trabalho em concluído</b>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-[#CCCFD4] h-[100px] border-b dark:bg-gray-800 dark:border-gray-700 text-gray-900">
                                <th scope="row"
                                    class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                    Indisciplina 2D - Um jogo educacional voltado para tratar a indisciplina nas escolas.
                                </th>
                                <td class="px-6 py-4">
                                    Willias Renan Silva
                                </td>
                                <td class="px-6 py-4">
                                    Adriano Antunes Prates
                                </td>
                                <td class="px-6 py-4">
                                    13 de Julho de 2025
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
