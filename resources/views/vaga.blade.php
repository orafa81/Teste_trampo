<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vaga</title>
    @vite('resources/css/app.css')

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

    <div
        class="relative flex w-full mx-auto max-w-screen-xl mb-4 flex-col p-5 text-gray-700 overflow-hidden sm:mx-auto">
        <div
            class="relative flex items-center gap-4 py-5 mx-0 mt-4 overflow-hidden text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
            <img src=" {{ url('storage/' . $vaga->empresa->user->perfil) }} " alt="Tania Andrew"
                class="relative inline-block h-40 w-40 !rounded-full  object-cover object-center" />
            <div class="flex w-full flex-col gap-1">
                <p class="block font-sans text-base antialiased font-light leading-relaxed text-blue-gray-900">
                    {{ $vaga->empresa->user->name }}
                </p>
                <div class="flex items-center justify-between">

                    <h5 class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal ">
                        {{ $vaga->titulo }}
                    </h5>
                </div>

                <div
                    class="flex font-medium text-gray-500 gap-2 font-sans text-base antialiased leading-relaxed text-blue-gray-900">
                    <div class="flex flex-nowrap">
                        <svg class="w-6 h-6 text-slate-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 3v4c0 .6-.4 1-1 1H5m4 8h6m-6-4h6m4-8v16c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V8c0-.4.1-.6.3-.8l4-4 .6-.2H18c.6 0 1 .4 1 1Z" />
                        </svg>
                        <span class="px-2 py-0.5"> {{ $vaga->vinculo->nome }}
                        </span>
                    </div>
                    <div class="flex flex-nowrap">
                        <svg class="w-6 h-6 text-slate-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 17.3a5 5 0 0 0 2.6 1.7c2.2.6 4.5-.5 5-2.3.4-2-1.3-4-3.6-4.5-2.3-.6-4-2.7-3.5-4.5.5-1.9 2.7-3 5-2.3 1 .2 1.8.8 2.5 1.6m-3.9 12v2m0-18v2.2" />
                        </svg>
                        <span class="px-2 py-0.5">
                            {{ $vaga->salario }}
                        </span>
                    </div>
                </div>

                <div
                    class="flex font-medium text-gray-500 gap-2 font-sans text-base antialiased leading-relaxed text-blue-gray-900">
                    <div class="flex flex-nowrap">
                        <svg class="w-6 h-6 text-slate-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M4.4 7.7c2 .5 2.4 2.8 3.2 3.8 1 1.4 2 1.3 3.2 2.7 1.8 2.3 1.3 5.7 1.3 6.7M20 15h-1a4 4 0 0 0-4 4v1M8.6 4c0 .8.1 1.9 1.5 2.6 1.4.7 3 .3 3 2.3 0 .3 0 2 1.9 2 2 0 2-1.7 2-2 0-.6.5-.9 1.2-.9H20m1 4a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class=" px-2 py-0.5"> Remoto: Não
                        </span>
                    </div>

                </div>
            </div>

            @can('isEmpresa')
                <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                    <a href="{{ route('vaga.candidaturas', $vaga->id) }}"
                        class="text-white py-2 px-4 uppercase rounded bg-violet-900 border hover:border-violet-900 hover:text-violet-900 hover:bg-white shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                        Candidatos
                    </a>
                    <a href="{{ route('vaga.edit', $vaga->id) }}"
                        class="text-white py-2 px-4 uppercase rounded bg-violet-900 border hover:border-violet-900 hover:text-violet-900 hover:bg-white shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                        Editar
                    </a>
                    <form action="{{ route('vaga.destroy', $vaga->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button
                            class=" py-2 px-4 uppercase rounded border border-violet-900 text-violet-900 bg-white hover:bg-violet-900 hover:text-white shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                            Excluir</button>
                    </form>
                </div>
            @elsecan('isCandidato')
                @can('candidato_candidatura', $vaga)
                    <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                        <p class=" py-2 px-4 uppercase text-violet-900 font-medium ">
                            Você ja se candidato</p>
                    </div>
                @else
                    <form action="{{ route('candidatura.store') }}" method="post">
                        @csrf
                        <input type="text" value="{{ $vaga->id }}" name="vaga_id" hidden>
                        <button
                            class=" py-2 px-4 uppercase rounded border border-violet-900 text-violet-900 bg-white hover:bg-violet-900 hover:text-white shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                            Candidatar-se</button>
                    </form>
                @endcan
            @endcan
            @guest
                <form action="{{ route('candidatura.store') }}" method="post">
                    @csrf
                    <input type="text" value="{{ $vaga->id }}" name="vaga_id" hidden>
                    <button
                        class=" py-2 px-4 uppercase rounded border border-violet-900 text-violet-900 bg-white hover:bg-violet-900 hover:text-white shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                        Candidatar-se</button>
                </form>
            @endguest
        </div>
    </div>



    <div class="text-sm font-medium text-center mx-auto max-w-screen-xl mb-8 text-gray-500 border-b border-gray-200 ">
        <ul class="flex flex-wrap -mb-px">
            <li class="me-2">
                <a href="#"
                    class="inline-block p-4 text-violet-600 border-b-2 border-violet-600 rounded-t-lg active "
                    aria-current="page">Descrição</a>
            </li>

            @if ($vaga->requisitos && count($vaga->requisitos) > 0)
                <li class="me-2">
                    <a href="#"
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 ">Requisitos</a>
                </li>
            @endif

            @if ($vaga->beneficios && count($vaga->beneficios) > 0)
                <li class="me-2">
                    <a href="#"
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 ">Benefícios</a>
                </li>
            @endif


            <li class="me-2">
                <a href="#"
                    class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 ">Empresa</a>
            </li>
        </ul>
    </div>

    <div class="mx-auto max-w-screen-xl text-black ">
        <div class="flex flex-col -mb-px">
            <h2 class="font-medium text-xl mb-8">Descrição</h3>
                <p class="mb-8">
                    {{ $vaga->descricao }}
                </p>

                @if ($vaga->responsabilidades && count($vaga->responsabilidades) > 0)

                    <ul class="list-disc pl-4 mb-8 ml-7">
                        @foreach ($vaga->responsabilidades as $responsabilidade)
                            <li class="mb-2">
                                {{ $responsabilidade->titulo }}
                            </li>
                        @endforeach
                    </ul>

                @endif

                @if ($vaga->requisitos && count($vaga->requisitos) > 0)
                    <h2 class="font-medium text-xl mb-8">Requisitos</h3>



                        <ul class="list-disc pl-4 mb-8 ml-7">
                            @foreach ($vaga->requisitos as $requisito)
                                <li class="mb-2">
                                    {{ $requisito->titulo }}
                                </li>
                            @endforeach
                        </ul>

                @endif

                @if ($vaga->beneficios && count($vaga->beneficios) > 0)

                    <h2 class="font-medium text-xl mb-8">Benefícios</h3>



                        <ul class="list-disc pl-4 mb-8 ml-7">
                            @foreach ($vaga->beneficios as $beneficio)
                                <li class="mb-2">
                                    {{ $beneficio->titulo }}
                                </li>
                            @endforeach
                        </ul>

                @endif

                <h2 class="font-medium text-xl mb-8">Sobre a empresa</h3>
                    <p class="mb-8">
                        {{ $vaga->empresa->descricao }}
                    </p>
        </div>


    </div>



</body>

</html>
