<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $especialidad = $_POST["especialidad"];
    $problema     = $_POST["problema"];
    $fecha        = $_POST["fecha"];
    $contacto     = $_POST["contacto"];
    $pago         = $_POST["pago"];

    require_once("conexion.php"); // Usa la conexión correcta

    $sql = "INSERT INTO solicitudes (especialidad, problema, fecha, contacto, pago)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $especialidad, $problema, $fecha, $contacto, $pago);

    if ($stmt->execute()) {
        echo "<h2>✅ ¡Solicitud registrada con éxito!</h2>";
        echo "<a href='index.php'>Volver al inicio</a>";
    } else {
        echo "❌ Error al registrar la solicitud: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>