const inputUsuario = document.querySelector('[type="text"]');
const inputPassword = document.querySelector('[type="password"]');
const tipoSesion = document.querySelector('body');
const botonSubmit = document.querySelector('[type="button"]');

document.addEventListener("DOMContentLoaded", function() {
    botonSubmit.addEventListener("click", function() {
        const usuario = inputUsuario.value.trim();
        const contraseña = inputPassword.value.trim();
        const sesion = tipoSesion.getAttribute("login");

        // Validación de campos
        if (!usuario && !contraseña) {
            alert("Debe ingresar su usuario y contraseña.");
            return;
        }
        if (!usuario) {
            alert("Debe ingresar su usuario.");
            return;
        }
        if (!contraseña) {
            alert("Debe ingresar su contraseña.");
            return;
        }

        // Si las validaciones pasan, se envían los datos
        const xhr = new XMLHttpRequest();

        xhr.open('POST', 'Controllers/Ajax/Index/IndexOpcion.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
            }
        };

        const data = 
            'usuario=' + encodeURIComponent(usuario) + 
            '&contraseña=' + encodeURIComponent(contraseña) + 
            '&tipoLogin=' + encodeURIComponent(sesion);

        xhr.send(data);
    });
});
