<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/background.css">
    <link rel="stylesheet" href="css/modal-create-tool.css">
    <link rel="stylesheet" href="css/tables.css">
    <title>Empleados</title>
</head>
<body>

    <nav>
        <ul class="menu_nav">
            <li><a href="order-manager.html">Inicio</a></li>
            <li><a href="worker-list.html">Trabajadores</a></li>
            <li><a href="tool-list.html">Inventario</a></li>
        </ul>
    </nav>

    <main >
        <section>
            <article class="search" >
                <form action="#" method="get">
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
    
    
    <div class="pup" id="pup-1">

        <div class="popup-create">
                <div class="modal-create" id="modalcontainer">
                    <h2>Crear Herramienta</h1>
                        <form action="#" method="post" class="form-modal">
                            <input class="form-input" type="text" name="name" id="name" placeholder="Rut Trabajador"  />
                            <input type="text" name="category" id="category" placeholder="Nombre"  />
                            <input type="number" name="stock_total" id="stock_total" placeholder="Rol" min="0" />
                            <input type="number" name="stock_total" id="stock_total" placeholder="Estado" min="0" />
                            <input type="submit" value="Crear">
                            <input type="button" value="Cerrar" onclick="ocultar()">
                    </form>
                </div>
            </div>

    </div>
    
    <script src="js/popup.js"></script>

    <div class="main-container">
        <table class="elements">
            <thead>
                <tr>
                    <th> ID </th><th> RUT </th> <th> NOMBRE </th> <th> ROL </th> <th> ESTADO </th> <th></th> <th></th>
                </tr>
            </thead>
        
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
        
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
        
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
        
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
    
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
        
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
    
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
        
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
    
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
        
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
    
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
        
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
    
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
        
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <th></th> <th></th>
            </tr>
           
     </div>




</body>
</html>