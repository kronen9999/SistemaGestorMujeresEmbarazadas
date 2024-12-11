
document.addEventListener("click",function (e)
{
objmenuDinamico=document.querySelector('[class="Menu_Dinamico"]');

if (objmenuDinamico.getAttribute("TipoMenu")=="Doctores_PanelPrincipal")
{
if (e.target.matches('[bottontipo="DoctoresAdministrarPacientes"]'))
{
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_AdministrarPacientes/MostrarPacientes.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) { 
            if (xhr.status === 200) { 
            objmenuDinamico.setAttribute("TipoMenu","Doctores_PanelPrincipal_Pacientes");
             objmenuDinamico.innerHTML = xhr.responseText;

            } else {
             
                alert("Error del servidor. Código de estado: " + xhr.status);
            }
        }
    };
    
    
    xhr.send(); 
    
}

}

if (objmenuDinamico.getAttribute("TipoMenu")=="Doctores_PanelPrincipal_Pacientes")
{


if (e.target.matches('[tipodiv="Doctores_AgregarPaciente"]'))
{
    contraseñaAleatoria=generarCodigoAleatorio(7);
    objmenuDinamico.innerHTML=`<div class='Doctores_AgregarPaciente_Apartado1'>
    <div class='Doctores_AgregarPaciente_Apartado1_divImg'><img src='../Public/Assets/IconoAgregar.png'></div>
    <p>Agregar paciente</p>
    </div>
    <div class='Doctores_AgregarPaciente_Apartado2'> 
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Curp:</p>
   <input type='text' placeholder='Ingrese la curp de su paciente' id='AgregarPacienteCurp'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Nombre:</p>
   <input type='text' placeholder='Ingrese el nombre de su paciente' id='AgregarPacienteNombre'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Apellido paterno:</p>
   <input type='text' placeholder='Ingrese el apellido paterno de su paciente' id='AgregarPacienteApellidoP'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Apellido materno:</p>
   <input type='text' placeholder='Ingrese el apellido materno de su paciente' id='AgregarPacienteApellidoM'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Fecha Nacimiento:</p>
   <input type='text' placeholder='Ingrese la fecha de nacimiento de su paciente' id='AgregarPacienteFechaN'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>CorreoElectronico:</p>
   <input type='text' placeholder='Ingrese el correo electronico de su paciente' id='AgregarPacienteCorreo'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Telefono:</p>
   <input type='text' placeholder='Ingrese el telefono de su paciente' id='AgregarPacienteTelefono'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Tipo de sangre:</p>
   <input type='text' placeholder='Ingrese el tipo de sangre de su paciente' id='AgregarPacienteTipoSangre'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Fecha de la ultima mestruacion:</p>
   <input type='text' placeholder='Ingrese la fecha de ultima menstruacion de su paciente' id='AgregarPacienteFechaUM'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Ocupacion:</p>
   <input type='text' placeholder='Ingrese la ocupacion de su paciente' id='AgregarPacienteOcupacion'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Direccion:</p>
   <input type='text' placeholder='Ingrese la direcion del paciente' id='AgregarPacienteDireccion'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Contraseña (Se puede modificar)</p>
   <input type='text' placeholder='Ingrese la direcion del paciente' id='AgregarPacienteContraseña' value='${contraseñaAleatoria}'>
   </div>
    </div>
    <div class='Doctores_AgregarPaciente_Apartado3'>
    <button botontipo='AgregarPaciente'>Agregar paciente</button>
    <button botontipo='CancelarAgregarPaciente'>Cancelar registro</button>
    </div>
    `;


}
if (e.target.matches('[tipodiv="Doctores_Paciente"]'))
{
    
    objmenuDinamico.setAttribute("TipoMenu","Doctores_Paciente_AdministrarPaciente");
    let xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_Pacientes/MuestraMenuOpciones.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) { 
                if (xhr.status === 200) { 
                    objmenuDinamico.setAttribute("TipoMenu","Doctores_Paciente_AdministrarPaciente");
                 objmenuDinamico.innerHTML = xhr.responseText;
                } else {
                 
                    alert("Error del servidor. Código de estado: " + xhr.status);
                }
            }
        };
        
        let data ="curpPaciente="+encodeURIComponent(e.target.getAttribute("paciente"));
        
        xhr.send(data); 
    
}

