//Agregar productos al carrito (SessionStorage)
function agregarAlCarrito(idProducto, nombreProducto, precioProducto) {
    let carrito = JSON.parse(sessionStorage.getItem('carrito')) || [];
    carrito.push({ id: idProducto, nombre: nombreProducto, precio: precioProducto });
    sessionStorage.setItem('carrito', JSON.stringify(carrito));
    alert('Producto agregado al carrito');
}

//Mostrar el contenido del carrito(SessionStorage()
function mostrarCarrito() {
    const carrito = JSON.parse(sessionStorage.getItem('carrito')) || [];
    const contenedorCarrito = document.getElementById('contenidoCarrito');
    contenedorCarrito.innerHTML = '';
    if (carrito.length > 0) {
        carrito.forEach(item => {
            const productoDiv = document.createElement('div');
            productoDiv.className = 'product';
            productoDiv.innerHTML = `
                <h3>€{item.nombre}</h3>
                <p>Precio: €${item.precio}</p>
            `;
            contenedorCarrito.appendChild(productoDiv);
        });
    } else {
        contenedorCarrito.innerHTML = '<p>El carrito está vacío.</p>';
    }
}

//Vaciar el carrito
function vaciarCarrito() {
    sessionStorage.removeItem('carrito');
    mostrarCarrito();
    alert('El carrito ha sido vaciado');
}

//Guardar preferencias (LocalStorage)
function guardarPreferencias() {
    const idioma = document.getElementById('idioma').value;
    const tema = document.getElementById('tema').value;
    localStorage.setItem('idioma', idioma);
    localStorage.setItem('tema', tema);
    alert('Preferencias guardadas correctamente');
    document.body.className = tema;
}

//Cargar las preferencias (LocalStorage)
function cargarPreferencias() {
    const idioma = localStorage.getItem('idioma') || 'es';
    const tema = localStorage.getItem('tema') || 'light';
    document.getElementById('idioma').value = idioma;
    document.getElementById('tema').value = tema;
    document.body.className = tema;
}

document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('contenidoCarrito')) {
        mostrarCarrito();
    }
    if (document.getElementById('idioma') && document.getElementById('tema')) {
        cargarPreferencias();
    }
});