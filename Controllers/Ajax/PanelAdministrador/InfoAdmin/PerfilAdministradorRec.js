const inputNombre=document.querySelector('[id="Perfil_Nombre"]');
const inputApellidoP=document.querySelector('[id="Perfil_ApellidoPaterno"]');
const inputApellidoM=document.querySelector('[id="Perfil_ApellidoMaterno"]');
const inputNoTrabajador=document.querySelector('[id="Perfil_Notrabajador"]');
const inputTelefono=document.querySelector('[id="Perfil_Telefono"]');
const inputCorreo=document.querySelector('[id="Perfil_Correo_Electronico"]');

document.addEventListener("DOMContentLoaded",function(e)
{
const botonActualizarPerfil=document.querySelector("[class='Menu_Dinamico_AdministrarPerfil_SubApartadoSubmit_button']");

botonActualizarPerfil.addEventListener("click",function(e)
{

    let nombre=inputNombre.value;
    let apellidoP=inputApellidoP.value;
    let apellidoM=inputApellidoM.value;
    let noTrabajador=inputNoTrabajador.value;
    let telefono=inputTelefono.value;
    let correo=inputCorreo.value;

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
            'nombre=' + encodeURIComponent(nombre) + 
            '&apellidoP=' + encodeURIComponent(apellidoP) +
            '&apellidoM=' + encodeURIComponent(apellidoM) +
            '&noTrabajador=' + encodeURIComponent(noTrabajador) +
            '&telefono=' + encodeURIComponent(telefono) + 
            '&correo=' + encodeURIComponent(correo);

        xhr.send(data);
    
    
    });


});



