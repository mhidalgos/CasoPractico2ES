<?php
//Almacenamiento de preferencias en cookies
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    setcookie('language', $_POST['language'], time() + (30 * 24 * 60 * 60), '/');
    setcookie('theme', $_POST['theme'], time() + (30 * 24 * 60 * 60), '/');
    header('Location: preferencias.php');
    exit();
}

//Obtener preferencias
$language = $_COOKIE['language'] ?? 'es';
$theme = $_COOKIE['theme'] ?? 'light';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Preferencias del Usuario</h1>
    </header>
    <div class="search-container">
        <form method="POST" action="">
            <label for="language">Idioma:</label>
            <select id="language" name="language">
                <option value="es" <?php echo $language === 'es' ? 'selected' : ''; ?>>Español</option>
                <option value="en" <?php echo $language === 'en' ? 'selected' : ''; ?>>Inglés</option>
            </select>
            <label for="theme">Tema:</label>
            <select id="theme" name="theme">
                <option value="light" <?php echo $theme === 'light' ? 'selected' : ''; ?>>Claro</option>
                <option value="dark" <?php echo $theme === 'dark' ? 'selected' : ''; ?>>Oscuro</option>
            </select>
            <button type="submit">Guardar Preferencias</button>
        </form>
    </div>
    <div class="search-container">
        <a href="productos.php"><button>Volver a Productos</button></a>
    </div>
    <footer>
        <p>© 2024. Todos los derechos reservados</p>
    </footer>
</body>
</html>
