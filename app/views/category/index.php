<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/tables.css">
    <title>Empleados</title>
</head>
<body>
    <nav>
        <ul>
            <li><h1>Sistema Pañol </h1></li>
        </ul>
    </nav>

    <main >
        <section>
            <article class="search" >
                <form action="/category" method="get">
                    <input type="search" 
                            name="search" 
                            id="search" 
                            placeholder="Buscar Categoria" />
                    <input type="submit" value="Buscar">
                    <a id="a-button" href="/category/add">Crear Categoria</a> <!--boton que abre el pop ad para crear usuarios-->
                </form>
            </article>
        </section>
    </main>
    
    <div class="main-container">
        <table class="elements">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoría</th> 
                    <th>Acción</th>
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
                                <input class="btn-remove" type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr colspan="3">
                    <h1>No hay categorías disponibles</h1>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>