<!DOCTYPE html>
<html lang="en">
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
    
    <canvas id="myChart" width="400" height="400"></canvas>




    <footer>
        <ul class="flex">
            <li>Sistema Pañol, Derechos Reservados</li>
        </ul>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>

        var ctx = document.getElementById('myChart')
        var myChart = new Chart(ctx,{
            type: 'bar',
            data: {
                datasets: [{
                    label: 'Enrolados',
                    backgroundColor: ['#6bf1ab'],
                    borderColor: ['Black'],
                    borderWidth: 1
                }]
            }
        });


        let url = 'http://localhost:5000/api/statistics/user'
        fetch(url)
        .then(response => response.json() )
        .then(datos => mostrar(datos))
        .catch(error=> console.log(error));

        const mostrar = (articulos) => {
            articulos.forEach(element => {
                myChart.data['labels'].push(element.name)
                myChart.data['datasets'][0].data.push(element.count)
            });
        }
            
    </script>

</body>
</html>