if (e.target.matches("[botontipo='AgregarPaciente']")){
    let curpPaciente =document.querySelector("[id='AgregarPacienteCurp']");
    let nombrePaciente =document.querySelector("[id='AgregarPacienteNombre']");
    let apellidoPPaciente =document.querySelector("[id='AgregarPacienteApellidoP']");
    let apellidoMPaciente =document.querySelector("[id='AgregarPacienteApellidoM']");
    let fechaNPaciente =document.querySelector("[id='AgregarPacienteFechaN']");
    let correoPaciente =document.querySelector("[id='AgregarPacienteCorreo']");
    let telefonoPaciente =document.querySelector("[id='AgregarPacienteTelefono']");
    let tipoSangrePaciente =document.querySelector("[id='AgregarPacienteTipoSangre']");
    let fechaUmPaciente =document.querySelector("[id='AgregarPacienteFechaUM']");
    let ocupacionPaciente =document.querySelector("[id='AgregarPacienteOcupacion']");
    let direccionPaciente =document.querySelector("[id='AgregarPacienteDireccion']");
    let contraseñaPaciente=document.querySelector("[id='AgregarPacienteContraseña']");

    if (curpPaciente&&nombrePaciente&&apellidoMPaciente&&apellidoPPaciente&&fechaNPaciente&&correoPaciente&&telefonoPaciente&&tipoSangrePaciente
        &&fechaUmPaciente&&ocupacionPaciente&&direccionPaciente&&contraseñaPaciente)
        {
            if (curpPaciente.value.trim()==""||nombrePaciente.value.trim()==""||apellidoMPaciente.value.trim()==""||
            apellidoPPaciente.value.trim()==""||fechaNPaciente.value.trim()==""||correoPaciente.value.trim()==""||
            telefonoPaciente.value.trim()==""||tipoSangrePaciente.value.trim()==""||fechaUmPaciente.value.trim()==""||
            ocupacionPaciente.value.trim()==""||direccionPaciente.value.trim()==""||contraseñaPaciente.value.trim()=="")
                {
                    alert("Debe de rellenar todos los campos para poder registrar un doctor")
                }
                else {
                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_AdministrarPacientes/AgregarPacientes.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4) { 
                            if (xhr.status === 200) { 
                                if (xhr.responseText=="false")
                                {
                                    alert("Verifique los campos y vuelva a intentarlo");
                                }
                                else
                                {
                                    alert("Paciente agregado exitosamente");
                                    objmenuDinamico.setAttribute("TipoMenu","Doctores_PanelPrincipal_Pacientes");
                                    objmenuDinamico.innerHTML = xhr.responseText;
                                }
                            
                             
                            } else {
                             
                                alert("Error del servidor. Código de estado: " + xhr.status);
                            }
                        }
                    };
                    
                    data="curpPaciente="+encodeURIComponent(curpPaciente.value)
                    +"&nombrePaciente="+encodeURIComponent(nombrePaciente.value)
                    +"&apellidoPPaciente="+encodeURIComponent(apellidoPPaciente.value)
                    +"&apellidoMPaciente="+encodeURIComponent(apellidoMPaciente.value)
                    +"&fechaNPaciente="+encodeURIComponent(fechaNPaciente.value)
                    +"&correoPaciente="+encodeURIComponent(correoPaciente.value)
                    +"&telefonoPaciente="+encodeURIComponent(telefonoPaciente.value)
                    +"&tipoSangrePaciente="+encodeURIComponent(tipoSangrePaciente.value)
                    +"&fechaUmPaciente="+encodeURIComponent(fechaUmPaciente.value)
                    +"&ocupacionPaciente="+encodeURIComponent(ocupacionPaciente.value)
                    +"&direccionPaciente="+encodeURIComponent(direccionPaciente.value)
                    +"&contraseñaPaciente="+encodeURIComponent(contraseñaPaciente.value);
                    
                    xhr.send(data); 
                    


                }

        }
    
    }

    
    else if (e.target.matches("[botontipo='CancelarAgregarPaciente']"))
    {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_AdministrarPacientes/MostrarPacientes.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) { 
                if (xhr.status === 200) { 
                objmenuDinamico.setAttribute("TipoMenu","Doctores_PanelPrincipal_Pacientes");
                 objmenuDinamico.innerHTML = xhr.responseText;
                } else {
                 
                    alert("Error del servidor. Código de estado: " + xhr.status);
                }
            }
        };
        
        
        xhr.send(); 
    }


}

if (objmenuDinamico.getAttribute("TipoMenu")=="Doctores_Paciente_AdministrarPaciente"){
    
if (e.target.matches("[opcion='EditarPaciente']"))
{
    let pCurp=document.querySelector('[curpid_titulop]');
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_AdministrarPacientes/MostrarApartadoActualizar.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) { 
            if (xhr.status === 200) { 
             objmenuDinamico.innerHTML = xhr.responseText;
            } else {
             
                alert("Error del servidor. Código de estado: " + xhr.status);
            }
        }
    };
    
    
    xhr.send("curpPaciente="+encodeURIComponent(pCurp.getAttribute("curpid_titulop"))); 
}
else if (e.target.matches("[opcion='VerCitas']"))
{
    let pCurp=document.querySelector('[curpid_titulop]');
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_AdministrarPacientes/MostrarCitasPacientes.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) { 
            if (xhr.status === 200) { 
             objmenuDinamico.innerHTML = xhr.responseText;
            } else {
             
                alert("Error del servidor. Código de estado: " + xhr.status);
            }
        }
    };
    
    
    xhr.send("curpPaciente="+encodeURIComponent(pCurp.getAttribute("curpid_titulop"))); 

}
else if (e.target.matches("[opcion='VerRecetas']"))
{
    
}

