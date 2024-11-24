<?php
session_start();

//Funcionalidad para vaciar el carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    header('Location: carrito.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Carrito de Compras</h1>
    </header>
    <div class="product-grid">
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <div class="product">
                    <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                    <p>Precio: $<?php echo htmlspecialchars($item['price']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>El carrito está vacío.</p>
        <?php endif; ?>
    </div>
    <form method="POST" action="" class="search-container">
        <button type="submit" name="clear_cart">Vaciar Carrito</button>
    </form>
    <div class="search-container">
        <a href="productos.php"><button>Volver a Productos</button></a>
    </div>
    <footer>
        <p>© 2024. Todos los derechos reservados</p>
    </footer>
</body>
</html>

