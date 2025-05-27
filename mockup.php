

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>HelpNet - Solicitud de Ayuda</title>
  <link rel="stylesheet" href="mockup.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  />
</head>
<body>
  <div class="app-container">
    <div class="header">
      <i class="fas fa-user-cog"></i>
      <h1>Solicitud de Ayuda</h1>
    </div>

    <form class="form-section" action="procesar_solicitud.php" method="post">
      <label for="especialidad">Especialidad:</label>
      <select id="especialidad" name="especialidad" required>
        <option value="">Selecciona una especialidad</option>
        <option value="carpinteria">Carpintería</option>
        <option value="jardineria">Cerrajería</option>
        <option value="plomeria">Plomería</option>
        <option value="electricidad">Electricidad</option>
        <option value="otros">Otros</option>
      </select>

      <label for="problema">Describe el problema:</label>
      <textarea
        id="problema"
        name="problema"
        placeholder="Describe el problema..."
        required
      ></textarea>

      <label for="fecha">Fecha y Hora:</label>
      <input type="datetime-local" id="fecha" name="fecha" required />

      <label for="contacto">Método de Contacto:</label>
      <select id="contacto" name="contacto" required>
        <option value="">Seleccione un método de contacto</option>
        <option value="videollamada">Videollamada</option>
        <option value="llamada">Llamada de Voz</option>
      </select>

      <label for="pago">Método de Pago:</label>
      <select id="pago" name="pago" required>
        <option value="">Seleccione un método de pago</option>
        <option value="tarjeta">Tarjeta de Crédito/Débito</option>
        <option value="paypal">PayPal</option>
        <option value="nequi">Nequi</option>
      </select>

      <button class="button-primary" type="submit">Enviar solicitud</button>
    </form>
  </div>
</body>
</html>

 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre     = $_POST["nombre"];
    $correo     = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    $conn = new mysqli("localhost", "root", "", "helpnett");

    if ($conn->connect_error) {
        die("❌ Error de conexión: " . $conn->connect_error);
    }

    $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, correo, contrasena)
            VALUES ('$nombre', '$correo', '$contrasena_cifrada')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>✅ Usuario registrado correctamente.</h2>";
        echo "<a href='login.php'>Ir al login</a>";
    } else {
        if ($conn->errno == 1062) {
            echo "<h3>❌ Este correo ya está registrado. Intenta con otro.</h3>";
            echo "<a href='registro.php'>Volver al registro</a>";
        } else {
            echo "❌ Error: " . $conn->error;
        }
    }

    $conn->close();
}
?>