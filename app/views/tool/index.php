<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Pañol</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/background.css">
    <?php if($isAdmin): ?>
        <link rel="stylesheet" href="css/modal-create-tool.css">
    <?php endif; ?>

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

    <main>
        <section>
            <article class="search"  >
                <form action="" method="get">
                    <input type="search" 
                            name="search" 
                            id="search" 
                            placeholder="Buscar Herramienta" />
                    <input type="submit" value="Buscar">
                    <?php if($isAdmin): ?>
                        <input type="button" value="Crear Herramienta" onclick="mostrar()">
                        <input type="button" value="Editar Herramienta" onclick="mostrar2()">
                    <?php endif; ?>
                </form>
            </article>
        </section>
        
        <?php if($isAdmin): ?>
            <?php if($errors): ?>
                <section>
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
                        <h2>Crear Herramienta</h1>
                        <form action="/tool/add" method="post" class="form-modal" enctype="multipart/form-data">
                            <input class="form-input" type="text" name="name" id="name" placeholder="Nombre Herramienta"  />
                            <input type="text" name="category" id="category" placeholder="Nombre Categoría"  />
                            <input type="file" name="image" id="image" />
                            <input type="number" name="stock_total" id="stock_total" placeholder="Stock Total" min="0" />
                            <input type="submit" value="Crear">
                            <input type="button" value="Cerrar" onclick="ocultar()">
                        </form>
                    </div>
                </div>
            </div>

            <div class="pup" id="pup-2">
                <div class="popup-create">
                    <div class="modal-create-2" id="modalcontainer2">
                        <h2>Actualizar Herramienta</h1>
                        <form action="#" method="post" class="form-modal">
                            <input class="form-input" type="text" name="name" id="name" placeholder="Nombre Herramienta"  />
                            <input type="text" name="category" id="category" placeholder="Nombre Categoría"  />
                            <input type="file" name="image" id="image" />
                            <input type="number" name="stock_total" id="stock_total" placeholder="Stock Total" min="0" />
                            <input type="submit" value="Actualizar">
                            <input type="button" value="Cerrar" onclick="ocultar2()">
                        </form>
                    </div>
                </div>
            </div> 
        <?php endif; ?>
        
        <section>
            <article class="grid">
                <?php if($tools): ?>
                    <?php foreach($tools as $tool): ?>
                        <div class="card flex-column">
                            <div class="card-body primary">
                                <img src="<?= $tool['image']; ?>"
                                    loading="lazy" 
                                    alt="imagen herramienta"/>
                                <p class="card-name "><?= $tool['name']; ?></p>
                                <p class="card-category"><?= $tool['category']; ?></p>
                                <p>stock total: <?= $tool['stock_total']; ?></p>
                                <p>stock real: <?= $tool['stock_actual']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h1>No hay herramientas Disponble</h1>
                <?php endif; ?>
            </article>
        </section>
    </main>

    <?php if($isAdmin): ?>
        <!-- JS -->
        <script src="js/popup.js"></script>
    <?php endif; ?>

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
