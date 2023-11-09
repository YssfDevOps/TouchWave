function selectMarca(element) {
    // Comprueba si la marca ya está seleccionada
    if (element.classList.contains('selected')) {
        // Si la marca ya está seleccionada, deselecciónala y borra los productos
        element.classList.remove('selected');
        document.getElementById('productos').innerHTML = '';
    } else {
        // Si la marca no está seleccionada, deselecciona todas las marcas
        document.querySelectorAll('.marca').forEach(function(marca) {
            marca.classList.remove('selected');
        });

        // Selecciona la marca y carga los productos
        element.classList.add('selected');
        loadProductos(element.id);
    }
}

function toggleMenu() {
    let subMenu = document.getElementById("subMenu");
    subMenu.classList.toggle("open-menu");
}