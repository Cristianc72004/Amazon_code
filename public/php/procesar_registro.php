<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro de Categoría</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <script src="../js/registro_categoria.js"></script>
</head>
<body>
    <div class="main-content">
        <h2>Registro de Nueva Categoría</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="registroForm" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="nombre">Nombre de la Categoría:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="descripcion">Descripción de la Categoría:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            
            <label for="imagen">Imagen de la Categoría:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" required>
            
            <button type="submit">Registrar Categoría</button>
        </form>
    </div>
</body>
</html>
