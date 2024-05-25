<?php
$dbName = './datos.accdb';
$user = '';
$password = '';

// Intentar establecer la conexión
try {
    $pdo = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=$dbName", $user, $password);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}

// Ejemplo de consulta SQL
$sql = "SELECT * FROM users";
$resultado = $pdo->query($sql);

// Procesar resultados y mostrar en HTML
echo "<table border='1'>
        <tr>
            <th>Columna1</th>
            <th>Columna2</th>
            <!-- Agrega más columnas según tu estructura de base de datos -->
        </tr>";

while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $fila['Columna1'] . "</td>";
    echo "<td>" . $fila['Columna2'] . "</td>";
    // Agrega más celdas según tu estructura de base de datos
    echo "</tr>";
}

echo "</table>";

// Cerrar la conexión
$pdo = null;
?>
