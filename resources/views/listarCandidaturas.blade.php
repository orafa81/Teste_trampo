<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body>

    <header class="bg-emerald-500 py-4">
        <!--NavBar-->
        @include('components.app.header')


        <div id="search-bar"
            class="w-full  mb-4 max-w-screen-xl flex flex-wrap items-center mx-auto  bg-white rounded-md shadow-lg z-10">
            <form class="flex w-full items-center justify-center p-2">
                <input type="text" placeholder="Pesquisar aqui"
                    class="w-full rounded-md px-2 py-3 focus:outline-none focus:ring-2 focus:ring-gray-600 border-transparent">
                <button type="submit" class=" text-white rounded-md px-4 py-3 ml-2 ">
                    <svg class="w-6 h-6 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
            </form>
        </div>



    </header>

    <section class="py-20 bg-gray-50 font-poppins ">
        <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
            <div class="flex  mb-24 -mx-3">
                <div class=" lg:w-1/4 lg:block">
                    <div class="p-4 mb-5 bg-white border border-gray-200 dark:border-gray-900 dark:bg-gray-900">
                        <h2 class="text-2xl font-bold dark:text-gray-400"> Tipo de Contrato</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                        <ul>
                            <li class="mb-4">
                                <label for="" class="flex items-center dark:text-gray-400 ">
                                    <input type="checkbox" class="w-4 h-4 mr-2">
                                    <span class="text-lg">CLT</span>
                                </label>
                            </li>
                            <li class="mb-4">
                                <label for="" class="flex items-center dark:text-gray-400 ">
                                    <input type="checkbox" class="w-4 h-4 mr-2 ">
                                    <span class="text-lg">PJ</span>
                                </label>
                            </li>
                            <li class="mb-4">
                                <label for="" class="flex items-center dark:text-gray-400 ">
                                    <input type="checkbox" class="w-4 h-4 mr-2 ">
                                    <span class="text-lg">Estágio</span>
                                </label>
                            </li>
                        </ul>
                        <a href="#"
                            class="text-base font-medium text-blue-500 hover:underline dark:text-blue-400">View
                            More</a>
                    </div>
                    <div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
                        <h2 class="text-2xl font-bold dark:text-gray-400">Local de trabalho</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                        <ul>
                            <li class="mb-4">
                                <label for="" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">Presencial</span>
                                </label>
                            </li>
                            <li class="mb-4">
                                <label for="" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">Remoto</span>
                                </label>
                            </li>
                            <li class="mb-4">
                                <label for="" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">Híbrido</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
                        <h2 class="text-2xl font-bold dark:text-gray-400">Áreas</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                        <ul>
                            <li class="mb-4">
                                <label for="" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">Informática</span>
                                </label>
                            </li>
                            <li class="mb-4">
                                <label for="" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">Administração</span>
                                </label>
                            </li>
                            <li class="mb-4">
                                <label for="" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">Marketing</span>
                                </label>
                            </li>
                            <li class="mb-4">
                                <label for="" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">Estágio</span>
                                </label>
                            </li>
                        </ul>
                        <a href="#"
                            class="text-base font-medium text-blue-500 hover:underline dark:text-blue-400">View
                            More</a>
                    </div>
                    <div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
                        <h2 class="text-2xl font-bold dark:text-gray-400">Price</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                        <div>
                            <input type="range"
                                class="w-full h-1 mb-4 bg-blue-100 rounded appearance-none cursor-pointer"
                                max="100" value="50">
                            <div class="flex justify-between ">
                                <span class="inline-block text-lg font-bold text-blue-400 ">$1</span>
                                <span class="inline-block text-lg font-bold text-blue-400 ">$500</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full px-3 lg:w-3/4">
                    <div class="px-3 mb-4">
                        <div class="items-center justify-end hidden px-3 py-2 bg-gray-100 md:flex dark:bg-gray-900 ">

                            <div class="flex items-center justify-between">
                                <div class="pr-3 border-r border-gray-300">
                                    <select name="" id=""
                                        class="block w-44 text-base bg-gray-100 cursor-pointer dark:text-gray-400 dark:bg-gray-900">
                                        <option value="">Mais Relevante</option>
                                        <option value="">Mais Recentes</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    @foreach ($candidaturas as $candidatura)
                        <a href="{{ route('candidato.perfil', $candidatura->candidato->id) }}"
                            class="relative flex w-full mb-4 flex-col p-5 rounded-xl bg-white bg-clip-border text-gray-700 overflow-hidden shadow transition hover:shadow-lg hover:scale-y-105 sm:mx-auto">
                            <div
                                class="relative flex items-center gap-4 py-5 mx-0 mt-4 overflow-hidden text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
                                <img src=" {{ url('storage/'. $candidatura->candidato->user->perfil) }} " alt="Tania Andrew"
                                    class="relative inline-block h-32 w-32 !rounded-full  object-cover object-center" />
                                <div class="flex w-full flex-col gap-0.5">
                                    <p
                                        class="block font-sans text-base antialiased font-light leading-relaxed text-blue-gray-900">
                                        {{$candidatura->candidato->user->name }}
                                    </p>
                                    <div class="flex items-center justify-between">

                                        <h5
                                            class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                            {{ $candidatura->candidato->area }}
                                        </h5>
                                    </div>

                                    <p
                                        class="block font-sans text-base antialiased font-light leading-relaxed text-blue-gray-900">
                                        {{ substr( $candidatura->candidato->sobre , 0, 150) . (strlen($candidatura->candidato->sobre) > 100 ? ' ...' : '') }}
                                    </p>

                                    
                                </div>
                            </div>
                            <div class="p-0 mb-6">

                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </section>



    {{--  --}}

</body>

</html>
