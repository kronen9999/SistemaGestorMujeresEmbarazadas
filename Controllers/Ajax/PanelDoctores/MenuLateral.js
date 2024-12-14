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


   /*
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
   
*/
    }

});

opcionMenuHome.addEventListener("click", function (e) {

  //  if (this.getAttribute("botonSeleccionado") === "false") {
        divMenuDinamico.setAttribute("TipoMenu", "Doctores_PanelPrincipal");
        this.setAttribute("botonSeleccionado", "true");
        opcionMenuPerfil.setAttribute("botonSeleccionado", "false");
        pTitulo.textContent = "Panel Principal";

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../Controllers/Ajax/PanelDoctores/MostrarPanelDoctor.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    divMenuDinamico.innerHTML = xhr.responseText;

                    
                    flatpickr("#Calendario", {
                        inline: true,
                        dateFormat: "Y-m-d",
                        locale: "es",
                        onChange: function (selectedDates, dateStr) {
                            
    let xhr2 = new XMLHttpRequest();
    xhr2.open('POST', '../Controllers/Ajax/PanelDoctores/Doctores_AdministrarCitas/MostrarCitas.php', true);
    xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr2.onreadystatechange = function() {
        if (xhr.readyState === 4) { 
            if (xhr.status === 200) { 
            objmenuDinamico.setAttribute("TipoMenu","Doctores_PanelPrincipal_Pacientes");
             objmenuDinamico.innerHTML = xhr2.responseText;

            } else {
             
                alert("Error del servidor. Código de estado: " + xhr2.status);
            }
        }
    };
    
    
    xhr2.send("fecha="+encodeURIComponent(dateStr)); 
                        },
                    });
                } else {
                    alert("Error del servidor. Código de estado: " + xhr.status);
                }
            }
        };

        xhr.send();
    //}
});






});