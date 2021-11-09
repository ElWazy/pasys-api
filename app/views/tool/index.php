<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Pañol</title>
    <link rel="stylesheet" href="css/main.css">
    <?php if($isAdmin): ?>
        <link rel="stylesheet" href="css/modal-create-tool.css">
    <?php endif; ?>

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
                <form action="/tool" method="get">
                    <input type="search" 
                            name="search" 
                            id="search" 
                            placeholder="Buscar Herramienta" />   
                    <?php if($isAdmin): ?>
                        <label id="open">Crear Herramienta</label>
                        <label id="open2">Editar Herramienta</label>
                    <?php endif; ?>                         
                    <input type="submit" value="Buscar">
                </form>
            </article>
        </section>
    
        
        <?php if($isAdmin): ?>
            <div class="popup-create">
                <div class="modal-create" id="modalcontainer">
                    <h2>Crear Herramienta</h1>
                        <form action="#" method="post" class="form-modal">
                            <input class="form-input" type="text" name="name" id="name" placeholder="Nombre Herramienta" required />
                            <input type="text" name="category" id="category" placeholder="Nombre Categoría" required />
                            <input type="file" name="image" id="image" />
                            <input type="number" name="stock_total" id="stock_total" placeholder="Stock Total" min="0" required/>
                            <input type="submit" value="Crear">
                            <input type="submit" value="Cerrar" id="close">
                    </form>
                </div>
            </div>
                
            <div class="popup-create">
                <div class="modal-create-2" id="modalcontainer2">
                    <h2>Actualizar Herramienta</h1>
                        <form action="#" method="post" class="form-modal">
                            <input class="form-input" type="text" name="name" id="name" placeholder="Nombre Herramienta" required />
                            <input type="text" name="category" id="category" placeholder="Nombre Categoría" required />
                            <input type="file" name="image" id="image" />
                            <input type="number" name="stock_total" id="stock_total" placeholder="Stock Total" min="0" required/>
                            <input type="submit" value="Actualizar">
                            <input type="submit" value="Cerrar" id="close2">
                    </form>
                </div>
            </div>
        <?php endif; ?>

            
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
                        <p class="card-category"><?= $tool['category']; ?></p>
                        <p>stock total: <?= $tool['stock_total']; ?></p>
                        <p>stock real: <?= $tool['stock_actual']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h1>No hay herramientas disponibles</h1>    
            <?php endif; ?>
        </article>
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