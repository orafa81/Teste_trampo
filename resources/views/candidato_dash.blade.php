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

    <nav class="fixed top-0 z-50 w-full bg-emerald-500 border-b border-white ">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">


                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="{{ url('storage/' . $candidato->user->perfil) }}"
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow "
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-700" role="none">
                                    {{ $candidato->user->name }}
                                </p>
                                <p class="text-sm font-medium text-gray-700 truncate " role="none">
                                    {{ $candidato->user->email }}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('listarVagas') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Vagas</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button>Sair</button>
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-emerald-500 border-r border-white sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-emerald-500">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="flex items-center p-2 text-white rounded-lg  hover:bg-emerald-400  group">
                        <svg class="w-5 h-5 text-gray-900 transition duration-75 group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('listarVagas') }}"
                        class="flex items-center p-2 text-white rounded-lg hover:bg-emerald-400 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Vagas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('candidato.perfil', auth()->user()->candidato->id) }}"
                        class="flex items-center p-2 text-white rounded-lg hover:bg-emerald-400 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 20">
                            <path
                                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Perfil</span>
                    </a>
                </li>

                <li>
                    <a href="" class="flex items-center p-2 text-white rounded-lg hover:bg-emerald-400 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                            <path
                                d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                            <path
                                d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button>logout</button>
                            </form>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">

            <!-- Client Table -->
            @if ($candidaturas && count($candidaturas) > 0)
                <div class="mt-4 mx-4">
                    <h1 class="mb-6 text-xl">Candidaturas Enviadas</h1>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Nome</th>
                                        <th class="px-4 py-3">salário</th>
                                        <th class="px-4 py-3">Status</th>
                                        <th class="px-4 py-3">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" id="data2">

                                    @foreach ($candidaturas as $candidatura)
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">

                                            <td class="px-4 py-3">
                                                <a href="{{ route('vaga.show', $candidatura->vaga->id) }}">
                                                    <div class="flex items-center text-sm">
                                                        <div>
                                                            <p class="font-semibold">
                                                                {{ $candidatura->vaga->empresa->user->name }}</p>
                                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                                {{ $candidatura->vaga->area }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="px-4 py-3 text-sm">{{ $candidatura->vaga->salario }}</td>
                                            <td class="px-4 py-3 text-xs">
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    Approved </span>
                                            </td>
                                            <td class="px-4 py-3 text-sm">{{ $candidatura->vaga->created_at }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <div class="mx-auto pag">

                            {{ $candidaturas->render() }}
                        </div>
                    </div>
                </div>
            @else
                <div class="mt-4 mx-4">
                    <h1 class="mb-6 text-xl">Candidaturas Enviadas</h1>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">

                            <div id="accordion-arrow-icon" data-accordion="open">
                                <h2 id="accordion-arrow-icon-heading-1">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-900 bg-gray-100 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                        data-accordion-target="#accordion-arrow-icon-body-1" aria-expanded="true"
                                        aria-controls="accordion-arrow-icon-body-1">
                                        <span>Nenhuma candidatura realizada</span>
                                    </button>
                                </h2>
                                <div id="accordion-arrow-icon-body-1"
                                    aria-labelledby="accordion-arrow-icon-heading-1">
                                    <div
                                        class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                        <p class="mb-2 text-gray-500 dark:text-gray-400">Voce ainda não possui nenhuma
                                            candidatura feita,
                                            para isso veja as vagas disponóveis em nossa plataforma e se candidate-se de
                                            forma gatuita
                                        </p>
                                        <p class="text-gray-500 dark:text-gray-400">
                                            <a href="{{ route('listarVagas') }}"
                                                class="text-blue-600 dark:text-blue-500 hover:underline">
                                                clicando aqui.
                                            </a>
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            @endif
            <!-- ./Client Table -->

        </div>
    </div>




</body>

</html>
