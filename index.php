<!DOCTYPE html>
<html>
    <head>
      <title>Menu principal</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="Public/Css/Index/index.css">
    </head>
    <body>
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
    </body>
</html>