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

                    if (xhr2.response=="false")
                    {
                alert("No se detectaron cambios en los campos");
                    }
                    else
                    {
                        alert ("Datos actualizados correctamente");
                       objMenuDinamico.innerHTML=xhr2.response;  
                    }

                
                } else {
                 
                    alert("Error del servidor. Código de estado: " + xhr2.status);
                }
            }
        };
        
        let data="idClinica="+encodeURIComponent(varId.value)+
                  "&nombreClinica="+encodeURIComponent(varNomnbre.value)+
                  "&localidadClinica="+encodeURIComponent(varLocalidad.value)+
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

    else if (e.target.matches('[tipo="Agregar"]'))
    {
objMenuDinamico.innerHTML=`<div class='Administrador_Clinicas_ventanaAgregar'> 
    <img src='../Public/Assets/IconoAgregar.png'>
    <div class='Administrador_Clinicas_ventanaAgregar_div'>
    <p>Id de la clinica:</p>
    <input type='number' placeholder='Ingrese el id de su clinica' AgregarClinica='id'>
    <p>Nombre de la clinica:</p>
    <input type='text' placeholder='Ingrese el nombre de su clinica' AgregarClinica='nombre'>
    <p>Localidad de la clinica:</p>
    <input type='text' placeholder='Ingrese la localidad donde se ubica su clinica' AgregarClinica='localidad'>
    <p>Direccion de la clinica:</p>
    <input type='text' placeholder='Ingrese la direccion de su clinica' AgregarClinica='direccion'>
    </div>
    </div>
    <div class='contenedorBotonesVentanaAgregarClinica'>
    <button class='btnGuardarAgregarClinica'>Guardar cambios</button>
    <button class='btnCancelarAgregarClinica'>Cancelar</button>
    </div>`;

    }

    if (e.target.matches("[class='btnGuardarAgregarClinica']"))
    {
        let agclinicaID=document.querySelector("[AgregarClinica='id']");
        let agclinicaNombre=document.querySelector("[AgregarClinica='nombre']");
        let agclinicaLocalidad=document.querySelector("[AgregarClinica='localidad']");
        let agclinicaDireccion=document.querySelector("[AgregarClinica='direccion']");

        if (agclinicaID&&agclinicaNombre&&agclinicaLocalidad&&agclinicaDireccion)
        {
 
            let xhr2 = new XMLHttpRequest();
            xhr2.open('POST', '../Controllers/Ajax/PanelAdministrador/AdministrarClinicas/AgregarClinicas.php', true);
            xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            xhr2.onreadystatechange = function() {
                if (xhr2.readyState === 4) { 
                    if (xhr2.status === 200) { 
                        if (xhr2.response!="false")
                        {
                            alert("Clinica registrada correctamente");
                            objMenuDinamico.innerHTML = xhr2.responseText;
                        }
                        else{
                            alert("No se pudo registrar la clinica");
                        }
                        
                     
                    } else {
                     
                        alert("Error del servidor. Código de estado: " + xhr2.status);
                    }
                }
            };
             let data="idClinica="+decodeURIComponent(agclinicaID.value)
             +"&nomnbreClinica="+decodeURIComponent(agclinicaNombre.value)
             +"&localidadClinica="+decodeURIComponent(agclinicaLocalidad.value)
             +"&direccionClinica="+decodeURIComponent(agclinicaDireccion.value);
            
            xhr2.send(data); 

        }

        
    }
    else if (e.target.matches("[class='btnCancelarAgregarClinica']"))
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

    else if(objMenuDinamico.getAttribute("TipoMenu")=="Administrar_Doctores")
    {
if (e.target.matches("[tipoopciondoctor='Seleccionar']"))
{
    let cedulaDoctor=e.target.getAttribute("ceduladoc");
    if (cedulaDoctor)
    {
     let xhr2 = new XMLHttpRequest();
xhr2.open('POST', '../Controllers/Ajax/PanelAdministrador/AdministrarDoctores/MostrarInfoDoctor.php', true);
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

let data="cedulaDoctor="+encodeURIComponent(cedulaDoctor);

xhr2.send(data);    
    }


}
else if (e.target.matches("[tipoopciondoctor='Agregar']"))
    {
    
        objMenuDinamico.innerHTML=`<div class="SubContenedorEditarDoctor1">
        <div class="SubContenedorEditarDoctor1_divImg">
        <img src="../Public/Assets/IconoAgregar.png">
</div>
<div class="SubContenedorEditarDoctor1_1">
<div class="DoctorInput_text">
<p>Nombre:</p>
<input type="text" admindoctorcampo="nombre" placeholder='Ingrese el nombre del doctor(a)'>
</div>
<div class="DoctorInput_text">
<p>Apellido paterno:</p>
<input type="text" admindoctorcampo="apellidoP" placeholder='Ingrese el apellido paterno del doctor(a)'>
</div>
<div class="DoctorInput_text">
<p>Apellido materno:</p>
<input type="text" admindoctorcampo="apellidoM" placeholder='Ingrese el apellido materno del doctor(a)'>
</div>
</div>
</div>
<div class="SubContenedorEditarDoctor2">
<div class="SubContenedorEditarDoctor2_1">
<div class="DoctorInput_text">
<p>Cedula:</p>
<input type="text" admindoctorcampo="cedula" placeholder='Ingrese la cedula del doctor(a)'>
</div>
<div class="DoctorInput_text">
<p>Telefono movil:</p>
<input type="text" admindoctorcampo="telefonoM" placeholder='Ingrese el telefono movil del doctor(a)'>
</div>
<div class="DoctorInput_text">
<p>Correo electronico:</p>
<input type="text" admindoctorcampo="correoE" placeholder='Ingrese el correo electronico del doctor (a)'>
</div>
</div>

<div class="SubContenedorEditarDoctor2_1">
<div class="SubContenedorEditarDoctor2_1_cmbox">
<p>Genero:</p>
<select class="SubContenedorEditarDoctor2_1_select" admindoctorcampo="genero"><option value="Masculino" selected>
    Masculino
    </option>
    <option value="Femenino" >
    Femenino
    </option>
</select>

</div>

<div class="DoctorInput_text">
<p>Telefono oficina:</p>
<input type="text" admindoctorcampo="telefonoO" placeholder='Ingrese el telefono de oficina del doctor (a)'>
</div>
<div class="DoctorInput_text">
<p>Contraseña:</p>
<div class="DoctorInput_text_input">
<input type="password" placeholder='Ingrese la contraseña'>
<img src="../Public/Assets/Icono_Editar.png">
</div>
</div>
</div>
</div><div class="SubContenedorEditarDoctor2_1_botones">
<button tipo="botonAceptarEditarDoctor">Guardar cambios</button>
<button tipo="botonAceptarCancelarDoctor">Cancelar</button>
</div>
`;

    }

    }

    if (e.target.matches('[tipo="botonAceptarCancelarDoctor"]'))
    {
        
        let  xhr = new XMLHttpRequest();
       xhr.open('POST', '../Controllers/Ajax/PanelAdministrador/MenuLateral/MostrarDoctores.php', true);
       xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
       
       xhr.onreadystatechange = function() {
           if (xhr.readyState === 4) { 
               if (xhr.status === 200) { 
                   
                   objMenuDinamico.innerHTML = xhr.responseText;
               } else {
                
                   alert("Error del servidor. Código de estado: " + xhr.status);
               }
           }
       };
       
       
       xhr.send();
       
    }
    else if (e.target.matches('[tipo="botonAceptarEditarDoctor"]'))
    {
        let nombreDoctorEditar=document.querySelector('[admindoctorcampo="nombre"]');
        let apellidoPDoctorEditar=document.querySelector('[admindoctorcampo="apellidoP"]');
        let apellidoMDoctorEditar=document.querySelector('[admindoctorcampo="apellidoM"]');
        let CedulaDoctor=document.querySelector('[admindoctorcampo="cedula"]');
        let telefonoMDoctorEditar=document.querySelector('[admindoctorcampo="telefonoM"]');
        let correoDoctorEditar=document.querySelector('[admindoctorcampo="correoE"]');
        let telefonoODoctorEditar=document.querySelector('[admindoctorcampo="telefonoO"]');
        let generoDoctorEditar=document.querySelector('[admindoctorcampo="genero"]');

        

        if (nombreDoctorEditar&&apellidoMDoctorEditar&&apellidoPDoctorEditar&&CedulaDoctor&&telefonoMDoctorEditar&&correoDoctorEditar
            &&telefonoODoctorEditar&&generoDoctorEditar)
        {
            let  xhr = new XMLHttpRequest();
            xhr.open('POST', '../Controllers/Ajax/PanelAdministrador/AdministrarDoctores/ActualizarInformacionDoctor.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) { 
                    if (xhr.status === 200) { 
                        
                        if (xhr.responseText=="false")
                        {
                      alert("No se pudieron actualizar los datos");
                        }
                        else if (xhr.responseText!="true")
                        {
                            alert("Datos actualizados correctamente");
                         objMenuDinamico.innerHTML = xhr.responseText;
                        }
                        
                    } else {
                     
                        alert("Error del servidor. Código de estado: " + xhr.status);
                    }
                }
            };
            
            let data="nombreDoctor="+encodeURIComponent(nombreDoctorEditar.value)+
            "&apellidoPDoctor="+encodeURIComponent(apellidoPDoctorEditar.value)+
            "&apellidoMDoctor="+encodeURIComponent(apellidoMDoctorEditar.value)+
            "&cedulaDoctor="+encodeURIComponent(CedulaDoctor.value)+
            "&telefonoMDoctor="+encodeURIComponent(telefonoMDoctorEditar.value)+
            "&correoDoctor="+encodeURIComponent(correoDoctorEditar.value)+
            "&telefonoEditarDoctor="+encodeURIComponent(telefonoODoctorEditar.value)+
            "&generoDoctor="+encodeURIComponent(generoDoctorEditar.value);


            xhr.send(data);
        
         }

        
     
    }

});
