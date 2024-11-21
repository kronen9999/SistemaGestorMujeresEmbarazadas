const inputUsuario=document.querySelector('[type="text"]');
const inputPassword=document.querySelector('[type="password"]');
var tipoSesion=document.querySelector('body');
const botonMenu=document.querySelector('[type=button]');
document.addEventListener("DOMContentLoaded",function(evento)
{
botonMenu.addEventListener("click",function(){

    let usuario=inputUsuario.value;
    let contraseña=inputPassword.value;
    let sesion=tipoSesion.getAttribute("login");

    let xhr = new XMLHttpRequest();

    xhr.open('POST', 'process.php', true);

    
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            
            //document.getElementById('response').innerHTML = xhr.responseText;
            alert(xhr.responseText);
        }
    };

   
    const data = 
        'usuario='+usuario
        '&contraseña='+contraseña
        '&tipoLogin='+sesion;

    
    xhr.send(data);



});


});