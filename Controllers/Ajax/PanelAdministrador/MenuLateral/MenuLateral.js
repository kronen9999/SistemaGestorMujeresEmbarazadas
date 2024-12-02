document.addEventListener("DOMContentLoaded",function(e)
{
const opcionMenuPerfil=document.querySelector('[opcionMenu="botonPerfil"]');
const opcionMenuClinicas=document.querySelector('[opcionMenu="botonClinicas"]');
const opcionMenuPacientes=document.querySelector('[opcionMenu="botonPacientes"]');
const opcionMenuDoctores=document.querySelector('[opcionMenu="botonDoctores"]');
const divMenuDinamico=document.querySelector('[class="Menu_Dinamico"]');

opcionMenuPerfil.addEventListener("click",function(e)
{
    if (this.getAttribute("botonSeleccionado")=="false")
    {
   divMenuDinamico.setAttribute("TipoMenu","Informacion_Administrador");
   this.setAttribute("botonSeleccionado","true");
   opcionMenuClinicas.setAttribute("botonSeleccionado","false");
   opcionMenuPacientes.setAttribute("botonSeleccionado","false");
   opcionMenuDoctores.setAttribute("botonSeleccionado","false");
   divMenuDinamico.innerHTML=` <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1'>
                <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_DivImg'>
                   <img src='../Public/Assets/Icono_Administrador_Perfil.png' alt='IconoAdmin'> 
                </div>
                <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1'>
                    <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
                      <p>
                         Nombre:
                      </p>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
                      <input type='text'  class='input_Nombre' placeholder='Ingrese su nombre' id='Perfil_Nombre' value='$nombre' InfoPerfilInput='nombre'>  
                      </div> 
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
                      <p>
                         Apellido paterno:
                      </p>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
                      <input type='text'  class='input_Nombre' placeholder='Ingrese su apellido paterno' id='Perfil_ApellidoPaterno' value='$apellidoPaterno' InfoPerfilInput='apellidoP'>  
                      
                      </div>
                    </div>
                    <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
                      <p>
                         Apellido Materno:
                      </p>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
                      <input type='text'  class='input_Nombre' placeholder='Ingrese su apellido materno' id='Perfil_ApellidoMaterno' value='$apellidoMaterno' InfoPerfilInput='apellidoM'>  
                      
                      </div>
                </div>
            </div>
        
        </div>
        </div>
        <div class='Menu_Dinamico_AdministrarPerfil_SubApartado2'>
            <div class='Menu_Dinamico_AdministrarPerfil_SubApartado2_Div1'>
            <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
                      <p>
                         Numero trabajador:
                      </p>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
                      <input type='text' class='input_Nombre' placeholder='Ingrese su numero de trabajador' id='Perfil_Notrabajador' value='$numeroTrabajador' InfoPerfilInput='noTrabajador'>

                      
                      </div> 
                      </div>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
                      <p>
                         Telefono:
                      </p>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
                      <input type='text'  class='input_Nombre' placeholder='Ingrese su Telefono' id='Perfil_Telefono' value='$telefono' InfoPerfilInput='telefono'>  
                      
                      </div> 
                      </div>
            </div>
            <div class='Menu_Dinamico_AdministrarPerfil_SubApartado2_Div2'>
            <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
                      <p>
                         Contraseña:(Requiere autenticacion)
                      </p>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
                      <input type='password'  class='input_Nombre' placeholder='Ingrese su contraseña' id='Perfil_Contraseña' value='$contraseña'>  
                      <img src='../Public/Assets/Icono_Editar.png' alt='IconoEditarImputs'>
                      </div> 
                      </div>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
                      <p>
                         Correo Electronico:
                      </p>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
                      <input type='text'  class='input_Nombre' placeholder='Ingrese su Correo electronico' id='Perfil_Correo_Electronico' value='$correoElectronico' InfoPerfilInput='correoE'>  
                     
                      </div> 
                      </div>
            </div>
        </div>
        
       <div class='Menu_Dinamico_AdministrarPerfil_SubApartadoSubmit'>
       <button class='Menu_Dinamico_AdministrarPerfil_SubApartadoSubmit_button' referencia='InfoPerfil_BotonSubmit'>Guardar cambios</button>
       <div> `;
    }

});
opcionMenuClinicas.addEventListener("click",function(e)
{
    if (this.getAttribute("botonSeleccionado")=="false")
        {
       divMenuDinamico.setAttribute("TipoMenu","Administrar_Clinicas");
       this.setAttribute("botonSeleccionado","true");
       opcionMenuPerfil.setAttribute("botonSeleccionado","false");
       opcionMenuPacientes.setAttribute("botonSeleccionado","false");
       opcionMenuDoctores.setAttribute("botonSeleccionado","false");
       divMenuDinamico.innerHTML=`<p>Se modifico</p>`;
        }
    
});
opcionMenuPacientes.addEventListener("click",function(e)
{
    if (this.getAttribute("botonSeleccionado")=="false")
        {
       divMenuDinamico.setAttribute("TipoMenu","Administrar_Pacientes");
       this.setAttribute("botonSeleccionado","true");
       opcionMenuClinicas.setAttribute("botonSeleccionado","false");
       opcionMenuPerfil.setAttribute("botonSeleccionado","false");
       opcionMenuDoctores.setAttribute("botonSeleccionado","false");
        }
});
opcionMenuDoctores.addEventListener("click",function(e)
{
    if (this.getAttribute("botonSeleccionado")=="false")
        {
       divMenuDinamico.setAttribute("TipoMenu","Administrar_Doctores");
       this.setAttribute("botonSeleccionado","true");
       opcionMenuClinicas.setAttribute("botonSeleccionado","false");
       opcionMenuPacientes.setAttribute("botonSeleccionado","false");
       opcionMenuPerfil.setAttribute("botonSeleccionado","false");
        }
});




});