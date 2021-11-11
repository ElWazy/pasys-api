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
        <ul>
            <li><h1>Sistema Pañol</h1></li>
        </ul>
    </nav>

    <main >
        <?php if($errors): ?>
            <section>
                <ul>
                    <?php foreach($errors as $error): ?>
                        <li><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>

        <h2>Actualizar Trabajador</h1>
        <form action="/user/update" method="post" class="form-modal" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $user[0]['id']; ?>">
            
            <h6>Nombre</h6>
            <input class="form-input" type="text" name="name" id="name" value="<?= $user[0]['name']; ?>" placeholder="Nombre Herramienta"  />
            <h6>Contraseña</h6>
            <input class="form-input" type="text" name="password" id="password" value="<?= $user[0]['password']; ?>" placeholder="Nombre Herramienta"  />
            <h6>Rut</h6>
            <input class="form-input" type="text" name="rut" id="rut" value="<?= $user[0]['rut']; ?>" placeholder="Nombre Herramienta"  />
            <h6>Role</h6>
                <?php if($roles): ?>
                    <select name="role_id" class="form-input"> 
                    <?php foreach($roles as $role): ?>
                        <?php if($role['id'] == $user[0]['role_id']): ?>
                            <option value="<?= $role['id']; ?> " selected> 
                                <?= $role['name']; ?> 
                            </option>
                        <?php else: ?>
                            <option value="<?= $role['id']; ?> "> 
                                <?= $role['name']; ?> 
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>     
            <?php else: ?>
                <h1>No hay Categorias disponibles</h1> 
            <?php endif; ?>     
            <h6>Estado</h6>
            <select name="is_active" class="form-input">
                <option value="1">Activo</option>
                <option value="0">De baja</option>
            </select>
            <input type="submit" value="Actualizar">
        </form>
    </main>

    <!-- JS -->
    <script src="/js/popup.js"></script>

    <footer>
        <ul class="flex">
            <li>Sistema Pañol, Derechos Reservados</li>
            <li>
                <a href="login.html">Administrar</a>
            </li>
        </ul>
    </footer>

 
</body>
</html>
