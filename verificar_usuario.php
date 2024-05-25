<?php
// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Validar los datos contra la base de datos (debes implementar esta lógica)

// Simulación de validación (reemplaza esta parte con tu lógica de validación)
if ($username === "usuario" && $password === "contraseña") {
    $response = array("success" => true);
} else {
    $response = array("success" => false);
}

// Devolver respuesta JSON al cliente
header('Content-Type: application/json');
echo json_encode($response);
?>
