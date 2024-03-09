function selectMarca(element, id) {
    // Comprueba si la marca ya está seleccionada
    if (element.classList.contains('selected')) {
        // Si la marca ya está seleccionada, deselecciónala y borra los productos
        element.classList.remove('selected');
        $('#productes').empty();
    } else {
        // Si la marca no está seleccionada, deselecciona todas las marcas
        document.querySelectorAll('.marca').forEach(function(marca) {
            marca.classList.remove('selected');
        });

        // Selecciona la marca y carga los productos
        element.classList.add('selected');
        // Build the URL with the category data as a query parameter
        const url = `index.php?action=productes_per_categoria&category_id=${id}}`;

        // Assuming you have a container div with the id "categories-container"
        const categoriesContainer = document.getElementById('productes');

        fetch(url)
        .then(response => response.text()) // assuming HTML response
        .then(data => {
            // Update the container with the fetched HTML
            categoriesContainer.innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
    }
}

function selectProducte(id)
{
    // Change css
    document.getElementById('stylesheet').href = "vistes/recursos/css/producto.css";
    // Fetch new data
    const url = `index.php?action=detall_producte&product_id=${id}}`;
    fetch(url)
        .then(response => response.text()) // assuming HTML response
        .then(data => {
            // Update the container with the fetched HTML
            document.getElementById('mainContent').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}

function goBack() //Basically undo the selectProducte fetch (using fetch)
{
    // Change css
    document.getElementById('stylesheet').href = "vistes/recursos/css/index.css";
    // Fetch new data
    const url = `index.php?action=categories`;
    fetch(url)
        .then(response => response.text()) // assuming HTML response
        .then(data => {
            // Update the container with the fetched HTML
            document.getElementById('mainContent').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}

$(document).ready(function() {
    // MENU DINAMICO
    $("#menuButton").click(function() {
        // Make an asynchronous call to check if the user is logged in
        $.ajax({
            url: "index.php?action=comprovar_sessio", // replace with your server endpoint
            type: "GET",
            dataType: "text", // adjust the dataType based on your server response
            success: function(response) {
                // Assuming the server response is "True" or "False"
                var userLoggedIn = response.trim().toLowerCase() === "active";
                if (userLoggedIn) {
                    $("#subMenuLog").toggleClass("open-menu");
                    $("#subMenuNoLog").removeClass("open-menu");
                } else {
                    $("#subMenuNoLog").toggleClass("open-menu");
                    $("#subMenuLog").removeClass("open-menu");
                }
            },
            error: function(error) {
                console.error("Error checking login status:", error);
            }
        });
    });

    // Handle menu-related events
    $("#menuButton, .sub-menu-wrap").click( function(event) {
        if (!$(event.target).closest("#menuButton, .sub-menu-wrap").length) {
            $(".sub-menu-wrap").removeClass("open-menu");
        }
    });

    // ALERTAS
    function showAlert(color, message) {
        $('.alert').removeClass('red green'); // Elimina las clases de color existentes
        $('.alert').addClass(color); // Añade la nueva clase de color
        $('.msg').html(message); // Cambia el mensaje
    
        $('.alert').removeClass("hide");
        $('.alert').addClass("show");
        $('.alert').addClass("showAlert");
        setTimeout(function() {
            $('.alert').addClass("hide");
            $('.alert').removeClass("show");
        },5000);
    }
    
    $('.close-btn').click(function() {
        $('.alert').addClass("hide");
        $('.alert').removeClass("show");
    });

    // Function to handle the update
    function updateQuantity(productId, quantity) {
        $.ajax({
            type: 'POST',
            url: 'index.php?action=incrementar_cistella', // Replace with the actual PHP script URL
            data: {
                product_id: productId,
                quantity: quantity
            },
            success: function (response) {
                console.log(response);
                // Check if the server request was successful
                if (response === 'success') {
                    updateHeaderInfo();
                    showAlert("green", "Producto añadido al carrito!")
                    //alert('Quantity updated successfully!');
                } else {
                    showAlert("red", "Cantidad actualizada erroneamente!")
                    //alert('Error updating quantity. Please try again.');
                }
            },
            error: function () {
                showAlert("red", "Error del servidor!")
                //alert('Error making server request.');
            }
        });
    }

    // Function to update header information
    function updateHeaderInfo() {
        $.ajax({
            type: 'GET',
            url: 'index.php?action=get_info_compra',
            dataType: 'json', 
            success: function (headerData) {
                $('#numProducts').text('Numero de productos: ' + headerData.nProducts);
                $('#totalPrice').text('Precio Total: ' + headerData.totalPrice + '$');
            },
            error: function () {
                console.error('Error fetching header information.');
            }
        });
    }

    //Buidar carro
    function emptyCartRequest(callback) {
        $.ajax({
            type: 'GET',
            url: 'index.php?action=empty_cart',
            success: function (response) {
                console.log(response);
                if (response === 'success') {
                    updateHeaderInfo();
                    callback({ success: true, message: "Cart emptied successfully." });
                } else {
                    callback({ success: false, message: "Error emptying the cart." });
                }
            },
            error: function () {
                callback({ success: false, message: "Error occurred during the request." });
            }
        });
    }

    // Function to modify the quantity of the product
    function modifyQuantity(productId, quantity) {
        $.ajax({
            type: 'POST',
            url: 'index.php?action=modificar_cistella', // Replace with the actual PHP script URL
            data: {
                product_id: productId,
                quantity: quantity
            },
            success: function (response) {
                console.log(response);
                console.log(quantity);
                // Check if the server request was successful
                if (response === 'success') {
                    updateHeaderInfo();
                    showAlert("green", "Cantidad actualizada correctamente!")
                } else {
                    showAlert("red", "Cantidad actualizada erroneamente!")
                    //alert('Error updating quantity. Please try again.');
                }
            },
            error: function () {
                showAlert("red", "Error del servidor!")
                //alert('Error making server request.');
            }
        });
    }

    // ALERTAS DINAMICAS
    $(document).scroll(function() {
        var y = $(this).scrollTop(); // Obtiene la posición del scroll
        $('.alert').css('bottom', -650 - y + 'px'); // Actualiza la posición de la alerta
    });

    // Handle add to cart button
    $(document).on('click', '#add-to-cart', function(event) {
        var productId = $(event.target).data('product-id');
        var quantity = $('#quantity').val() || 1;

        updateQuantity(productId, quantity);
    });

    // Handle empty button click
    $(document).on('click', '#empty', function(event) {
        emptyCartRequest(function(result) {
            if (result.success) {
                console.log(result.message);
                mostrarCarrito();
            } else {
                console.log(result.message);
                showAlert("red", "Ha habido un error al vaciar el carrito!")
                //alert("Ha habido un error en vaciar el carrito");
            }
        });
    });

    // Handle erase button click
    $(document).on('click', '#erase', function(event) {
        var productId = $(event.target).data('product-id');
        var quantity = 0;

        modifyQuantity(productId, quantity);
        mostrarCarrito();
    });

    // Handle update button input changes
    $(document).on('change', '#update', function(event) {
        var productId = $(event.target).data('product-id');
        var quantity = $(event.target).val();

        modifyQuantity(productId, quantity);

        mostrarCarrito();

    });

    // Checkout
    function checkout() {
        $.ajax({
            type: 'POST',
            url: 'index.php?action=checkout', // Replace with the actual PHP script URL
            success: function (response) {
                // Check if the server request was successful
                console.log(response);
                if (response.fail) {
                    // Error during checkout (empty cart)
                    showAlert("red", "El carro esta vacio.")
                } else {
                    var mainContainer = $('#mainContent');
                    mainContainer.html(response);
                    // Afegir estil de comprat
                    // Create a new link element
                    var newStylesheet = $('<link/>', {
                        rel: 'stylesheet',
                        type: 'text/css',
                        href: 'vistes/recursos/css/pedidos.css'
                    });

                    // Append the link element to the head of the document
                    $('head').append(newStylesheet);

                    // Afegir estil de pedidos (per la preview)
                    var newStylesheet = $('<link/>', {
                        rel: 'stylesheet',
                        type: 'text/css',
                        href: 'vistes/recursos/css/comprado.css'
                    });

                    // Append the link element to the head of the document
                    $('head').append(newStylesheet);

                    updateHeaderInfo();
                }
            },
            error: function () {
                // Error getting response
            }
        });
    }

    // Handle checkout
    $(document).on('click', '#checkout-button', function(event) {
        $.ajax({
            url: "index.php?action=comprovar_sessio", // replace with your server endpoint
            type: "GET",
            dataType: "text", // adjust the dataType based on your server response
            success: function(response) {
                // Assuming the server response is "True" or "False"
                var userLoggedIn = response.trim().toLowerCase() === "active";
                if (userLoggedIn) {
                    checkout();
                } else {
                    showAlert("red", "Error, no has iniciado sesión, <a href='index.php?action=login'> <u> Inicia sesión aqui! </u></a>");

                    // Redirect to login
                    //window.location.href = window.location.href.split('?')[0] + '?action=login';
                }
            },
            error: function(error) {
                console.error("Error checking login status:", error);
            }
        });
    });
});


function mostrarTotProductes() {
    const url = `index.php?action=llistar_tots_productes`;

    // Change CSS in case we changed it before
    document.getElementById('stylesheet').href = "vistes/recursos/css/index.css";

    // Assuming you have a container div with the id "categories-container"
    const categoriesContainer = document.getElementById('mainContent');
    fetch(url)
    .then(response => response.text()) // assuming HTML response
    .then(data => {
        // Update the container with the fetched HTML
        categoriesContainer.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
}

function mostrarCarrito() {
    const url = `index.php?action=carrito`;

    // Change CSS in case we changed it before
    document.getElementById('stylesheet').href = "vistes/recursos/css/carrito.css";

    // Assuming you have a container div with the id "categories-container"
    const categoriesContainer = document.getElementById('mainContent');
    fetch(url)
    .then(response => response.text()) // assuming HTML response
    .then(data => {
        // Update the container with the fetched HTML
        categoriesContainer.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
}
