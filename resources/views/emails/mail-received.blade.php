<!DOCTYPE html>
<html>

<head>
    <title>Mensaje Recibido</title>
</head>

<body>
    <p>Has recibido un mensaje de: {{$msg['name']}} </p>
    <p><strong>Correo:</strong> {{$msg['email']}}</p>
    <p><strong>Contenido:</strong> {{$msg['msg']}}</p>
</body>

</html>