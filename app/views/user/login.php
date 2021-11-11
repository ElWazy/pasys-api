<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Pañol</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <nav>
        <ul>
            <li><h1>Sistema Pañol Zumbi Zumbi</h1></li>
        </ul>
    </nav>

    <main>
        <form action="/user/login" method="post">
            <h2>SISTEMA ADMINISTRACIÓN PAÑOL</h2>
            <input type="text" 
                name="rut" 
                id="rut" 
                placeholder="Rut" 
                required/>
            <input type="password" 
                name="password" 
                id="password" 
                placeholder="Contraseña" 
                required>

            <input type="submit" value="Iniciar Sesion">
        </form>
    </main>
</body>
</html>
