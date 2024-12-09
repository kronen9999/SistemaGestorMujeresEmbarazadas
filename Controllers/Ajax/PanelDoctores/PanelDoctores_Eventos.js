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
                
             objmenuDinamico.innerHTML = xhr.responseText;
            } else {
             
                alert("Error del servidor. Código de estado: " + xhr.status);
            }
        }
    };
    
    
    xhr.send(); 
    
}

}

});
