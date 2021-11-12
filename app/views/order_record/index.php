<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/modal-create-tool.css">
    <link rel="stylesheet" href="css/background.css">
    <link rel="stylesheet" href="css/tables.css">
    <title>Empleados</title>
</head>
<body>

    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/user">Usuarios</a></li>
            <li><a href="/category">Categorias</a></li>
            <li><a href="/role">Roles</a></li>  
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
                    <input type="submit" value="Crear Solicitud" onclick="mostrar();"> 
                </form>
            </article>

        </section>

    </main>
    
    <div class="pup" id="pup-1">
        <div class="popup-create" >
            <div class="modal-create" id="modalcontainer">
                <h2>Crear Solicitud de Herramienta</h1>
                    <form action="#" method="post" class="form-modal">
                        
                        <input type="text" name="rut" id="rut" placeholder="Rut Trabajador"  />
                        <input type="text" name="tool" id="tool" placeholder="Herramienta"  />
                        <input type="number" name="amount" id="amount" placeholder="Cantidad"  />
                        <input type="date" name="delivery_date" id="delivery_date" placeholder="Fecha Entrega"  />
                        <input type="time" name="hours_late" id="hours_late" placeholder="Horas de Atraso"  />
                        
                        <input type="submit" value="Ingresar">
                        <input type="button" value="Cerrar" onclick="ocultar();">
                        
                    </form>
                </div>
            </div>
    </div>


    <div class="main-container">

        <table class="elements">

            <thead>
                <tr>
                    <th> RUT  </th>
                    <th> NOMBRE </th>  
                    <th> HERRAMIENTA </th>
                    <th> CANTIDAD </th>  
                    <th> FECHA </th> 
                    <th> ESTADO </th>
                </tr>
            </thead>
        
            <tr>
                <td></td> <td></td> <td></td> <td></td><td></td> <td></td>  
            </tr>
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> 
            </tr>
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> 
            </tr>
            <tr>
                <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> 
            </tr>
        


        
        </table>

    </div>

    <script src="js/popup.js"></script>





</body>
</html>