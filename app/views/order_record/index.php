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
        <ul class="menu_nav">
            <li><a href="/order_record">Inicio</a></li>
            <li><a href="/">Inventario</a></li>
            <li><a href="/user">Usuarios</a></li>
            <li><a href="/category">Categorias</a></li>
            <li><a href="/role">Roles</a></li>  
            <li><a href="/logout">Logout</a></li>
        </ul>
    </nav>


    <main>
        <section>
            <article class="search" >
                <form action="#" method="get">
                    <input type="search" 
                            name="search" 
                            id="search" 
                            placeholder="Buscar Categoria" />
                    <input type="submit" value="Buscar">
                    <input type="button" value="Crear Solicitud" onclick="mostrar();"> 
                </form>
            </article>
        </section>
    </main>
    
    <div class="pup" id="pup-1">
        <div class="popup-create" >
            <div class="modal-create" id="modalcontainer">
                <h2>Crear Solicitud de Herramienta</h1>
                    <form action="/order_record/add" method="post" class="form-modal">
                        <input type="text" name="worker" id="worker" placeholder="Rut Trabajador"  />
                        <?php if($tools): ?>
                            <select name="tool"> 
                                <?php foreach($tools as $tool): ?>
                                    <option value="<?= $tool['id']; ?>"> 
                                        <?= $tool['name']; ?> 
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        <?php else: ?>
                            <h1>No hay Herramientas disponibles</h1> 
                        <?php endif; ?>
                        <input type="number" name="amount" id="amount" min="0" placeholder="Cantidad"  />
                        
                        <input type="submit" value="Ingresar">
                        <input type="button" value="Cerrar" onclick="ocultar();">
                        
                    </form>
                </div>
            </div>
    </div>


    <div class="main-container">
        <table class="elements-without-hover">
            <thead>
                <tr>
                    <th> RUT  </th>
                    <th> NOMBRE </th>  
                    <th> HERRAMIENTA </th>
                    <th> CANTIDAD </th>  
                    <th> FECHA PEDIDO</th> 
                    <th> FECHA DEVOLUCIÓN</th> 
                    <th> PAÑOLERO </th> 
                    <th> ESTADO </th>
                    <th> ACCIÓN </th>

                </tr>
            </thead>
        
            <?php if($orders): ?>
                <?php foreach($orders as $key => $order): ?>
                    <tr>
                        <td><?= $order['rut']; ?></td> 
                        <td><?= $order['trabajador']; ?></td> 
                        <td><?= $order['herramienta']; ?></td> 
                        <td><?= $order['amount']; ?></td> 
                        <td><?= $order['order_date']; ?></td> 
                        <td><?= $order['deadline']; ?></td> 
                        <td><?= $order['panolero']; ?></td>
                        <td class="<?php if($order['estado']=="pedido") echo 'td1';elseif($order['estado']=="entregado") echo 'td2';else echo 'td3'?>">
                            <?= $order['estado']; ?>
                        </td>
                        <td>
                            <form action="/order_record/delivery" method="GET">
                                <input type="hidden" name="id" value="<?= $order['id']; ?>">
                                <input type="submit" value="Validar Entrega">
                            </form>
                        </td> 
                    </tr>


                <?php endforeach; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="9"><h1>No hay ordenes disponibles</h1></td> 
                    </tr>
                <?php endif; ?>

            
        
        </table>
    </div>

    <script src="js/popup.js"></script>





</body>
</html>
