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
    <?php
        $errors = '';
    ?>

    <nav>
        <ul class="menu_nav">
            <li><a href="/">Inicio</a></li>
            <li><a href="/user">Usuarios</a></li>
            <li><a href="/category">Categorias</a></li>
            <li><a href="/role">Roles</a></li>  
        </ul>
    </nav>

    <main >
        <section>
            <article class="search" >
                <form action="/user" method="get">
                    <input type="search" 
                            name="search" 
                            id="search" 
                            placeholder="Buscar Trabajador" />
                    <input type="submit" value="Buscar">
                    <input type="button" value="Ingresar Trabajador" onclick="mostrar()">
                </form>
            </article>

        </section>

    </main>

    <?php if($errors): ?>
        <section>
            <ul>
                <?php foreach($errors as $error): ?>
                    <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif; ?>
    
    <!-- POP UP PARA CREAR TRABAJADOR -->
    <div class="pup" id="pup-1"> 
        <div class="popup-create">
                <div class="modal-create" id="modalcontainer">
                    <h2>Crear Trabajador</h1>
                        <form action="/user/add" method="post" class="form-modal">
                            <input class="form-input" type="text" name="rut" id="rut" placeholder="Rut Trabajador"  />
                            <input type="text" name="name" id="name" placeholder="Nombre"  />
                            <input type="text" name="password" id="password" placeholder="Contrasena"  />
                            
                            <!-- CARGAR ROLES AL SELECT -->
                                <?php if($roles): ?>
                            <select name="role_id"> 
                                <?php foreach($roles as $key => $role): ?>
                                <option value="<?= $role['id']; ?> "> 
                                    <?= $role['name']; ?> 
                                </option>
                                <?php endforeach; ?>
                            </select>
                                <?php else: ?>
                        <tr>
                            <td colspan="3"><h1>No hay Categorias disponibles</h1></td> 
                        </tr>
                        <?php endif; ?>

                            <input type="submit" value="Crear">
                            <input type="button" value="Cerrar" onclick="ocultar()">
                    </form>
                </div>
            </div>

    </div>

    
    <script src="/js/popup.js"></script>

    <div class="main-container">
        
        <!-- carga de datos a la tabla -->
        <table class="elements">
            <thead>
                <tr>
                    <th> ID </th><th> RUT </th> <th> NOMBRE </th> <th> ROL </th> <th> ESTADO </th> <th>ACCIÓN</th>
                </tr>
                <?php if($user): ?>
                <?php foreach($user as $key => $users): ?>
                    <tr>
                        <td><?= $key += 1; ?></td> 
                        <td><?= $users['rut']; ?></td> 
                        <td><?= $users['name']; ?></td> 
                        <td><?= $users['role']; ?></td> 
                        <td><?= $users['is_active']; ?></td> 
                        <td>
                                <form action="/user/update" method="GET">
                                    <input type="hidden" name="id" value="<?= $users['id']; ?>">
                                    <input type="submit" value="Editar">
                                </form>
                        </td> 
                        </tr>
                    </tr>
                <?php endforeach; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="3"><h1>No hay Usuarios disponibles</h1></td> 
                    </tr>
                <?php endif; ?>

            </thead>
        </table>
     </div>
</body>
</html>
