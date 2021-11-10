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
        <ul>
            <li><h1>Sistema Pañol </h1></li>
        </ul>
    </nav>

    <main >
        <section>
            <article class="search" >
                <form action="#" method="get">
                    <input type="search" 
                            name="search" 
                            id="search" 
                            placeholder="Buscar Rol" />
                    <input type="submit" value="Buscar">
                    <input type="button" value="Crear Rol" onclick="mostrar()"> 
                    <!--boton que abre el pop ad para crear usuarios-->
                </form>
            </article>
        </section>

    </main>


    <div class="pup" id="pup-1">
        <div class="popup-create">
            <div class="modal-create" id="modalcontainer">
                <h2>Crear Rol</h1>
                    <form action="#" method="post" class="form-modal">
                        <input type="text" name="name" id="name" placeholder="Nombre Rol">
                        <input type="submit" value="Crear">
                        <input type="button" value="Cerrar" onclick="ocultar()">
                </form>
            </div>
        </div>
    </div>
    
    <div class="main-container">
    <table class="elements">

        <thead>
            <tr>
                <th> ID </th><th> Rol </th>   <th> </th>
            </tr>
        </thead>

        <tr>
            <td></td> <td></td> <td></td> 
        </tr>
        <tr>
            <td></td> <td></td> <td></td> 
        </tr>
        <tr>
            <td></td> <td></td> <td></td> 
        </tr>
        <tr>
            <td></td> <td></td> <td></td> 
        </tr>

        </table>
        
</div>


    <script src="js/popup.js"></script>

</body>
</html>