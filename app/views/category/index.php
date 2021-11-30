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
        <ul class="menu_nav">
            <li><a href="/order_record">Inicio</a></li>
            <li><a href="/">Inventario</a></li>
            <li><a href="/user">Usuarios</a></li>
            <li><a href="/category">Categorias</a></li>
            <li><a href="/role">Roles</a></li>  
            <li><a href="/logout">Logout</a></li>
        </ul>
    </nav>


    <main >
        <section>
            
            <article class="search" >
                <form action="#" method="get">
                    <input type="search" 
                            name="search" 
                            id="search" 
                            placeholder="Buscar Categoria" />
                    <input type="submit" value="Buscar">
                    <input type="button" value="Crear Categoría" onclick="mostrar()"> 
                </form>
            </article>

        </section>
    </main>

    <?php if($errors): ?>
        <section class="errors">
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
                <h2>Crear Categoría</h1>
                    <form action="/category/add" method="post" class="form-modal">
                        <input type="text" name="name" id="name" placeholder="Nombre de la Categoría"  />
                        <input type="submit" value="Crear">
                        <input type="button" value="Cerrar" onclick="ocultar();">
                </form>
            </div>
        </div>

    </div>
    
    <div class="main-container">
            <table class="elements">

        <thead>
            <tr>
                <th>ID</th>
                <th>Categoria</th>  
                <th>Accion</th> 
            </tr>
        </thead>
        <?php if($categories): ?>
            <?php foreach($categories as $key => $category): ?>
                <tr>
                    <td><?= $key += 1; ?></td> 
                    <td><?= $category['name']; ?></td> 
                    <td>
                        <form action="/category/remove" method="get">
                            <input type="hidden" name="id" value="<?= $category['id']; ?>">
                            <input type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3"><h1>No hay Categorias disponibles</h1></td> 
            </tr>
        <?php endif; ?>

        </table>
    </div>

    <script src="/js/popup.js"></script>


</body>
</html>
