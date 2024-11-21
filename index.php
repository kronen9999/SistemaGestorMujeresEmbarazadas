<!DOCTYPE html>
<html>
    <head>
      <title>Menu principal</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="Public/Css/Index/index.css">
    </head>
    <body login="Doctor">
       <img src="Public/Assets/InicioSesion_Doctores_Fondo.png" alt="ImgDoctor" class="img_sesion"> 
       <div class="div_SesionContenido">
        <p id="p_inicioSesion">Inicio de sesion</p>
        <img src="Public/Assets/InicioSesion_Doctores_IconoDoctor.png" alt="IconoDoctor" class="IconoSesion">
       <p>Usuario:</p>
       <input type="text" maxlength="100" placeholder="Ingrese su cedula o correo electronico" class="input_sesion" required>
       <p>Contraseña:</p>
       <input type="password"  placeholder="Ingrese su contraseña" class="input_sesion" required>
       <div class="div_rec">
       <span id="span1">¿Olvidaste tu contraseña?</span><span id="span2">Da click aqui para recuperarla</span>
       </div>
       <button type="button">Iniciar sesion</button>
       </div>
       <div id="div_Menu_Acotacion">
        <p>
          Elija otro inicio de sesion
        </p>
        <div id="ImagenMenu_Acotacion">
        <img src="Public/Assets/InicioSesion_Seleccion.png" alt="imagenMenu">
        </div>
       </div>
       <div class="div_Menu_Seleccion" Menuvisible="0">
        <div apartadoMenu="Paciente" divOpcion="1" >
          <p opcion="1" valor="Paciente">Como paciente</p>
          <img src="Public/Assets/InicioSesion_Pacientes_IconoPaciente.png" alt="Icono paciente" imgOpcion="1" >
        </div>
        <div apartadoMenu="Administrador" divOpcion="2" >
          <p opcion="2" valor="Administrador">Como Administrador</p>
        <img src="Public/Assets/InicioSesion_Administrador_IconoAdministrador.png" alt="Icono Administrador" imgOpcion="2" >
        <script src="Public/Javascript/Index/Manejomenu.js" defer></script>
        </div>
        </div>
    </body>
</html>