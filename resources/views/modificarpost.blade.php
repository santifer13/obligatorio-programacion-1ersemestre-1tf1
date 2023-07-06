<!DOCTYPE html>

<head>

    <title>Modificar Post</title>
</head>
<body>
    @isset($error)
        <h2>Error</h2>
    @endisset
    @isset($posts)
    <form action="{{ $posts->id }}" method="post">
    @csrf
    ID: <input type="hidden" name="id" value="{{ $posts->id }}">{{ $posts->id }}<br>
    Titulo Post: <input type="text" name="title" id="title" value="{{$posts->titulo}}"><br>
    Cuerpo: <textarea id="body" name="body" rows="4" cols="50">{{$posts->cuerpo}}</textarea><br>
    Autor: <input type="hidden" name="autor" value="{{ auth()->user()->id }}">{{ auth()->user()->name }}<br>
    <input type="submit" name="send" id="send" value="Modificar" />
    </form>
    @endisset
    
  


</body>
</html>