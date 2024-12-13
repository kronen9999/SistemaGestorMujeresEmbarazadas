<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Doctores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script> <!-- Idioma Español -->
    <link rel="stylesheet" href="../Public/Css/PanelDoctores/Doctores.css">
</head>
<body>    
<header class="cabezera">
            <p Apartado="titulo">Panel Principal</p>
            <img src="../Public/Assets/Doctores_Icono_Perfilpng.png" alt="Icono_Doctor">
        </header>
        <div class="menuLateral">
        <div class="botonMenu" botonSeleccionado="true" opcionMenu="botonHome">
        <img src="../Public/Assets/IconoHome.png" alt="IconoApartado">
        </div>
        <div class="botonMenu" botonSeleccionado="false" opcionMenu="botonPerfil">
        <img src="../Public/Assets/Icono_Administrador_Perfil.png" alt="IconoApartado">
        </div>
        <a href="../index.php">
          <div class="botonMenu" botonSeleccionado="false" >
        <img src="../Public/Assets/Icono_CerrarSesion.png" alt="IconoApartado" botonSeleccionado="false">
        </div>
        </a>
        </div>
        <div class="Menu_Dinamico" TipoMenu="Doctores_PanelPrincipal">
    <script>
       let xhr = new XMLHttpRequest();
        xhr.open("POST", "../Controllers/Ajax/PanelDoctores/MostrarPanelDoctor.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                  divMenuDinamico=document.querySelector(".Menu_Dinamico");
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
            divMenuDinamico.setAttribute("TipoMenu","Doctores_PanelPrincipal_Pacientes");
             divMenuDinamico.innerHTML = xhr2.responseText;

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
    </script>

<script>flatpickr("#Calendario", {
                        inline: true,
                        dateFormat: "Y-m-d",
                        locale: "es",
                        onChange: function (selectedDates, dateStr) {
                            alert("Seleccionaste la fecha: " + dateStr);
                        },
                    })</script>
        
        </div>
        <script src="../Controllers/Ajax/PanelDoctores/MenuLateral.js" defer></script>
        <script src="../Controllers/Ajax/PanelDoctores/PanelDoctores_Eventos.js"></script>
</body>
</html>

<?php


?>