if (e.target.matches("[selectorCitaId]"))
{
    
let idCita=e.target.getAttribute("selectorCitaId");
alert(idCita);
let infoCitaExpediente=document.querySelector("[class='Doctor_ContenedorCitas_Paciente_InformacionExpediente']");
let xhr = new XMLHttpRequest();
xhr.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_AdministrarPacientes/PacienteMostrarExpedienteCita.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) { 
        if (xhr.status === 200) { 
            infoCitaExpediente.innerHTML=xhr.responseText;
        } else {
         
            alert("Error del servidor. Código de estado: " + xhr.status);
        }
    }
};

let data ="idCita="+encodeURIComponent(idCita);

xhr.send(data); 





}

if (e.target.matches("[botontipo='GuardarCambiosPaciente']"))
{
let nombrePaciente =document.querySelector("[id='ActualizarPacienteNombre']");
let apellidoPPaciente =document.querySelector("[id='ActualizarPacienteApellidoP']");
let apellidoMPaciente =document.querySelector("[id='ActualizarPacienteApellidoM']");
let fechaNPaciente =document.querySelector("[id='ActualizarPacienteFechaN']");
let correoPaciente =document.querySelector("[id='ActualizarPacienteCorreo']");
let telefonoPaciente =document.querySelector("[id='ActualizarPacienteTelefono']");
let tipoSangrePaciente =document.querySelector("[id='ActualizarPacienteTipoSangre']");
let fechaUmPaciente =document.querySelector("[id='ActualizarPacienteFechaUM']");
let ocupacionPaciente =document.querySelector("[id='ActualizarPacienteOcupacion']");
let direccionPaciente =document.querySelector("[id='ActualizarPacienteDireccion']");

if (nombrePaciente.value.trim()==""||apellidoMPaciente.value.trim()==""||
apellidoPPaciente.value.trim()==""||fechaNPaciente.value.trim()==""||correoPaciente.value.trim()==""||
telefonoPaciente.value.trim()==""||tipoSangrePaciente.value.trim()==""||fechaUmPaciente.value.trim()==""||
ocupacionPaciente.value.trim()==""||direccionPaciente.value.trim()=="")
    {
        alert("No deje ningun campo vacio al actualizar los datos ")
    }
    else {
        let xhr = new XMLHttpRequest();
                    xhr.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_Pacientes/ActualizarPaciente.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4) { 
                            if (xhr.status === 200) { 
                                if (xhr.responseText=="false")
                                {
                                    alert("Verifique los campos y vuelva a intentarlo");
                                }
                                else
                                {
                                    alert("Datos Actualizados correctamente");
                                    objmenuDinamico.setAttribute("TipoMenu","Doctores_Paciente_AdministrarPaciente");
                                    objmenuDinamico.innerHTML = xhr.responseText;
                                }
                            
                             
                            } else {
                             
                                alert("Error del servidor. Código de estado: " + xhr.status);
                            }
                        }
                    };
                    
                    data="curpPaciente="+encodeURIComponent(document.querySelector('[valorCurp]').getAttribute("valorCurp"))
                    +"&nombrePaciente="+encodeURIComponent(nombrePaciente.value)
                    +"&apellidoPPaciente="+encodeURIComponent(apellidoPPaciente.value)
                    +"&apellidoMPaciente="+encodeURIComponent(apellidoMPaciente.value)
                    +"&fechaNPaciente="+encodeURIComponent(fechaNPaciente.value)
                    +"&correoPaciente="+encodeURIComponent(correoPaciente.value)
                    +"&telefonoPaciente="+encodeURIComponent(telefonoPaciente.value)
                    +"&tipoSangrePaciente="+encodeURIComponent(tipoSangrePaciente.value)
                    +"&fechaUmPaciente="+encodeURIComponent(fechaUmPaciente.value)
                    +"&ocupacionPaciente="+encodeURIComponent(ocupacionPaciente.value)
                    +"&direccionPaciente="+encodeURIComponent(direccionPaciente.value);
                    
                    
                    xhr.send(data); 

    }


}
else if (e.target.matches("[botontipo='CancelarCambiosPaciente']"))
{
    let pCurp=document.querySelector("[valorCurp]");
    let xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_Pacientes/MuestraMenuOpciones.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) { 
                if (xhr.status === 200) { 
                    objmenuDinamico.setAttribute("TipoMenu","Doctores_Paciente_AdministrarPaciente");
                 objmenuDinamico.innerHTML = xhr.responseText;
                } else {
                 
                    alert("Error del servidor. Código de estado: " + xhr.status);
                }
            }
        };
        
        let data ="curpPaciente="+encodeURIComponent(pCurp.getAttribute("valorCurp"));
        
        xhr.send(data); 
    
}

}





});

function generarCodigoAleatorio(longitud) {
    const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let codigo = '';
    for (let i = 0; i < longitud; i++) {
        const indiceAleatorio = Math.floor(Math.random() * caracteres.length);
        codigo += caracteres.charAt(indiceAleatorio);
    }
    return codigo;
}
