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
            <li><a href="/order_record">Inicio</a></li>
            <li><a href="/">Inventario</a></li>
            <li><a href="/user">Usuarios</a></li>
            <li><a href="/category">Categorias</a></li>
            <li><a href="/role">Roles</a></li>  
            <li><a href="/logout">Logout</a></li>
        </ul>
    </nav>

    <main  class="form-update">
        <?php if($errors): ?>
            <section>
                <ul>
                    <?php foreach($errors as $error): ?>
                        <li><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>
        <h2 >Actualizar Contraseña de <?= $user[0]['name']; ?></h2>
        

        <form action="/user/updatePassword" method="POST" class="form-modal" enctype="multipart/form-data">


            <input type="hidden" name="id" value="<?= $user[0]['id']; ?>">
            <h6>Ingrese la nueva Contraseña</h6>
            <input class="form-input" type="password" name="password" id="password" placeholder="Nueva contraseña"  />
           
            <input type="submit" value="Actualizar">

        </form>
    </main>


    <script src="/js/popup.js"></script>

    <footer>
        <ul class="flex">
            <li>Sistema Pañol, Derechos Reservados</li>
        </ul>
    </footer>
 
</body>
</html>
