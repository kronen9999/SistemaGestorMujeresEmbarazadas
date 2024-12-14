
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
                    alert("Debe de rellenar todos los campos para poder registrar su Paciente")
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

if (e.target.matches("[btnGestionarCita]"))
{
    let fechaCitaRecuperar=e.target.getAttribute("fechacita");
let idCitaGestionar=e.target.getAttribute("CitaGestionarIdCita");
let curpPacienteRecuperado=e.target.getAttribute("curppaciente");
objmenuDinamico.innerHTML=`<div class='Doctores_Citas_GestionarCitas_subA1'>
<div class='Doctores_Citas_GestionarCitas_subA1_divImg'>
<img src='../Public/Assets/ImagenRegistrandoExpediente.png'>
</div>
<p>Registro de expediente</p>
</div>
<div class='Doctores_Citas_GestionarCitas_subA2'>
<div class='Doctores_Citas_GestionarCitas_subInput'>
<p>Peso Materno (KG):</p>
<input type='number' datoExpediente='PesoMaterno'>
</div>
<div class='Doctores_Citas_GestionarCitas_subInput'>
<p>Presion:</p>
<div class='Doctores_Citas_GestionarCitas_subInput_Presion'> 
<p >Sistolica</p>
<input type='number' datoExpediente='PSistolica'>
<p style="margin-left:1vw;">Diastolica</p>
<input type='number' datoExpediente='PDiastolica'>
</div>
</div>
</div> 
<div class='Doctores_Citas_GestionarCitas_subA2'>
<div class='Doctores_Citas_GestionarCitas_subInput'>
<p>Frecuencia cardiaca fetal:</p>
<input type='number' datoExpediente='FCFetal'>
</div>
<div class='Doctores_Citas_GestionarCitas_subInput'>
<p>Altura uterina (cm):</p>
<input type='number' datoExpediente='AlturaUterina'>
</div>
</div>
<div class='Doctores_Citas_GestionarCitas_subA2'>
<div class='Doctores_Citas_GestionarCitas_subInput'>
<p>Movimientos fetales:</p>
<input type='text' datoExpediente='MovimientosFetales'>
</div>
<div class='Doctores_Citas_GestionarCitas_subInput'>
<p>Posicion fetal:</p>
<input type='text' datoExpediente='PosicionFetal'>
</div>
</div>
<div class='Doctores_Citas_GestionarCitas_subA2'>
<div class='Doctores_Citas_GestionarCitas_subInput'>
<p>Evaluacion de edemas:</p>
<input type='text' datoExpediente='EEdemas'>
</div>
<div class='Doctores_Citas_GestionarCitas_subInput'>
<div class='Doctores_Citas_GestionarCitas_subInput_Presion'> 
<p>¿Se detecto algun riesgo en el paciente?</p>
<select datoExpediente='selectRiesgoPaciente'>
<option value='0' selected>No se detectaron riesgos</option>
<option value='1'>Se detectaron riesgos</option>
</select>
</div>
</div>
</div>
<div class='Doctores_Citas_GestionarCitas_subA2_divimput'>
<button btn='GuardarExpedientePaciente'>Guardar expediente</button>
<button btn='CancelarGuardarExpedientePaciente'>Cancelar expediente</button>
</div>`;

let btnCancelarAgregarExpediente=document.querySelector("[btn='CancelarGuardarExpedientePaciente']");
let btnGuardarExpedientePaciente=document.querySelector("[btn='GuardarExpedientePaciente']");

if (btnCancelarAgregarExpediente)
{
    btnCancelarAgregarExpediente.addEventListener("click",function()
{
    let xhr2 = new XMLHttpRequest();
    xhr2.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_AdministrarCitas/MostrarCitas.php', true);
    xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr2.onreadystatechange = function() {
        if (xhr.readyState === 4) { 
            if (xhr.status === 200) { 
            divMenuDinamico.setAttribute("TipoMenu","Doctores_PanelPrincipal_Pacientes");
             divMenuDinamico.innerHTML = xhr2.responseText;

            } else {
             
                alert("Error del servidor. Código de estado: " + xhr2.status);
            }
        }
    };
    
    
    xhr2.send("fecha="+encodeURIComponent(fechaCitaRecuperar)); 

});
    
}
if (btnGuardarExpedientePaciente)
{
btnGuardarExpedientePaciente.addEventListener("click",function()
{
    let pesoMaterno=document.querySelector('[datoexpediente="PesoMaterno"]').value;
    let presion="";
    let presionSistolica=document.querySelector('[datoexpediente="PSistolica"]').value;
    let presionDiastolica=document.querySelector('[datoexpediente="PDiastolica"]').value;
    let fCFetal=document.querySelector('[datoexpediente="FCFetal"]').value;
    let alturaUterina=document.querySelector('[datoexpediente="AlturaUterina"]').value;
    let movimientosFetales=document.querySelector('[datoexpediente="MovimientosFetales"]').value;
    let posicionFetal=document.querySelector('[datoexpediente="PosicionFetal"]').value;
    let evaluacionEdemas=document.querySelector('[datoexpediente="EEdemas"]').value;
    let riesgoPaciente= document.querySelector('[datoexpediente="selectRiesgoPaciente"]').value;

    if (
        pesoMaterno.trim() === "" ||
        presionSistolica.trim() === "" || 
        presionDiastolica.trim() === "" || 
        fCFetal.trim() === "" || 
        alturaUterina.trim() === "" || 
        movimientosFetales.trim() === "" || 
        posicionFetal.trim() === "" || 
        evaluacionEdemas.trim() === "" || 
        riesgoPaciente.trim() === ""
    ) {
        alert("Debe de rellenar todos los campos para guardar el expediente");
    }
    else {
        presion=presionSistolica+"-"+presionDiastolica;
    let xhrExp = new XMLHttpRequest();
    xhrExp.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_AdministrarCitas/AgregarExpediente.php', true);
    xhrExp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhrExp.onreadystatechange = function() {
        if (xhrExp.readyState === 4) { 
            if (xhrExp.status === 200) { 
                if (xhrExp.responseText=="false")
                {
                    alert("verifique los campos y vuelva a intentarlo");
                }
                else {
                    alert("Expediente registrado con exito");
                    let xhr3 = new XMLHttpRequest();
                    xhr3.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_AdministrarCitas/MostrarCitas.php', true);
                    xhr3.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    
                    xhr3.onreadystatechange = function() {
                        if (xhr3.readyState === 4) { 
                            if (xhr3.status === 200) { 
                            divMenuDinamico.setAttribute("TipoMenu","Doctores_PanelPrincipal_Pacientes");
                             divMenuDinamico.innerHTML = xhr3.responseText;
                
                            } else {
                             
                                alert("Error del servidor. Código de estado: " + xhr3.status);
                            }
                        }
                    };
                    
                    
                    xhr3.send("fecha="+encodeURIComponent(fechaCitaRecuperar)); 
                }
             

            } else {
             
                alert("Error del servidor. Código de estado: " + xhrExp.status);
            }
        }
    };
    
   let  dataEnvioExpediente="pesoMaterno="+encodeURIComponent(pesoMaterno)
   +"&presion="+encodeURIComponent(presion)
   +"&fCFetal="+encodeURIComponent(fCFetal)
   +"&alturaUterina="+encodeURIComponent(alturaUterina)
   +"&movimientosFetales="+encodeURIComponent(movimientosFetales)
   +"&posicionFetal="+encodeURIComponent(posicionFetal)
   +"&evaulacionEdemas="+encodeURIComponent(evaluacionEdemas)
   +"&riesgoPaciente="+encodeURIComponent(riesgoPaciente)
   +"&idCita="+encodeURIComponent(idCitaGestionar)
   +"&curpPaciente="+encodeURIComponent(curpPacienteRecuperado);
    xhrExp.send(dataEnvioExpediente); 
        
    }

    

   

});

}

}
if (e.target.matches("[btnEliminarCita]"))
{
    let fechaCitaRec=e.target.getAttribute("citagestionarfecha");
    let idCitaEliminar=e.target.getAttribute("CitaGestionarIdCitaEliminar");
    let xhrEliminarCita = new XMLHttpRequest();
    xhrEliminarCita.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_AdministrarCitas/EliminarCita.php', true);
    xhrEliminarCita.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    
                    xhrEliminarCita.onreadystatechange = function() {
                        if (xhrEliminarCita.readyState === 4) { 
                            if (xhrEliminarCita.status === 200) { 
                                if (xhrEliminarCita.responseText=="false")
                                {
                                    alert("No se pudo actualizar");
                                }
                                else {
                                    alert("Cita eliminada correctamente");
                                     divMenuDinamico.setAttribute("TipoMenu","Doctores_PanelPrincipal_Pacientes");
                             divMenuDinamico.innerHTML = xhrEliminarCita.responseText;
                                }
                           
                
                            } else {
                             
                                alert("Error del servidor. Código de estado: " + xhrEliminarCita.status);
                            }
                        }
                    };
                    
                    
                    xhrEliminarCita.send("idCita="+encodeURIComponent(idCitaEliminar)+"&fecha="+encodeURIComponent(fechaCitaRec)); 
    
}
if (e.target.matches("[btnAgendarCita]"))
{
        let fechaCitaRecuperada=e.target.getAttribute("fechaCita");
        let horaCitaRecuperada=e.target.getAttribute("horaCita");
        let ElementoSeleccionPaciente=document.createElement("div");
        ElementoSeleccionPaciente.classList.add("DoctoresAgregarCitaSeleccionPaciente");
            ElementoSeleccionPaciente.innerHTML=`<p>Seleccione un paciente para agendarlo</p>
            <select class='DoctoresAgregarCitaSeleccionPaciente_select'>
            </select>
            <div class='DoctoresAgregarCitaSeleccionPaciente_ContenedorBotones'>
            <button DoctoresAgendarCita='Agendar'>Agendar la cita</button>
            <button DoctoresAgendarCita='Cancelar'>Cancelar</button>
            </div>`;
document.body.appendChild(ElementoSeleccionPaciente);
let elementoSelectpacientes=document.querySelector("[class='DoctoresAgregarCitaSeleccionPaciente_select']");
let btnaceptarAgregar=document.querySelector("[DoctoresAgendarCita='Agendar']");
let btnCancelarAgregar=document.querySelector("[DoctoresAgendarCita='Cancelar']");

let xhr = new XMLHttpRequest();
xhr.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_AdministrarCitas/SelectRecuperarPacientes.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) { 
        if (xhr.status === 200) { 
            elementoSelectpacientes.innerHTML=xhr.responseText;

        } else {
         
            alert("Error del servidor. Código de estado: " + xhr.status);
        }
    }
};


xhr.send(); 

btnaceptarAgregar.addEventListener("click",function()
{

    let xhr = new XMLHttpRequest();
xhr.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_AdministrarCitas/AgendarCita.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) { 
        if (xhr.status === 200) { 
            
            if (xhr.responseText=="false")
            {
                alert("No se pudo registrar el paciente intentelo de nuevo");
            }
            else {
                alert("Cita registrada con exito");
                objmenuDinamico.innerHTML=xhr.responseText;
                document.body.removeChild(ElementoSeleccionPaciente);
            }
        } else {
         
            alert("Error del servidor. Código de estado: " + xhr.status);
        }
    }
};

let data="fechaCita="+encodeURIComponent(fechaCitaRecuperada)
+"&horaCita="+encodeURIComponent(horaCitaRecuperada)
+"&curpPaciente="+encodeURIComponent(elementoSelectpacientes.value);
xhr.send(data); 
});

btnCancelarAgregar.addEventListener("click",function()
{
    document.body.removeChild(ElementoSeleccionPaciente);
});

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
