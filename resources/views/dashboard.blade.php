<x-admin-layout>
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

        <x-final-project titulo="Site para doação de Jacarézinhos" status="em Andamento" orientador="Raphael Magalhães"
            data-publicacao="5 de Outubro 2023" aluno="Willias Júnior Farias de Souza" />
        <x-final-project titulo="Site para doação de doguinhos" status="Concluído" orientador="Joselixo"
            data-publicacao="25 de Maio 2028" aluno="Willias Renan" />

    </div>

</x-admin-layout>
