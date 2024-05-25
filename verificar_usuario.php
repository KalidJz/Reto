<?php
// Establecer la conexión PDO para Access
$dbPath = 'access.mdb';
$pdo = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$dbPath; Uid=; Pwd=;");

// Verificar si se enviaron datos del formulario
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Obtener los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Preparar la consulta SQL
    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?";
    $statement = $pdo->prepare($sql);

    // Ejecutar la consulta con los valores proporcionados por el formulario
    $statement->execute([$username, $password]);

    // Obtener los resultados
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    // Verificar los resultados
    if ($result) {
        // Usuario y contraseña válidos
        header("Location: menu.html"); // Redirigir al menú principal
        exit();
    } else {
        // Usuario y/o contraseña inválidos
        echo "Usuario y/o contraseña incorrectos";
    }
} else {
    // Redirigir si no se enviaron datos del formulario
    header("Location: login.html");
    exit();
}
?>
