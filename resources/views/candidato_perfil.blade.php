<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <header class="bg-emerald-500 py-4">
        <!--NavBar-->
        @include('components.app.header')

    </header>

    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                <div class="col-span-4 sm:col-span-3">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex flex-col items-center">
                            <img src="{{ url('storage/' . $candidato->user->perfil) }}"
                                class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                            </img>
                            <h1 class="text-xl font-bold">{{ $candidato->user->name }}</h1>
                            <p class="text-gray-700">{{ $candidato->area }}</p>
                            <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                @if (auth()->user()->candidato && $candidato->id == auth()->user()->candidato->id)
                                    <a href="{{ route('candidato.edit', $candidato->id) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Editar
                                        Perfil</a>
                                @endif
                                <a href="{{ route('candidato.curriculo', $candidato->id) }}" target="_blank"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">Baixar
                                    Curriculo</a>
                            </div>
                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        @if (count($candidato->ferramentas) > 0)
                            <div class="flex flex-col">
                                <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Skills</span>
                                <ul>
                                    @foreach ($candidato->ferramentas as $ferramenta)
                                        <li class="mb-2">{{ $ferramenta->nome_f }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Contato</span>
                            <ul>
                                    <li>Email: {{ $candidato->user->email }}</li>
                                @foreach ($candidato->user->telefones as $telefone)
                                    <li>Celular: {{ $telefone->celular }}</li>
                                    <li>Fixo: {{ $telefone->fixo }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 sm:col-span-9">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-4">Sobre</h2>
                        <p class="text-gray-700">{{ $candidato->sobre }}
                        </p>


                        @if (count($candidato->experiencias) > 0)

                            <h2 class="text-xl font-bold mt-6 mb-4">Experiência</h2>
                            @foreach ($candidato->experiencias as $experiencia)
                                <div class="mb-6">
                                    <div class="flex justify-between flex-wrap gap-2 w-full">
                                        <span class="text-gray-700 font-bold">{{ $experiencia->funcao }}</span>
                                        <p>
                                            <span class="text-gray-700 mr-2">{{ $experiencia->empresa }}</span>
                                            {{-- <span class="text-gray-700">2017 - 2019</span> --}}
                                        </p>
                                    </div>
                                    <p class="mt-2">
                                        {{ $experiencia->descricao }}
                                    </p>
                                </div>
                            @endforeach
                        @endif


                        @if (count($candidato->formacaos) > 0)

                            <h2 class="text-xl font-bold mt-6 mb-4">Formação</h2>
                            @foreach ($candidato->formacaos as $formacao)
                                <div class="mb-6">
                                    <div class="flex justify-between flex-wrap gap-2 w-full">
                                        <span class="text-gray-700 font-bold">{{ $formacao->curso }}</span>
                                        <p>
                                            <span class="text-gray-700 mr-2">{{ $formacao->instituto }}</span>- <span
                                                class="text-gray-700">{{ $formacao->cursando }}</span>
                                        </p>
                                    </div>
                                    <p class="mt-2">
                                        {{ $formacao->descricao }}
                                    </p>
                                </div>
                            @endforeach
                        @endif

                        @if (count($candidato->habilidades) > 0)

                            <h2 class="text-xl font-bold mt-6 mb-4">Habilidades</h2>

                            <div class="mb-6">
                                <div class="flex justify-between flex-wrap gap-2 w-full">
                                    <ul>
                                        @foreach ($candidato->habilidades as $habilidade)
                                            <li class="mb-2">{{ $habilidade->nome_h }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                
                            </div>

                        @endif

                        @if (count($candidato->linguas) > 0)

                            <h2 class="text-xl font-bold mt-6 mb-4">Idiomas</h2>
                            @foreach ($candidato->linguas as $lingua)
                                <div class="mb-6">
                                    <div class="flex justify-between flex-wrap gap-2 w-full">
                                        <span class="text-gray-700 font-bold">{{ $lingua->nome_l }}</span>
                                        <p>
                                            <span class="text-gray-700 mr-2">{{ $lingua->nivel }}</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
