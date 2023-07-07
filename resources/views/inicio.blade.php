<!DOCTYPE html>
<head>
    <title>Inicio</title>   
</head>
<body>
    @if (!isset(auth()->user()->name))   
        <a href="login">Iniciar Sesion</a>
        <a href="registro">Registrarse</a><br>
    @endif     
       
    @isset(auth()->user()->name )
       <a href="crear">Crear Post</a>
       <a href="mostrar">Mis Posts</a>
       <a href="logout">Cerrar Sesión</a><br>
       Bienvenido {{ auth()->user()->name }}<br>
    @endisset

    @isset($posts)
        @foreach ($posts as $post)
            ========================<br>
            Título: {{$post->titulo}}<br>
            Contenido: {{$post->cuerpo}}<br>
            Creado: {{$post->created_at}}<br> 
            Autor: {{$post->autor}}<br>     
        @endforeach

        <div>
        @if ($posts->previousPageUrl())
            <a href="{{ $posts->previousPageUrl() }}" >Anterior</a>
        @endif

        @if ($posts->nextPageUrl())
            <a href="{{ $posts->nextPageUrl() }}" >Siguiente</a>
        @endif
        </div>
    @endisset 
    
    <div>
        <br>Meses con Contenido: <br>
        @isset($meses)
            @foreach ($meses as $mes)
                <a href="/mes/{{$mes}}">{{$mes}}</a><br>    
            @endforeach
        @endisset   
    </div>
</body>
</html>