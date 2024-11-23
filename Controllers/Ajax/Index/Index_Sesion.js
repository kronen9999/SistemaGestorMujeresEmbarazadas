document.addEventListener("DOMContentLoaded", function() {
    // Selección de elementos
    const inputUsuario = document.querySelector('[type="text"]');
    const inputPassword = document.querySelector('[type="password"]');
    const tipoSesion = document.querySelector('body');
    const botonSubmit = document.querySelector('[type="button"]');

   
    botonSubmit.addEventListener("click", function() {
        // Obtener valores de los inputs
        const usuario = inputUsuario.value.trim();
        const contraseña = inputPassword.value.trim();
        const sesion = tipoSesion.getAttribute("login");

        // Validaciones de entrada
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

        
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'Controllers/Ajax/Index/IndexOpcion.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) { 
                if (xhr.status === 200) { 
                    try {
                        const response = JSON.parse(xhr.responseText);

                        
                        if (response.status === "success") {
                            if (response.redirect) {
                                window.location.href = response.redirect; 
                            } else {
                                alert(response.message); 
                            }
                        } else {
                            alert(response.message); 
                        }
                    } catch (e) {
                        alert("Error al interpretar la respuesta del servidor: " + xhr.responseText);
                    }
                } else {
                    
                    alert("Error del servidor. Código de estado: " + xhr.status);
                }
            }
        };

        
        const data = 
            'usuario=' + encodeURIComponent(usuario) + 
            '&contraseña=' + encodeURIComponent(contraseña) + 
            '&tipoLogin=' + encodeURIComponent(sesion);

        xhr.send(data);
    });
});
