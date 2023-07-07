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
            ID: {{$post->id}}<br>
            Título: {{$post->titulo}}<br>
            Contenido: {{$post->cuerpo}}<br>
            Creado: {{$post->created_at}}<br> 
            Creado: {{$post->created_at}}<br>     
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
</body>
</html>