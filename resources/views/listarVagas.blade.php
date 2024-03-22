<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/filtro.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <header class="bg-emerald-500 py-4">
        <!--NavBar-->
        @include('components.app.header')


        <div id="search-bar"
            class="w-full  mb-4 max-w-screen-xl flex flex-wrap items-center mx-auto  bg-white rounded-md shadow-lg z-10">
            <form class="flex w-full items-center justify-center p-2 form" id="form">
                <input type="text" name="titulo" placeholder="Pesquisar aqui"
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

                <div class="w-full px-3 lg:w-3/4" id="data">
                    <div class="px-3 mb-4">
                        <div class="items-center justify-end hidden px-3 py-2 bg-gray-100 md:flex dark:bg-gray-900 ">

                            <div class="flex items-center justify-between">
                                <div class="pr-3 border-r border-gray-300">
                                    <input type="checkbox" id="ordenacao" 
                                        class="" value="1">
                                    <span >Mais Recentes</span>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                    @foreach ($vagas as $vaga)
                        <a href="{{ route('vaga.show', $vaga->id, $vaga->empresa->id) }}"
                            class="relative flex w-full mb-4 flex-col p-5 rounded-xl bg-white bg-clip-border text-gray-700 overflow-hidden shadow transition hover:shadow-lg hover:scale-y-105 sm:mx-auto">
                            <div
                                class="relative flex items-center gap-4 py-5 mx-0 mt-4 overflow-hidden text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
                                <img src=" {{ url('storage/'. $vaga->empresa->user->perfil) }} " alt="Tania Andrew"
                                    class="relative inline-block h-32 w-32 !rounded-full  object-cover object-center" />
                                <div class="flex w-full flex-col gap-0.5">
                                    <p
                                        class="block font-sans text-base antialiased font-light leading-relaxed text-blue-gray-900">
                                        {{$vaga->empresa->user->name }}
                                    </p>
                                    <div class="flex items-center justify-between">

                                        <h5
                                            class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                            {{ $vaga->titulo }}
                                        </h5>
                                    </div>

                                    <p
                                        class="block font-sans text-base antialiased font-light leading-relaxed text-blue-gray-900">
                                        {{ substr( $vaga->descricao , 0, 150) . (strlen($vaga->descricao) > 100 ? ' ...' : '') }}
                                    </p>

                                    <div
                                        class="flex font-medium text-gray-500 gap-2 font-sans text-base antialiased leading-relaxed text-blue-gray-900">
                                        <div class="">Tipo de trabalho:<span
                                                class="rounded-full bg-green-100 px-2 py-0.5 text-green-900"> {{ $vaga->vinculo->nome }}
                                            </span>
                                        </div>
                                        <div class="">Salário:<span
                                                class=" rounded-full bg-violet-100 px-2 py-0.5 text-violet-900"> {{ $vaga->salario }} </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-0 mb-6">

                            </div>
                        </a>
                    @endforeach

                    <div class="mx-auto paginacao">
                
                        {{ $vagas->render() }} 
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{--  --}}

</body>

</html>
