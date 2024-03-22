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

    <div class="p-16">
        <div class="p-8 bg-white shadow-lg mt-24">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                    <div>
                        <p class="font-bold text-gray-700 text-xl">22</p>
                        <p class="text-gray-400">vagas</p>
                    </div>
                    <div>
                        <p class="font-bold text-gray-700 text-xl">10</p>
                        <p class="text-gray-400">views</p>
                    </div>
                    <div>
                        <p class="font-bold text-gray-700 text-xl">89</p>
                        <p class="text-gray-400">candidaturas</p>
                    </div>
                </div>
                <div class="relative">
                    <div
                        class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                        <img src=" {{ url('storage/' . $empresa->user->perfil) }} " alt="Tania Andrew"
                class="relative inline-block h-48 w-48 !rounded-full  object-cover object-center" />
                    </div>
                </div>
                <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center"><button
                        class="text-white py-2 px-4 uppercase rounded bg-violet-900 border hover:border-violet-900 hover:text-violet-900 hover:bg-white shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                        Editar</button> <button
                        class=" py-2 px-4 uppercase rounded border border-violet-900 text-violet-900 bg-white hover:bg-violet-900 hover:text-white shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                        Excluir</button> </div>
            </div>
            <div class="mt-20 text-center border-b pb-12">
                <h1 class="text-4xl font-medium text-gray-700">{{$empresa->user->name}}</h1>
                {{-- <p class="font-light text-gray-600 mt-3">Bucharest, Romania</p> --}}
                <p class="mt-8 text-gray-500">{{$empresa->user->email}}</p>
                {{-- <p class="mt-2 text-gray-500">University of Computer Science</p> --}}
            </div>
            <div class="mt-12 flex flex-col justify-center">
                <p class="text-gray-600 text-center font-light lg:px-16">{{$empresa->descricao}}</p> <button class="text-indigo-500 py-2 px-4  font-medium mt-4"> Show more</button>
            </div>
        </div>
    </div>
    @if(count($vagas) > 0)
    <div class="p-16">
        <div class="p-8 bg-white shadow-lg ">

            
                <div class="mt-20 text-left border-b pb-12">
                    <h1 class="text-4xl font-medium text-gray-700">Ulltimmas Vagas cadastradas
                    </h1>
                </div>
                <div class="mt-12 flex gap-4 max-w-screen-xl ustify-start items-cente mx-auto flex-nowrap">
                    

                        @foreach ($vagas as $vaga)
                            <a href="{{ route('vaga.show', $vaga->id, $vaga->empresa->id) }}"
                                class="relative border text-gray-700 bg-clip-border rounded-xl transition duration-300 hover:scale-105 bg-white shadow-md flex w-full max-w-sm flex-col t  p-5 ">
                                <div
                                    class="relative flex items-center gap-4 pt-0 pb-8 mx-0 mt-4 overflow-hidden text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
                                    <img src="{{ url('storage/' . $vaga->empresa->user->perfil) }}" alt="Tania Andrew"
                                        class="relative inline-block h-24 w-24 !rounded-full  object-cover object-center" />
                                    <div class="flex w-full flex-col gap-0.5">
                                        <div class="flex items-center justify-between">
                                            <h5
                                                class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                                {{ $vaga->titulo }}
                                            </h5>

                                        </div>
                                        <p
                                            class="block font-sans text-base antialiased font-medium leading-relaxed text-gray-600">
                                            {{ $vaga->area }}
                                        </p>
                                    </div>
                                </div>
                                <div class="">

                                    <p class="block text-base antialiased leading-relaxed text-inherit">
                                        {{ substr($vaga->descricao, 0, 250) }}
                                    </p>


                                    <p
                                        class="block mt-4 text-violet-900 antialiased font-medium leading-relaxed text-blue-gray-900">
                                        Mais detalhes
                                    </p>
                                </div>
                            </a>
                        @endforeach
                </div>
           


               

            </div>
        </div>
        
    </div>
    @endif

</body>

</html>
