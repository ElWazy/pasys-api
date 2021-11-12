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
                <li><h1>Sistema Pañol</h1></li>
                <li><a href="/">Inicio</a></li>
                <li><a href="/user">Usuarios</a></li>
                <li><a href="/category">Categorias</a></li>
                <li><a href="/role">Roles</a></li>  
                <li><a href="/logout">Logout</a></li>
            </ul>
    </nav>

    <main >
        
        <section>
            <article class="grid">
                <?php if($tools): ?>
                    <?php foreach($tools as $tool): ?>
                        <div class="card flex-column">
                            <div class="card-body primary">
                                <img src="/<?= $tool['image']; ?>"
                                    loading="lazy" 
                                    alt="imagen herramienta"/>
                                <p class="card-name "><?= $tool['name']; ?></p>
                                <p class="card-category"><?= $tool['category']; ?></p>
                                <p>stock total: <?= $tool['stock_total']; ?></p>
                                <p>stock real: <?= $tool['stock_actual']; ?></p>
                                <form action="/tool/deactive" method="POST">
                                    <input type="hidden" name="id" value="<?= $tool['id']; ?>">
                                    <input type="submit" value="Activar">
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h1>No hay herramientas Disponbles</h1>
                <?php endif; ?>
            </article>
        </section>
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
