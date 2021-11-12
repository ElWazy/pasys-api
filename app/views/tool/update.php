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

        <h2>Actualizar Herramienta</h1>
        <form action="/tool/update" method="post" class="form-modal" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $tool[0]['id']; ?>">
            <input class="form-input" type="text" name="name" id="name" value="<?= $tool[0]['name']; ?>" placeholder="Nombre Herramienta"  />
            <?php if($categories): ?>
                <select name="category_id"> 
                    <?php foreach($categories as $category): ?>
                        <?php if($category['id'] == $tool[0]['category_id']): ?>
                            <option value="<?= $category['id']; ?> " selected> 
                                <?= $category['name']; ?> 
                            </option>
                        <?php else: ?>
                            <option value="<?= $category['id']; ?> "> 
                                <?= $category['name']; ?> 
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            <?php else: ?>
                <h1>No hay Categorias disponibles</h1> 
            <?php endif; ?>
            <input type="file" name="image" id="image" />
            <input type="number" name="stock_total" id="stock_total" value="<?= $tool[0]['stock_total']; ?>" placeholder="Stock Total" min="0" />
            <input type="submit" value="Actualizar">
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
