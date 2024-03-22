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

    <header class="bg-green-500">
        <!--NavBar-->
        @include('components.app.header')

        <hr class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
        <!-- component -->
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">

            <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 items-center md:gap-20 bg-gradient-to-t ">
                <div class="content">

                    <p class="text-[40px] lg:text-[45px] xl:text-[55px] font-bold leading-tight mt-5 sm:mt-0 ">
                        Conquiste seu futuro <br />
                        Com o Trampo já!
                    </p>
                    <p class="text-white text-[10px] lg:text-[20px] xl:text-[25px] mt-5 md:text-md ">
                        Explore oportunidades incríveis e encontre o emprego dos seus sonhos.
                        Seu caminho para o sucesso começa aqui. Vamos juntos construir o seu futuro profissional!
                    </p>
                    <div class="flex gap-4 mt-10">

                        <button
                            class="font-medium text-[16px] flex items-center px-5 py-3 md:py-4 md:px-8 rounded-xl capitalize bg-gradient-to-r from-violet-600 to-violet-900 hover:from-indigo-500 hover:to-purple-600  relative gap-2 transition duration-300 hover:scale-105 text-white shadow-glass ">Fale
                            Conosco
                            <span
                                class="animate-ping absolute right-0 top-0 w-3 h-3  rounded-full bg-gradient-to-r from-orange -400 to-orange-700 "></span>
                        </button>
                        <RiFacebookFill class="" />
                        <SiBehance />
                    </div>

                </div>
                <div class="relative sm:mt-0 mt-10 px-6 sm:px-0">

                    <img class="w-[600px] animate__animated animate__fadeInRight animate__delay-.5s"
                        src="{{ asset('imagens/PessoaHeader.png') }}" alt="" />
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="w-full py-8 bg-gray-50">

            <h1
                class="text-[10px] lg:text-[20px] xl:text-[30px] max-w-screen-xl mb-8 flex flex-wrap items-center justify-between mx-auto">
                Nossos profissionais</h1>

            <div class=" max-w-screen-xl flex flex-nowrap items-center gap-4 justify-start mx-auto">

                @foreach ($candidatos as $candidato)
                    <a href="{{ route('candidato.perfil', $candidato->id) }}"
                        class="relative border text-gray-700 bg-clip-border rounded-xl transition duration-300 hover:scale-105 bg-white shadow-md flex w-full max-w-sm flex-col t  p-5 ">
                        <div
                            class="relative flex items-center gap-4 pt-0 pb-8 mx-0 mt-4 overflow-hidden text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
                            <img src="{{ url('storage/' . $candidato->user->perfil) }}" alt="Tania Andrew"
                                class="relative inline-block h-24 w-24 !rounded-full  shrink-0 object-cover object-center" />
                            <div class="flex w-full flex-col gap-0.5">
                                <div class="flex items-center justify-between">
                                    <h5
                                        class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                        {{ $candidato->user->name }}
                                    </h5>

                                </div>
                                <p
                                    class="block font-sans text-base antialiased font-medium leading-relaxed text-gray-600">
                                    {{ $candidato->area }}
                                </p>
                            </div>
                        </div>
                        <div class="">

                            <p class="block text-base antialiased leading-relaxed text-inherit">
                                {{ substr($candidato->sobre, 0, 250) }}
                            </p>


                            <p
                                class="block mt-4 text-violet-900 antialiased font-medium leading-relaxed text-blue-gray-900">
                                Mais detalhes
                            </p>
                        </div>
                    </a>
                @endforeach



            </div>

            <a href="{{ route('listarVagas') }}" class=" ">
                <p
                    class=" text-base text-center bg-violet-900 text-white hover:text-violet-900 hover:bg-gray-50 hover:border-violet-900 transition-all hover:scale-105 hover:ease-in md:mt-8 p-6 py-3 border w-72 rounded-full mx-auto">
                    Veja mais candidatos!
                </p>
            </a>
        </div>

        <!--Informação do curriculo-->
        <div class="w-full py-8 ">
            <div class="grid grid-cols-2 gap-6 max-w-screen-xl mx-auto">

                <div class="">
                    <h1 class="text-[10px] lg:text-[20px] xl:text-[30px]  flex flex-wrap items-center justify-between ">
                        Comece sua jornada criando um currículo
                        de maneira simplificada e gratuita em nosso site</h1>
                </div>

                <div class="row-span-3 col-start-1 row-start-2">
                    <img class="w-[600px] animate__animated animate__fadeInRight animate__delay-.5s"
                        src="{{ asset('imagens/infoCurriculo.png') }}" alt="" />
                    <div class=" -mt-40 ml-96 ">

                        <button
                            class="font-medium text-[16px] flex items-center px-5 py-3 md:py-4 md:px-8 rounded-xl  bg-gradient-to-r from-violet-600 to-violet-900 hover:from-indigo-500 hover:to-purple-600  relative gap-2 transition duration-300 hover:scale-105 text-white shadow-glass ">
                            Crie o seu aqui
                            <span
                                class="animate-ping absolute right-0 top-0 w-3 h-3  rounded-full bg-gradient-to-r from-orange -400 to-orange-700 "></span>
                        </button>
                        <RiFacebookFill class="" />
                        <SiBehance />
                    </div>
                </div>
                <div class="row-span-2 col-start-2 row-start-1">


                    <div class="flex gap-2">
                        <div class="flex bg-green-500 rounded-full justify-center items-center p-1 w-10 h-10">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </div>
                        <p class="text-[10px] lg:text-[20px] xl:text-[30px] font-bold leading-tight mt-5 sm:mt-0 ">
                            Informações Pessoais
                        </p>
                    </div>
                    <p class="text-gray-500 text-[10px] lg:text-[20px] xl:text-[25px] mt-5 md:text-md mb-4">
                        Adicione um objetivo profissional claro e conciso que demonstre seus objetivos de carreira e
                        como você pretende contribuir para a empresa.
                        Destaque informações adicionais relevantes, como a permissão de trabalho (se aplicável) e sua
                        disposição para se mudar.
                    </p>

                    <div class="flex gap-2">
                        <div class="flex bg-green-500 rounded-full justify-center items-center p-1 w-10 h-10">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M10 2a3 3 0 0 0-3 3v1H5a3 3 0 0 0-3 3v2.4l1.4.7a7.7 7.7 0 0 0 .7.3 21 21 0 0 0 16.4-.3l1.5-.7V9a3 3 0 0 0-3-3h-2V5a3 3 0 0 0-3-3h-4Zm5 4V5c0-.6-.4-1-1-1h-4a1 1 0 0 0-1 1v1h6Zm6.4 7.9.6-.3V19a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-5.4l.6.3a10 10 0 0 0 .7.3 23 23 0 0 0 18-.3h.1L21 13l.4.9ZM12 10a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </div>
                        <p class="text-[10px] lg:text-[20px] xl:text-[30px] font-bold leading-tight mt-5 sm:mt-0 ">
                            Experiências profissionais
                        </p>
                    </div>
                    <p class="text-gray-500 text-[10px] lg:text-[20px] xl:text-[25px] mt-5 md:text-md mb-4">
                        Liste suas experiências profissionais em ordem cronológica inversa (do mais recente para o mais
                        antigo). Destaque suas responsabilidades e realizações em cada cargo, focando em resultados
                        tangíveis
                        sempre que possível.
                    </p>

                    <div class="flex gap-2">
                        <div class="flex bg-green-500 rounded-full justify-center items-center p-1 w-10 h-10">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M3 21h18M4 18h16M6 10v8m4-8v8m4-8v8m4-8v8M4 9.5v-1c0-.3.2-.6.5-.8l7-4.5a1 1 0 0 1 1 0l7 4.5c.3.2.5.5.5.8v1c0 .3-.2.5-.5.5h-15a.5.5 0 0 1-.5-.5Z" />
                            </svg>

                        </div>
                        <p class="text-[10px] lg:text-[20px] xl:text-[30px] font-bold leading-tight mt-5 sm:mt-0 ">
                            Formações
                        </p>
                    </div>
                    <p class="text-gray-500 text-[10px] lg:text-[20px] xl:text-[25px] mt-5 md:text-md mb-4">
                        Inclua informações sobre sua formação acadêmica, indicando o nome da instituição, grau obtido, e
                        período de estudo.
                    </p>

                </div>
            </div>
        </div>



        <div class="w-full py-8 bg-gray-50">

            <h1
                class="text-[10px] lg:text-[20px] xl:text-[30px] max-w-screen-xl mb-8 flex flex-wrap items-center justify-between mx-auto">
                Veja as ultimas notícias do mercado de trabalho</h1>

            <div class=" max-w-screen-xl flex flex-nowrap items-center gap-4 justify-start mx-auto">

                @foreach ($vagas as $vaga)
                    <a href="{{ route('vaga.show', $vaga->id) }}"
                        class="relative border text-gray-700 bg-clip-border rounded-xl transition duration-300 hover:scale-105 bg-white shadow-md flex w-full max-w-sm flex-col t  p-5 ">
                        <div
                            class="relative flex items-center gap-4 pt-0 pb-8 mx-0 mt-4 overflow-hidden text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
                            <img src="{{ url('storage/' . $vaga->empresa->user->perfil) }}" alt="Tania Andrew"
                                class="relative inline-block h-24 w-24 !rounded-full  shrink-0 object-cover object-center" />
                            <div class="flex w-full flex-col gap-0.5">
                                <div class="flex items-center justify-between">
                                    <h5
                                        class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                        {{ $vaga->titulo }}
                                    </h5>

                                </div>
                                <p
                                    class="block font-sans text-base antialiased font-medium leading-relaxed text-gray-600">
                                    {{ $vaga->empresa->area }}
                                </p>
                            </div>
                        </div>
                        <div class="">

                            <p class="block text-base antialiased leading-relaxed text-inherit">
                                {{ substr($vaga->empresa->descricao, 0, 250) }}
                            </p>


                            <p
                                class="block mt-4 text-violet-900 antialiased font-medium leading-relaxed text-blue-gray-900">
                                Mais detalhes
                            </p>
                        </div>
                    </a>
                @endforeach



            </div>

            <a href="{{ route('listarVagas') }}" class=" ">
                <p
                    class=" text-base text-center bg-violet-900 text-white hover:text-violet-900 hover:bg-gray-50 hover:border-violet-900 transition-all hover:scale-105 hover:ease-in md:mt-8 p-6 py-3 border w-72 rounded-full mx-auto">
                    Veja todas as vagas!
                </p>
            </a>
        </div>
    </main>



    <footer class="bg-green-500 shadow ">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('imagens/LogoTrampoNavBar.png') }}" class="w-40" alt="Flowbite Logo" />

                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-white sm:mb-0 ">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
            <span class="block text-sm text-white sm:text-center ">© 2023 <a href="https://flowbite.com/"
                    class="hover:underline">Flowbite™</a>. All Rights Reserved.</span>
        </div>
    </footer>



</body>

</html>
