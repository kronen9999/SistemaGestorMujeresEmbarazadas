<?php
// Incluir archivos necesarios
include("../../../Models/Index/ValidacionLogin.php");
include("../../../config.php");

$objValidar = new ValidacionUsuario();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $usuario = $_POST['usuario'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';
    $tipoLogin = $_POST['tipoLogin'] ?? '';

    
    if (empty($usuario) || empty($contraseña) || empty($tipoLogin)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Todos los campos son obligatorios.'
        ]);
        exit;
    }

   
    $resultado = $objValidar->ConsultaDb($tipoLogin, $usuario, $usuario, $contraseña, $conexiondb);

    
    if ($resultado == "true" && $tipoLogin == "Administrador") {
        echo json_encode([
            'status' => 'success',
            'redirect' => '/Integrador7/SistemaGestorMujeresEmbarazadas/Views/PanelAdministrador.php'
        ]);
    } else if ($resultado == "true" && $tipoLogin == "Doctor") {
        echo json_encode([
            'status' => 'success',
            'redirect' => '/Integrador7/SistemaGestorMujeresEmbarazadas/Views/PanelMedicos.php'
        ]);
    } else if ($resultado == "true" && $tipoLogin == "Paciente") {
        echo json_encode([
            'status' => 'success',
            'message' => 'Se accedió como paciente'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Usuario o contraseña incorrectos.'
        ]);
    }
    exit;
} else {
    
    echo json_encode([
        'status' => 'error',
        'message' => 'Método no permitido.'
    ]);
    exit;
}
?>
