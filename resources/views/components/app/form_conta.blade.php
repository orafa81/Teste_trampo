<div class="-mx-3 md:flex mb-2">
    <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="file_input">Foto de
            Perfil</label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="file_input_help" id="file_input" name="perfil" type="file">
        <p class="text-grey-dark mt-1 text-xs italic" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
            800x400px).
        </p>
    </div>
    <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 " for="grid-password">
            Rua
        </label>
        <input
            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4 mb-3"
            id="grid-password" type="text" placeholder="Rua volta dos que não foram" name="rua"
            value="{{ $user->endereco->rua ?? old('rua') }}">
        <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like</p>
    </div>
</div>

<div class="-mx-3 md:flex mb-2">

    <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
            Numero
        </label>
        <input
            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
            id="" type="text" placeholder="124" name="numero"
            value="{{ $user->endereco->numero ?? old('numero') }}">
    </div>

    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
            Bairro
        </label>
        <input
            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
            id="grid-city" type="text" placeholder="Logo ali" name="bairro"
            value="{{ $user->endereco->bairro ?? old('bairro') }}">
    </div>

    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
            Complemento
        </label>
        <input
            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
            id="grid-city" type="text" placeholder="Perto de onde eu tava" name="complemento"
            value="{{ $user->endereco->complemento ?? old('complemento') }}">
    </div>

</div>
<div class="-mx-3 md:flex mb-2">

    <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
            Cep
        </label>
        <input
            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
            id="cep" type="text" placeholder="00000-000" name="cep"
            value="{{ $user->endereco->cidade->cep ?? old('cep') }}">
    </div>

    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
            Cidade
        </label>
        <input
            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
            id="grid-city" type="text" name="cidade" value="{{ $user->endereco->cidade->nome ?? old('cidade') }}">
    </div>

    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
            Estado
        </label>
        <input
            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
            id="grid-city" type="text" name="estado"
            value="{{ $user->endereco->cidade->estado->nome ?? old('estado') }}">
    </div>

</div>

<div class="-mx-3 md:flex mb-2">

    <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
            Celular
        </label>
        <input
            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
            id="celular" type="text" placeholder="(99) 99999-9999" name="celular"
            value="{{ $user->telefones[0]->celular ?? old('celular') }}">
    </div>

    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
            Telefone Fixo
        </label>
        <input
            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-500 rounded py-3 px-4"
            id="fixo" type="text" name="fixo" placeholder="9999-9999"
            value="{{ $user->telefones[0]->fixo ?? old('fixo') }}">
    </div>

</div>

<input
    class="w-40 inline-block pt-4 pr-5 pb-4 pl-5 text-xl font-medium text-center text-white bg-indigo-800 rounded-lg transition duration-200 hover:bg-indigo-600 ease"id="sub"
    type="submit" value="Enviar">
</div>
