<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flatpickr Calendario Personalizado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script> <!-- Idioma Español -->
    <style>
        /* Cambiar el tamaño del contenedor del calendario */
        #calendario {
            width: 600px; /* Cambiar el ancho del calendario */
            margin: 20px auto; /* Centrar */
        }

        /* Cambiar tamaño de fuente en el calendario */
        .flatpickr-calendar {
            font-size: 16px; /* Ajustar tamaño de fuente */
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Cambiar tamaño de los días del calendario */
        .flatpickr-day {
            height: 40px; /* Altura de cada celda */
            width: 40px; /* Ancho de cada celda */
            line-height: 40px; /* Centrado vertical */
        }

        /* Opcional: Ajustar el estilo de los días seleccionados */
        .flatpickr-day.selected {
            background-color: #007BFF; /* Color de fondo */
            color: white; /* Color de texto */
            border-radius: 50%; /* Forma circular */
        }
    </style>
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