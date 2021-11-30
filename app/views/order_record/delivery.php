<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Pañol</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/background.css">
    <link rel="stylesheet" href="/css/modal-create-tool.css">
</head>
<body>
    <nav>
    <ul class="menu_nav">
            <li><a href="/">Inicio</a></li>
            <li><a href="/user">Usuarios</a></li>
            <li><a href="/category">Categorias</a></li>
            <li><a href="/role">Roles</a></li>  
        </ul>
    </nav>

    <main class="form-update">
        <?php if($errors): ?>
            <section>
                <ul>
                    <?php foreach($errors as $error): ?>
                        <li><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>

        <h2>Validar Entrega</h2>
        <form action="/tool/update" method="post" class="form-modal" enctype="multipart/form-data">
            <input type="number" 
                id="amount" 
                name="amount" 
                min="0" 
                placeholder="Ingrese la cantidad a entregar" />
            <input type="submit" value="Entregar">
        </form>
    </main>

    <!-- JS -->
    <script src="/js/popup.js"></script>

    <footer>
        <ul class="flex">
            <li>Sistema Pañol, Derechos Reservados</li>
        </ul>
    </footer>

 
</body>
</html>
