<!-- form do candidato -->
<div class=" shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 bg-gray-100" id="candidato">
    <h2 class="text-xl mb-6">Mais Informações do Candidato</h2>

    {{-- <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full px-3 break-all">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="file_input">Foto de Perfil</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help" id="file_input" name="perfil" type="file">
            <p class="text-grey-dark mt-1 text-xs italic" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                800x400px).
            </p>
        </div>
    </div>
 --}}


    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full h-40 px-3 break-all">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                Sobre Você
            </label>
            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm bg-grey-lighter border-gray-500  rounded border "
                placeholder="Taca qualquer coisa ai" name="sobre">{{ $candidato->sobre ?? old('sobre') }}</textarea>
            <p class="text-grey-dark mt-1 text-xs italic">Make it as long and as crazy as you'd like</p>
        </div>
    </div>


    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full px-3" id="">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 " for="grid-password">
                area de atuação
            </label>
            <input
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
                for="grid-password" type="text" placeholder="Analise e Desenvolvimento de Sistemas" name="area"
                value="">
            <p class="text-grey-dark mt-1 text-xs italic">Make it as long and as crazy as you'd like</p>
        </div>
    </div>


    <h2 class="text-xl mb-6">Formações</h2>
    <div class="rounded border-2 flex py-5 px-5 flex-col-reverse mb-6" id="formacao">

        {{-- Formação do Candidato --}}
        <div class="-mx-3 md:flex">
            <div class="md:w-full px-3" id="">
                <p class="hover:cursor-pointer text-indigo-800 text-sm" id="btnFormacao">Adiciona formação +
                </p>
            </div>
        </div>
        @if (isset($candidato->formacaos) && count($candidato->formacaos) > 0)
            @foreach ($candidato->formacaos as $formacao)
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 "
                            for="grid-password">
                            Instituição
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3"
                            id="grid-password" type="text" placeholder="Faculdade"
                            name="formacaoExists[{{ $formacao->id }}][]" value="{{ $formacao->instituto ?? '' }}">
                        <p class="text-grey-dark mt-1 text-xs italic">Make it as long and as crazy as you'd like
                        </p>
                    </div>
                </div>

                <div class="-mx-3 md:flex mb-2">

                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-zip">
                            Nome do Curso
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
                            id="" type="text" placeholder="Analise e Desenvolvimento de Sistemas"
                            name="formacaoExists[{{ $formacao->id }}][]" value="{{ $formacao->curso }}">
                    </div>

                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-state">
                            Tipo de Fomação
                        </label>
                        <div class="flex flex-row-reverse items-center">
                            <select
                                class="block appearance-none w-full bg-gray-300 border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="dropdown" name="formacaoExists[{{ $formacao->id }}][]">
                                <option value="s">Superior</option>
                                <option value="t">Tecnico</option>
                            </select>
                            <div
                                class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-state">
                            Atualmente
                        </label>
                        <div class="flex flex-row-reverse items-center">
                            <select
                                class="block appearance-none w-full bg-gray-300 border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="dropdown" name="formacaoExists[{{ $formacao->id }}][]">
                                <option value="c">Completo</option>
                                <option value="n">Incompleto</option>
                                <option value="s">Cursando</option>
                            </select>
                            <div
                                class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        @endif

    </div>
    </h2>

    <h2 class="text-xl mb-6">Experiencias Profissionais</h2>
    <div class="rounded border-2 flex py-5 px-5 flex-col-reverse mb-6" id="experiencia">
        {{-- Formação do Candidato --}}
        <div class="-mx-3 md:flex">
            <div class="md:w-full px-3" id="">
                <p class="hover:cursor-pointer text-indigo-800 text-sm" id="btnExperiencia">Adiciona
                    experiencias +</p>
            </div>
        </div>
        @if (isset($candidato->experiencias) && count($candidato->experiencias) > 0)
            @foreach ($candidato->experiencias as $experiencia)
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full h-40 px-3 break-all">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-password">
                            Descrição
                        </label>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm bg-grey-lighter border-gray-500  rounded border "
                            placeholder="Taca qualquer coisa ai" name="experienciaExists[{{ $experiencia->id }}][]">{{ $experiencia->descricao ?? '' }}</textarea>
                        <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd
                            like</p>
                    </div>
                </div>

                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full h-40 px-3 break-all">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-zip">
                            Função na empresa
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
                            id="" type="text" placeholder="Analise e Desenvolvimento de Sistemas"
                            name="experienciaExists[{{ $experiencia->id }}][]"
                            value="{{ $experiencia->funcao ?? '' }}">
                    </div>
                </div>

                <div class="-mx-3 md:flex mb-2">
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-zip">
                            Nome da Empresa
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
                            id="" type="text" placeholder="Analise e Desenvolvimento de Sistemas"
                            name="experienciaExists[{{ $experiencia->id }}][]"
                            value="{{ $experiencia->empresa ?? '' }}">
                    </div>

                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-zip">
                            Trabalha aqui atualmente ?
                        </label>
                        <select
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
                            id="" name="experienciaExists[{{ $experiencia->id }}][]">
                            <option value="n">Não</option>
                            <option value="s">Sim</option>
                        </select>
                    </div>
                </div>
            @endforeach

        @endif

    </div>
    </h2>

    <h2 class="text-xl mb-6">Ferramentas Utilizadas</h2>
    <div class="rounded border-2 flex py-5 px-5 flex-col-reverse mb-6" id="ferramenta">
        {{-- Formação do Candidato --}}
        <div class="-mx-3 md:flex">
            <div class="md:w-full px-3" id="">
                <p class="hover:cursor-pointer text-indigo-800 text-sm" id="btnFerramenta">Adiciona
                    ferramentas +</p>
            </div>
        </div>
        @if (isset($candidato->ferramentas) && count($candidato->ferramentas) > 0)
            @foreach ($candidato->ferramentas as $ferramenta)
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full px-3 break-all">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-zip">
                            Nome da ferramenta
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
                            id="" type="text" placeholder="Analise e Desenvolvimento de Sistemas"
                            name="ferramentasExists[{{ $ferramenta->id }}][]"
                            value="{{ $ferramenta->nome_f ?? '' }}">
                    </div>
                </div>
            @endforeach

        @endif

    </div>
    </h2>


    <h2 class="text-xl mb-6">Habilidades</h2>
    <div class="rounded border-2 flex py-5 px-5 flex-col-reverse mb-6" id="habilidade">
        {{-- Formação do Candidato --}}
        <div class="-mx-3 md:flex">
            <div class="md:w-full px-3" id="">
                <p class="hover:cursor-pointer text-indigo-800 text-sm" id="btnHabilidade">Adiciona
                    habilidades +</p>
            </div>
        </div>
        @if (isset($candidato->habilidades) && count($candidato->habilidades) > 0)
            @foreach ($candidato->habilidades as $habilidade)
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full px-3 break-all">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-zip">
                            Resuma suas habilidade
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
                            id="" type="text" placeholder="Analise e Desenvolvimento de Sistemas"
                            name="habilidadesExists[{{ $habilidade->id }}][]"
                            value="{{ $habilidade->nome_h ?? '' }}">
                    </div>
                </div>
            @endforeach

        @endif

    </div>
    </h2>


    <h2 class="text-xl mb-6">Linguagens conheciadas</h2>
    <div class="rounded border-2 flex py-5 px-5 flex-col-reverse mb-6" id="lingua">
        {{-- Formação do Candidato --}}
        <div class="-mx-3 md:flex">
            <div class="md:w-full px-3" id="">
                <p class="hover:cursor-pointer text-indigo-800 text-sm" id="btnLingua">Adiciona
                    Lingua +</p>
            </div>
        </div>
        @if (isset($candidato->linguas) && count($candidato->linguas) > 0)
            @foreach ($candidato->linguas as $lingua)
                <div class="-mx-3 md:flex mb-2">
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-zip">
                            Nome do indioma
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
                            id="" type="text" placeholder="Analise e Desenvolvimento de Sistemas"
                            name="linguasExists[{{ $lingua->id }}][]" value="{{ $lingua->nome_l ?? '' }}">
                    </div>

                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-zip">
                            Nivel
                        </label>
                        <select
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
                            id="" name="habilidadesExists[{{ $lingua->id }}][]">
                            <option value="Básico">Básico</option>
                            <option value="Intermediário">Intermediário</option>
                            <option value="Avançado">Avançado</option>
                            <option value="Fluente">Fluente</option>
                        </select>
                    </div>
                </div>
            @endforeach

        @endif

    </div>
    </h2>


    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full px-3" id="">
            <input
                class="w-40 inline-block pt-4 pr-5 pb-4 pl-5 text-xl  font-medium text-center text-white bg-indigo-800
                rounded-lg transition duration-200 hover:bg-indigo-600 ease"
                id="sub" type="submit" value="Enviar">
        </div>
    </div>
</div>
