<!DOCTYPE html>
<head>
    <title>Registro</title>
</head>
<body>
    <a href="/">Pagina Principal</a><br>
    
    @isset($autor)
        <h2>Autor creado</h2>
    @endisset
    
    @isset($error)
        <h2>Error</h2>
    @endisset

    <form action="registro" method="post">
        @csrf
        Nombre Autor: <input type="text" name="name" id="name"><br>
        Email: <input type="email" name="mail" id="mail"><br>
        Contraseña: <input type="password" name="password" id="password"><br>
        <input type="submit" name="send" id="send" value="Registrarse" />
    </form>
</body>
</html>