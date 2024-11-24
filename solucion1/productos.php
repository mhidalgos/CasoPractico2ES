<?php
session_start();

//Inicialización del array para almacenar los productos
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

//Funcionalidad para añadir productos al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product = [
        'id' => $_POST['product_id'],
        'name' => $_POST['product_name'],
        'price' => $_POST['product_price']
    ];
    $_SESSION['cart'][] = $product;
    header('Location: carrito.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos La Siberia</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Productos La Siberia</h1>
    </header>
    <div class="search-container">
        <input type="text" placeholder="Buscar...">
        <button>Buscar</button>
    </div>
    <div class="product-grid">
        <div class="product">
            <img src="images/Miel.webp" alt="Miel Villuercas-Ibores">
            <h3>Miel Villuercas-Ibores</h3>
            <p>Sabor dulce para acompañar tus quesos y frutos secos favoritos y aliñar ensaladas. 500g</p>
            <form method="POST" action="">
                <input type="hidden" name="product_id" value="1">
                <input type="hidden" name="product_name" value="Miel Villuercas-Ibores">
                <input type="hidden" name="product_price" value="20">
                <button type="submit">Añadir al Carrito</button>
            </form>
        </div>
        <div class="product">
            <img src="images/Jamon.jpeg" alt="Jamón Ibérico de Bellota">
            <h3>Jamón Ibérico de Bellota. DO Extremadura</h3>
            <p>Jamón Ibérico de Bellota con Denominación de Origen Dehesa de Extremadura certificado. 7-8kg</p>
            <form method="POST" action="">
                <input type="hidden" name="product_id" value="2">
                <input type="hidden" name="product_name" value="Jamón Ibérico de Bellota">
                <input type="hidden" name="product_price" value="120">
                <button type="submit">Añadir al Carrito</button>
            </form>
        </div>
        <div class="product">
            <img src="images/queso.jpeg" alt="Torta de oveja">
            <h3>Torta de oveja D.O.P. La Serena</h3>
            <p>Queso de pasta blanda a semidura elaborado con leche de oveja de la raza merina. 700-900g</p>
            <form method="POST" action="">
                <input type="hidden" name="product_id" value="3">
                <input type="hidden" name="product_name" value="Torta de oveja D.O.P. La Serena">
                <input type="hidden" name="product_price" value="30">
                <button type="submit">Añadir al Carrito</button>
            </form>
        </div>
    </div>
    <div class="search-container">
        <a href="carrito.php"><button>Ir al Carrito</button></a>
        <a href="preferencias.php"><button>Ir a Preferencias</button></a>
    </div>
    <footer>
        <p>© 2024. Todos los derechos reservados</p>
    </footer>
</body>
</html>
