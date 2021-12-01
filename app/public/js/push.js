
document.addEventListener("DOMContentLoaded", function(){

    if(!Notification){
        alert("Las notificaciones no se soportan en el navegador, descarga otro!");
        return;
    }

    if(Notification.permission !== "granted")
        Notification.requestPermission();

});


function notificar(){

    if(Notification.permission !== "granted"){
        Notification.requestPermission();
    }else{

        var notification = new Notification("Pedidos sin entregar",
            {
                
                icon : "https://images.pexels.com/photos/162553/keys-workshop-mechanic-tools-162553.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260",
                body : "Cantidad de atrasos: ",
            }
        );

        notificacion.onclick = function(){
            window.open("http://google.com/");
        }
    }

}


    