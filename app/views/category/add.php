<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Pañol</title>
    <link rel="stylesheet" href="/css/form.css">
</head>
<body>
    <nav>
        <ul>
            <li><h1>Sistema Pañol</h1></li>
        </ul>
    </nav>

    <div class="modal">
        <h2>Crear Categoria</h1>
        <form action="/category/add" method="post" class="form-modal">
            <input type="text" name="name" id="name" placeholder="Nombre Categoria" required />

            <input type="submit" value="Crear">
        </form>
    </div>
</body>
</html>