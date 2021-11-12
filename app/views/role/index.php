<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/background.css">
    <link rel="stylesheet" href="/css/modal-create-tool.css">
    <link rel="stylesheet" href="/css/tables.css">
    <title>Empleados</title>
</head>
<body>

    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/user">Usuarios</a></li>
            <li><a href="/category">Categorias</a></li>
            <li><a href="/role">Roles</a></li>  
        </ul>
    </nav>

    <main >
        <section>
            <article class="search" >
                <form action="/role" method="get">
                    <input type="search" 
                            name="search" 
                            id="search" 
                            placeholder="Buscar Rol" />
                    <input type="submit" value="Buscar">
                    <input type="button" value="Crear Rol" onclick="mostrar()"> 
                    <!--boton que abre el pop ad para crear usuarios-->
                </form>
            </article>
        </section>

        <?php if($errors): ?>
            <section class = "errors">
                <ul>
                    <?php foreach($errors as $error): ?>
                        <li><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>

   
        <div class="pup" id="pup-1">
            <div class="popup-create">
                <div class="modal-create" id="modalcontainer">
                    <h2>Crear Rol</h1>
                    <form action="/role/add" method="post" class="form-modal">
                        <input type="text" name="name" id="name" placeholder="Nombre Rol">
                        <input type="submit" value="Crear">
                        <input type="button" value="Cerrar" onclick="ocultar()">
                    </form>
                </div>
            </div>
        </div>
        
        <div class="main-container">
            <table class="elements">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rol</th>
                        <th>Accion</th>
                    </tr>
                </thead>

                <?php if($roles): ?>
                    <?php foreach($roles as $key => $role): ?>
                        <tr>
                            <td><?= $key += 1; ?></td>
                            <td><?= $role['name']; ?></td>
                            <td>
                                <form action="/role/remove" method="get">
                                    <input type="hidden" name="id" value="<?= $role['id']; ?>">
                                    <input type="submit" value="Eliminar">
                                </form>
                            </td> 
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3"><h1>No hay Roles Disponibles</h1></td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </main>

    <script src="/js/popup.js"></script>

</body>
</html>
