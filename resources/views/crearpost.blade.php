<!DOCTYPE html>

<head>

    <title>Crear Post</title>
</head>
<body>
@isset($posteo)
        <h2>Post creado</h2>
    @endisset
    @isset($error)
        <h2>Error</h2>
    @endisset
    <form action="crear" method="post">
    @csrf
    Titulo Post: <input type="text" name="title" id="title"><br>
    Cuerpo: <textarea id="body" name="body" rows="4" cols="50"></textarea><br>
    Autor: <input type="text" name="autor" id="autor"><br>
    <input type="submit" name="send" id="send" value="Subir" />
    </form>
  


</body>
</html>