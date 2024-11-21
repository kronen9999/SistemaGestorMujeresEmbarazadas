const botonMenu=document.querySelector('[id="div_Menu_Acotacion"]');

const menuDesplegable=document.querySelector('[class="div_Menu_Seleccion"]');

const menuDesplegable_opcion1=document.querySelector('[divOpcion="1"]');
const menuDesplegable_opcion2=document.querySelector('[divOpcion="2"]');

botonMenu.addEventListener("click",function(){
    menuDesplegable.setAttribute("Menuvisible","1");
   
    
});

document.addEventListener("DOMContentLoaded", function() {
    document.addEventListener("click", function(evento) {
        let inputs=document.querySelectorAll("input");
    
        TipoSesion="";
        eventoClick=evento.target;
        if (botonMenu!=eventoClick && menuDesplegable.getAttribute("Menuvisible")=="1"){
            menuDesplegable.setAttribute("Menuvisible","0")
        
        }
        
       if (menuDesplegable_opcion1==eventoClick)
       {
        TipoSesion=menuDesplegable_opcion1.getAttribute("apartadoMenu");
        inputs[0].value="";
        inputs[1].value="";
       }
       else if (menuDesplegable_opcion2==eventoClick)
        {
            TipoSesion=menuDesplegable_opcion2.getAttribute("apartadoMenu");
            inputs[0].value="";
        inputs[1].value="";
        }
        
        cambioMenu(TipoSesion);
        
        
        
    });
});

function  cambioMenu(TipoInicio)
{
    let imagenSesionCambio=document.querySelector('[class="IconoSesion"]');
    let imgIconoCambio=document.querySelector('[class="img_sesion"]');
    let UsuarioImput=document.querySelector('[type="text"]');
    let recuperarContraseña=document.querySelector('[id="span2"]');
    let butonMenu=document.querySelector('[type="button"]');
    let divMenu=document.querySelector('[id="ImagenMenu_Acotacion"]');
    let opcion1Menu=document.querySelector('[opcion="1"]');
    let opcion2Menu=document.querySelector('[opcion="2"]');
    let opcion1MenuImg=document.querySelector('[imgOpcion="1"]');
    let opcion2MenuImg=document.querySelector('[imgOpcion="2"]');
    if (TipoInicio=="Paciente")
        {
            imagenSesionCambio.src="Public/Assets/InicioSesion_Pacientes_IconoPaciente.png";
            imgIconoCambio.src="Public/Assets/InicioSesion_Pacientes_Fondo.jpeg";
            UsuarioImput.placeholder="Ingrese su curp o su correo";
            recuperarContraseña.style.color="#FF00E6";
            butonMenu.style.backgroundColor="#F7C5C8";
            divMenu.style.backgroundColor="#F8C7CA";
            opcion1Menu.textContent="Como administrador";
            opcion2Menu.textContent="Como Doctor";
            opcion1MenuImg.src="Public/Assets/InicioSesion_Administrador_IconoAdministrador.png";
            opcion2MenuImg.src="Public/Assets/InicioSesion_Doctores_IconoDoctor.png";
            menuDesplegable_opcion1.setAttribute("apartadoMenu","Administrador");
            menuDesplegable_opcion2.setAttribute("apartadoMenu","Doctor");
        }
        else if (TipoInicio=="Administrador")
        {
            imagenSesionCambio.src="Public/Assets/InicioSesion_Administrador_IconoAdministrador.png";
            imgIconoCambio.src="Public/Assets/InicioSesion_Administradores_Fondo.jpg";
            UsuarioImput.placeholder="Ingrese su No trabajador o su correo";
            recuperarContraseña.style.color="#44BF64";
            butonMenu.style.backgroundColor="#45BF64";
            divMenu.style.backgroundColor="#44BF64";
            opcion1Menu.textContent="Como Doctor";
            opcion2Menu.textContent="Como Paciente";
            opcion1MenuImg.src="Public/Assets/InicioSesion_Doctores_IconoDoctor.png";
            opcion2MenuImg.src="Public/Assets/InicioSesion_Pacientes_IconoPaciente.png";
            menuDesplegable_opcion1.setAttribute("apartadoMenu","Doctor");
            menuDesplegable_opcion2.setAttribute("apartadoMenu","Paciente");
        }
        else if (TipoInicio=="Doctor")
        {
            imagenSesionCambio.src="Public/Assets/InicioSesion_Doctores_IconoDoctor.png";
            imgIconoCambio.src="Public/Assets/InicioSesion_Doctores_Fondo.png";
            UsuarioImput.placeholder="Ingrese su cedula o su correo";
            recuperarContraseña.style.color="#0090C7";
            butonMenu.style.backgroundColor="#0098CF";
            divMenu.style.backgroundColor="#018EC6";
            opcion1Menu.textContent="Como Administrador";
            opcion2Menu.textContent="Como Paciente";
            opcion1MenuImg.src="Public/Assets/InicioSesion_Administrador_IconoAdministrador.png";
            opcion2MenuImg.src="Public/Assets/InicioSesion_Pacientes_IconoPaciente.png";
            menuDesplegable_opcion1.setAttribute("apartadoMenu","Administrador");
            menuDesplegable_opcion2.setAttribute("apartadoMenu","Paciente");
        }

        

}
