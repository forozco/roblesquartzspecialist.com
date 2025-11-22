<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Solicitud de información desde la página</h1>

    <p><strong>Nombres: </strong> {{$datos['nombres']}}</p>
    <p><strong>Apellidos: </strong> {{$datos['apellidos']}}</p>
    <p><strong>Asunto: </strong> {{$datos['asunto']}}</p>
    <p><strong>Teléfono: </strong> {{$datos['tel']}}</p>
    
    <p><strong>Correo: </strong> {{$datos['correo']}}</p>
    <p><strong>Mensaje: </strong> {{$datos['mensaje']}}</p>

</body>
</html> 