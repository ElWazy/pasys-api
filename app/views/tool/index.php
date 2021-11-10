<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Pañol</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/background.css">
    <link rel="stylesheet" href="css/modal-create-tool.css">
</head>
<body>
    <nav>
        <ul>
            <li><h1>Sistema Pañol</h1></li>
        </ul>
    </nav>

    <main >
        <section>
            <article class="search"  >
                <form action="" method="get">
                    <input type="search" 
                            name="search" 
                            id="search" 
                            placeholder="Buscar Herramienta" />
                    <input type="submit" value="Buscar">
                    <input type="submit" value="Crear Herramienta" onclick="mostrar()">
                    <input type="submit" value="Editar Herramienta" onclick="mostrar2()">
                </form>
            </article>
        </section>
        
        <div class="pup" id="pup-1">
            <div class="popup-create">
                <div class="modal-create" id="modalcontainer">
                    <h1>Crear Herramienta</h1>
                    <form action="" method="post" class="form-modal">
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
                    <h1>Actualizar Herramienta</h1>
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

        <!-- article de json -->
        <article class="grid">
            <?php if($tools): ?>
                <?php foreach($tools as $tool): ?>
                    <div class="card flex-column">
                        <div class="card-body primary">
                            <img src="<?= $tool['image']; ?>"
                                loading="lazy" 
                                alt="imagen herramienta"/>

                                <p class="card-name"><?= $tool['name']; ?></p>
                            <p class="card-category">${json[i].category}</p>
                            <p>stock total: ${json[i].stock_total}</p>
                            <p>stock real: ${json[i].stock_actual}</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h1>No hay herramientas disponibles</h1>
            <?php endif; ?>
        </article>
    </main>

        <!-- JS -->
        <script src="js/popup.js"></script>
        

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
