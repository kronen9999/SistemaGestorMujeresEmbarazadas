document.addEventListener("DOMContentLoaded",function(e)
{
const opcionMenuPerfil=document.querySelector('[opcionMenu="botonPerfil"]');
const opcionMenuClinicas=document.querySelector('[opcionMenu="botonClinicas"]');
const opcionMenuPacientes=document.querySelector('[opcionMenu="botonPacientes"]');
const opcionMenuDoctores=document.querySelector('[opcionMenu="botonDoctores"]');
const divMenuDinamico=document.querySelector('[class="Menu_Dinamico"]');
const pTitulo=document.querySelector('[Apartado="titulo"]');

opcionMenuPerfil.addEventListener("click",function(e)
{
    if (this.getAttribute("botonSeleccionado")=="false")
    {
   divMenuDinamico.setAttribute("TipoMenu","Informacion_Administrador");
   this.setAttribute("botonSeleccionado","true");
   opcionMenuClinicas.setAttribute("botonSeleccionado","false");
   opcionMenuPacientes.setAttribute("botonSeleccionado","false");
   opcionMenuDoctores.setAttribute("botonSeleccionado","false");
   pTitulo.textContent="Informacion Perfil";
   const xhr = new XMLHttpRequest();
   xhr.open('POST', '../Controllers/Ajax/PanelAdministrador/MenuLateral/MostrarPerfil.php', true);
   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   
   xhr.onreadystatechange = function() {
       if (xhr.readyState === 4) { 
           if (xhr.status === 200) { 
               
               divMenuDinamico.innerHTML = xhr.responseText;
           } else {
            
               alert("Error del servidor. Código de estado: " + xhr.status);
           }
       }
   };
   
   
   xhr.send();
   

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
       pTitulo.textContent="Administrar clinicas";
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
       pTitulo.textContent="Administrar Pacientes";
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
       pTitulo.textContent="Administrar Doctores";
        }
});




});