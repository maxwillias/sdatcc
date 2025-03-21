<x-admin-layout>
    <div class="max-w-7xl mx-auto my-6 grid grid-cols-3 max-lg:grid-cols-2 max-sm:grid-cols-1 gap-4 max-xl:px-4">
        <div class="flex bg-blue-700 text-white rounded-md">
            <div class="bg-blue-800 pb-4 pt-6 px-4 rounded-l-md">
                <i class="fa-solid fa-file-lines text-3xl"></i>
            </div>
            <div class="py-2 px-4">
                <p class="text-sm">TCCs</p>
                <p>
                    <strong class="text-2xl leading-6">{{ $finalProjects->count() }}</strong>
                </p>
            </div>
        </div>
        <div class="flex bg-orange-400 text-white rounded-md">
            <div class="bg-orange-500 pb-4 pt-6 px-4 rounded-l-md">
                <i class="fa-solid fa-pause text-3xl"></i>
            </div>
            <div class="py-2 px-4">
                <p class="text-sm">Artigos</p>
                <p>
                    <strong class="text-2xl leading-6">{{ $articles->count() }}</strong>
                </p>
            </div>
        </div>
        <div class="flex bg-green-600 text-white rounded-md">
            <div class="bg-green-700 pb-4 pt-6 px-4 rounded-l-md">
                <i class="fa-solid fa-check text-3xl"></i>
            </div>
            <div class="py-2 px-4">
                <p class="text-sm">Cursos</p>
                <p>
                    <strong class="text-2xl leading-6">{{ $courses->count() }}</strong>
                </p>
            </div>
        </div>
    </div>

    <div class="flex max-w-7xl mx-auto gap-x-4 max-xl:px-4 max-lg:flex-wrap">
        <div class="mx-auto h-[300px] flex justify-center items-center my-1 w-1/2 max-lg:w-full bg-white shadow-md rounded">
            <canvas id="project-chart"></canvas>
        </div>
        <div class="mx-auto h-[300px] flex justify-center items-center my-1 w-1/2 max-lg:w-full bg-white shadow-md rounded">
            <canvas id="article-chart"></canvas>
        </div>
    </div>


    @push('last_js')
        @vite(['resources/js/charts.js'])
    @endpush
</x-admin-layout>
