<!DOCTYPE html>
<head>
    <title>Login</title>
</head>
<body>
@isset($error)
        <h2>Error</h2>
    @endisset
    <form action="login" method="post">
    @csrf
    Email: <input type="email" name="mail" id="mail"><br>
    Contraseña: <input type="password" name="password" id="password"><br>
    <input type="submit" name="send" id="send" value="Logearse" />
    </form>

</body>
</html>