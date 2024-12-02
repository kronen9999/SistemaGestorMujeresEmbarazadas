document.body.addEventListener("click", function (e) {

    if (e.target.matches('[referencia="InfoPerfil_BotonSubmit"]')) {
        
        const inputNombre=document.querySelector("[InfoPerfilInput='nombre']");
        const inputApellidoP=document.querySelector("[InfoPerfilInput='apellidoP']");
        const inputApellidoM=document.querySelector("[InfoPerfilInput='apellidoM']");
        const inputNoTrabajador=document.querySelector("[InfoPerfilInput='noTrabajador']");
        const inputTelefono=document.querySelector("[InfoPerfilInput='telefono']");
        const inputCorreo=document.querySelector("[InfoPerfilInput='correoE']");

        if (inputNombre&&inputApellidoP&&inputApellidoM&&inputNoTrabajador&&inputTelefono&&inputCorreo) 
         {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../Controllers/Ajax/PanelAdministrador/InfoAdmin/PerfilAdministrador.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) { 
                    if (xhr.status === 200) { 
    
                        
                        try {
                            const response = JSON.parse(xhr.responseText);
    
                            if(response.estado==="realizado")
                            {
                             alert(response.mensaje);
                            }
                            else if (response.estado==="noRealizado")
                            {
                                alert(response.mensaje);
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
                'nombre=' + encodeURIComponent(inputNombre.value) + 
                '&apellidoP=' + encodeURIComponent(inputApellidoP.value) +
                '&apellidoM=' + encodeURIComponent(inputApellidoM.value) +
                '&noTrabajador=' + encodeURIComponent(inputNoTrabajador.value) +
                '&telefono=' + encodeURIComponent(inputTelefono.value) + 
                '&correo=' + encodeURIComponent(inputCorreo.value);
    
            xhr.send(data);
        
         }
       
    }
});
