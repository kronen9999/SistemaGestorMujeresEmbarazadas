document.addEventListener("DOMContentLoaded",function(e)
{
const opcionMenuPerfil=document.querySelector('[opcionMenu="botonPerfil"]');
const opcionMenuHome=document.querySelector('[opcionMenu="botonHome"]');
const divMenuDinamico=document.querySelector('[class="Menu_Dinamico"]');
const pTitulo=document.querySelector('[Apartado="titulo"]');

opcionMenuPerfil.addEventListener("click",function(e)
{
    if (this.getAttribute("botonSeleccionado")=="false")
    {
   divMenuDinamico.setAttribute("TipoMenu","Doctores_Perfil");
   this.setAttribute("botonSeleccionado","true");
   opcionMenuHome.setAttribute("botonSeleccionado","false");
   pTitulo.textContent="Panel perfil";
   divMenuDinamico.innerHTML=`Se selecciono el panel de perfil`;
alert("el boton se ha presionado");

    }

});

opcionMenuHome.addEventListener("click", function (e) {
    if (this.getAttribute("botonSeleccionado") === "false") {
        divMenuDinamico.setAttribute("TipoMenu", "Doctores_PanelPrincipal");
        this.setAttribute("botonSeleccionado", "true");
        opcionMenuPerfil.setAttribute("botonSeleccionado", "false");
        pTitulo.textContent = "Panel Principal";

    }
});






});