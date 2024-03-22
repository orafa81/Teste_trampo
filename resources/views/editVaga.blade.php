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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!--Form da Empresa-->
    <form action="{{ route('vaga.update', $vaga->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class=" shadow-md rounded max-w-screen-xl mx-auto px-8 pt-6 pb-8 mb-4 flex flex-col my-2 bg-gray-100"
            id="empresa">
            <h2 class="text-xl">Cadastro de Vagas</h1>
                <div class="mt-6 -mx-3 md:flex mb-6">

                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-first-name">
                            Titulo da Vaga
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3"
                            id="grid-first-name" type="text" placeholder="Senior" name="titulo" value="{{ $vaga->titulo ?? old('titulo')}}">
                        <p class="text-red text-xs italic"></p>
                    </div>

                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-first-name">
                            Tipo de Candidatura
                        </label>
                        <select
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3"
                            id="grid-first-name" name="vinculo">
                            <option value="PJ">PJ</option>
                            <option value="CLT">CLT</option>
                            <option value="ETG">Estágio</option>
                        </select>
                        <p class="text-red text-xs italic">Please fill out this field.</p>
                    </div>
                </div>

                <div class="mt-6 -mx-3 md:flex mb-6">

                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-password">
                            Área da Vaga
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3"
                            id="grid-first-name" type="text" placeholder="Senior" name="area" value="{{ $vaga->area ?? old('area')}}">
                        <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like</p>
                    </div>

                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-first-name">
                            Hierarquia do cargo
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3"
                            id="grid-first-name" type="text" placeholder="Senior" name="hierarquia" value="{{ $vaga->hierarquia ?? old('hierarquia')}}">
                        <p class="text-red text-xs italic"></p>
                    </div>

                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-first-name">
                            Valor Salarial
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3"
                            id="grid-first-name" type="text" placeholder="Senior" name="salario" value="{{ $vaga->salario ?? old('salario')}}">
                        <p class="text-red text-xs italic"></p>
                    </div>
                </div>

                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full px-3 break-all">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="content">
                            Sobre da vaga
                        </label>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm bg-grey-lighter border-gray-500  rounded border "
                            placeholder="Taca qualquer coisa ai" name="descricao">{{ $vaga->descricao ?? old('descricao') }}</textarea>
                        <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like</p>
                    </div>
                </div>

                <h2 class="text-xl mb-6">Responsabilidades</h2>
                <div class="rounded border-2 flex py-5 px-5 flex-col-reverse mb-6" id="responsabilidade">
                    {{-- Formação do Candidato --}}
                    <div class="-mx-3 md:flex">
                        <div class="md:w-full px-3" id="">
                            <p class="hover:cursor-pointer text-indigo-800 text-sm" id="btnresponsabilidades">Adiciona
                                +</p>
                        </div>
                    </div>
                    @if (isset($vaga->responsabilidades) && count($vaga->responsabilidades) > 0)
                        @foreach ($vaga->responsabilidades as $responsabilidade)
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-full px-3">
                                    <label
                                        class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 "
                                        for="grid-password">
                                        Responsabilidade
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3"
                                        id="grid-password" type="text" placeholder="Atributo"
                                        name="responsabilidadeExists[{{ $responsabilidade->id }}][]" value="{{ $responsabilidade->titulo }}">
                                    <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <h2 class="text-xl mb-6">Requisitos</h2>
                <div class="rounded border-2 flex py-5 px-5 flex-col-reverse mb-6" id="requisito">
                    {{-- Formação do Candidato --}}
                    <div class="-mx-3 md:flex">
                        <div class="md:w-full px-3" id="">
                            <p class="hover:cursor-pointer text-indigo-800 text-sm" id="btnRequisitos">Adiciona
                                +</p>
                        </div>
                    </div>
                    @if (isset($vaga->requisitos) && count($vaga->requisitos) > 0)
                        @foreach ($vaga->requisitos as $requisito)
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-full px-3">
                                    <label
                                        class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 "
                                        for="grid-password">
                                        Requisito
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3"
                                        id="grid-password" type="text" placeholder="Atributo"
                                        name="requisitoExists[{{ $requisito->id }}][]" value="{{ $requisito->titulo }}">
                                    <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <h2 class="text-xl mb-6">Banefícos</h2>
                <div class="rounded border-2 flex py-5 px-5 flex-col-reverse mb-6" id="beneficio">
                    {{-- Formação do Candidato --}}
                    <div class="-mx-3 md:flex">
                        <div class="md:w-full px-3" id="">
                            <p class="hover:cursor-pointer text-indigo-800 text-sm" id="btnBaneficios">Adiciona
                                +</p>
                        </div>
                    </div>
                    @if (isset($vaga->beneficios) && count($vaga->beneficios) > 0)
                        @foreach ($vaga->beneficios as $beneficio)
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-full px-3">
                                    <label
                                        class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 "
                                        for="grid-password">
                                        Benefícios
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3"
                                        id="grid-password" type="text" placeholder="beneficio"
                                        name="beneficioExists[{{ $beneficio->id }}][]" value="{{ $beneficio->titulo }}">
                                    <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                
                <input
                    class="w-40 inline-block pt-4 pr-5 pb-4 pl-5 text-xl font-medium text-center text-white bg-indigo-800
                rounded-lg transition duration-200 hover:bg-indigo-600 ease"
                    type="submit" value="Enviar">
            </h2>
        </div>
    </form>

</body>

</html>
