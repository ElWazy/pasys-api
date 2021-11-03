<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Pañol</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>
    <nav>
        <ul>
            <li><h1>Sistema Pañol</h1></li>
        </ul>
    </nav>

    <main>
        <section>
            <article class="search">
                <form action="#" method="get">
                    <input type="search" 
                            name="search" 
                            id="search" 
                            placeholder="Buscar Herramienta" />
                    <input type="submit" value="Buscar">
                </form>
            </article>
            <article class="grid">
                <?php foreach($products as $product): ?>
                    <div class="card flex-column">
                        <div class="card-body primary">
                            <img src="https://picsum.photos/seed/<?= $product['id']; ?>/200"
                            loading="lazy" 
                            alt="imagen herramienta"/>

                            <p class="card-name "><?= $product['name']; ?></p>
                            <p class="card-category"><?= $product['category']; ?></p>
                            <p>stock total: <?= $product['stock_total']; ?></p>
                            <p>stock real: <?= $product['stock_actual']; ?></p>
                        </div>
                    </div>          
                <?php endforeach; ?>
            </article>
        </section>
    </main>

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
