document.addEventListener("DOMContentLoaded",function(e)
{
const opcionMenuPerfil=document.querySelector('[opcionMenu="botonPerfil"]');
const opcionMenuHome=document.querySelector('[opcionMenu="botonHome"]');
const divMenuDinamico=document.querySelector('[class="Menu_Dinamico"]');
const pTitulo=document.querySelector('[Apartado="titulo"]');



opcionMenuHome.addEventListener("click", function (e) {
    if (this.getAttribute("botonSeleccionado") === "false") {
        divMenuDinamico.setAttribute("TipoMenu", "Doctores_PanelPrincipal");
        this.setAttribute("botonSeleccionado", "true");
        opcionMenuPerfil.setAttribute("botonSeleccionado", "false");
        pTitulo.textContent = "Panel Principal";

    }
});






});