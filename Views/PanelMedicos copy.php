<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flatpickr Calendario Personalizado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script> <!-- Idioma Español -->
</head>
<body>
    <div id="calendario"></div> <!-- Contenedor del calendario -->

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            flatpickr("#calendario", {
                inline: true, // Mostrar calendario directamente
                dateFormat: "Y-m-d", // Formato de fecha
                locale: "es", // Idioma español
                onChange: function(selectedDates, dateStr) {
                    alert(`Seleccionaste la fecha: ${dateStr}`); // Mostrar alerta con la fecha seleccionada
                }
            });
        });
    </script>
    
</body>
</html>

<?php


?>