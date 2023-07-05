<!DOCTYPE html>
<head>

    <title>Inicio</title>
    
</head>
<body>
@if (!isset(auth()->user()->name))
   
<a href="login">Iniciar Sesion</a>
       <a href="registro">Registrarse</a>
@endif

     
       @isset(auth()->user()->name )
       <a href="crear">Crear Post</a>
       <a href="mostrar">Mis Posts</a>
       <a href="logout">Cerrar Sesión</a><br>
       Bienvenido {{ auth()->user()->name }}  
        @endisset
</body>
</html>