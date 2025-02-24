<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curriculo</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body>
    <h1>{{ $candidato->user->name }}</h1>
    <p><b>Nascimento:</b> <i>01/01/1970</i></p>
    <p><b>Email:</b> {{ $candidato->user->email }}</p>
    @foreach ($candidato->user->telefones as $telefone)
        <p><b>Telefone:</b> {{ $telefone->celular }}</p>
    @endforeach
    <img src="" alt="Imagem de perfil" width="300px" height="400px">
    <p> {{ $candidato->sobre }} </p>

    @if (count($candidato->experiencias) > 0)
        <h2 class="">
            Experiência:

        </h2>
        <hr>
        @foreach ($candidato->experiencias as $experiencia)
            <p>Empresa: {{ $experiencia->empresa }}</p>
            <p>Trabalhando: {{ $experiencia->trabalhando }}</p>
            <p>Descricao: {{ $experiencia->descricao }}</p>
        @endforeach
    @endif
    {{-- <h2 id="habilidades">
        <a href="#habilidades">Competências</a>
    </h2>
    <hr>
    <ul>
        <li>JavaScript</li>
        <li>CSS</li>
        <li>HTML</li>
        <li>XML</li>
    </ul>
    <p><a href="#">topo</a></p> --}}


    @if (count($candidato->formacaos) > 0)
        <h2 id="formacao">
            Formação Acadêmica
        </h2>
        <hr>

        @foreach ($candidato->formacaos as $formacao)
            <p><b> {{ $formacao->curso }}</b></p>
            <p>{{ $formacao->instituto }}</p>
            <p>Cursando: {{ $formacao->cursando }}</p>
            <p>Tipo: {{ $formacao->tipo }}</p>
        @endforeach
    @endif


</body>

</html>
