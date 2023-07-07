<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista del Mes</title>
</head>
<body>
    <a href="/">Pagina Principal</a><br>

    @isset($posts)
        @foreach ($posts as $post)
            ========================<br>
            Título: {{$post->titulo}}<br>
            Contenido: {{$post->cuerpo}}<br>
            Creado: {{$post->created_at}}<br> 
            Autor: {{$post->autor}}<br>     
        @endforeach
    @endisset

</body>
</html>