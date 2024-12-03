document.body.addEventListener("click", function (e) {

    objMenuDinamico=document.querySelector('[class="Menu_Dinamico"]');

    if (objMenuDinamico.getAttribute("TipoMenu")=="Informacion_Administrador")
    {

 if (e.target.matches('[referencia="InfoPerfil_BotonSubmit"]')) {
        
        const inputNombre=document.querySelector("[InfoPerfilInput='nombre']");
        const inputApellidoP=document.querySelector("[InfoPerfilInput='apellidoP']");
        const inputApellidoM=document.querySelector("[InfoPerfilInput='apellidoM']");
        const inputNoTrabajador=document.querySelector("[InfoPerfilInput='noTrabajador']");
        const inputTelefono=document.querySelector("[InfoPerfilInput='telefono']");
        const inputCorreo=document.querySelector("[InfoPerfilInput='correoE']");

        if (inputNombre&&inputApellidoP&&inputApellidoM&&inputNoTrabajador&&inputTelefono&&inputCorreo) 
         {
            let xhr = new XMLHttpRequest();
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
    }

    else if(objMenuDinamico.getAttribute("TipoMenu")=="Administrar_Clinicas")
    {
 if (e.target.matches('[tipo="Seleccionable"]'))
 {
    let idClinica=e.target.getAttribute("IdClinica");
    let nombreClinica=e.target.getAttribute("nombreClinica");
    let localidadClinica=e.target.getAttribute("localidadClinica");
    let direccionClinica=e.target.getAttribute("direccionClinica");

    objMenuDinamico.innerHTML=`<div class='Administrador_Clinicas_ventanaEditar'> 
    <img src='../Public/Assets/IconoClinicaOscuro.png'>
    <div class='Administrador_Clinicas_ventanaEditar_div'>
    <p>Id de la clinica:</p>
    <input type='number' value='${idClinica}' editarClinica='id'>
    <p>Nombre de la clinica:</p>
    <input type='text' value='${nombreClinica}' editarClinica='nombre'>
    <p>Localidad de la clinica:</p>
    <input type='text' value='${localidadClinica}' editarClinica='localidad'>
    <p>Direccion de la clinica:</p>
    <input type='text' value='${direccionClinica}' editarClinica='direccion'>
    </div>
    </div>
    <div class='contenedorBotonesVentanaEditarClinica'>
    <button class='btnGuardarEditarClinica'>Guardar cambios</button>
    <button class='btnCancelarEditarClinica'>Cancelar</button>
    </div>`;
 }
 if (e.target.matches("[class='btnGuardarEditarClinica']"))
    {
        let varId=document.querySelector("[editarClinica='id']");
        let varNomnbre=document.querySelector("[editarClinica='nombre']");
        let varLocalidad=document.querySelector("[editarClinica='localidad']");
        let varDireccion=document.querySelector("[editarClinica='direccion']");

        if (varId&&varNomnbre&&varLocalidad&&varDireccion)
        {
            let xhr2 = new XMLHttpRequest();
        xhr2.open('POST', '../Controllers/Ajax/PanelAdministrador/AdministrarClinicas/EditarClinicas.php', true);
        xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr2.onreadystatechange = function() {
            if (xhr2.readyState === 4) { 
                if (xhr2.status === 200) { 
                    
                 alert(xhr2.responseText);
                } else {
                 
                    alert("Error del servidor. Código de estado: " + xhr2.status);
                }
            }
        };
        
        let data="idClinica="+encodeURIComponent(varId.value)+
                  "&nombreClinica="+encodeURIComponent(varNomnbre.value);
                  "&localidadClinica="+encodeURIComponent(varLocalidad.value);
                  "&direccionClinica="+encodeURIComponent(varDireccion.value);
        
        xhr2.send(data); 
         
        }
        
        
    }
    else if (e.target.matches("[class='btnCancelarEditarClinica']"))
    {
       let xhr2 = new XMLHttpRequest();
        xhr2.open('POST', '../Controllers/Ajax/PanelAdministrador/AdministrarClinicas/AdministrarClinicas.php', true);
        xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr2.onreadystatechange = function() {
            if (xhr2.readyState === 4) { 
                if (xhr2.status === 200) { 
                    
                 objMenuDinamico.innerHTML = xhr2.responseText;
                } else {
                 
                    alert("Error del servidor. Código de estado: " + xhr2.status);
                }
            }
        };
        
        
        xhr2.send(); 
    }


    }

   
});
