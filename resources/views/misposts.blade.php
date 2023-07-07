<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=10">
    <title>Mis Posts</title>
</head>
<body>
    <a href="/">Pagina Principal</a><br>
        
    @isset($posts)      
        @foreach ($posts as $post) 
             ========================<br>
            <a href="modificar/{{$post->id}}">Modificar</a>
            <a href="eliminar/{{$post->id}}">Eliminar</a><br>
             Título: {{$post->titulo}}<br>
             Contenido: {{$post->cuerpo}}<br>
             Creado: {{$post->created_at}}<br>            
        @endforeach
    @endisset
</body>
</html>