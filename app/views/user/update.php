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

        <h2>Actualizar Trabajador</h1>
        <form action="/user/update" method="post" class="form-modal" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $user['id']; ?>">
            
            <h6>Nombre</h6>
            <input class="form-input" type="text" name="name" id="name" value="<?= $user['name']; ?>" placeholder="Nombre de la cuenta"  />
            <h6>Rut</h6>
            <input class="form-input" type="text" name="rut" id="rut" value="<?= $user['rut']; ?>" placeholder="Rut de la cuenta" readonly/>
            <h6>Role</h6>
                <?php if($roles): ?>
                    <select name="role_id" class="form-input"> 
                    <?php foreach($roles as $role): ?>
                        <?php if($role['id'] == $user['role_id']): ?>
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
 
</body>
</html>
