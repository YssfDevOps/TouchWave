<?php 
# Cas on demano enviar el formulari
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../models/m_connectaBD.php';
    require_once __DIR__ . '/../models/m_gestio_comptes.php';

    // It's a POST request
    if (isset($_POST['login']))
    {
        // Validate data
        $email = filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
        $password = $_POST['userPassword'];

        // Check mail
        if ($email === false || empty($password) || !checkMail($email)) {
            $alert = "El correo o la contraseña son incorrectos!";
            include __DIR__ . '/../vistes/v_login.php';
            exit;
        }

        // Check password
        if(!password_verify($password, getPassFromMail($email))) // password_verify es una función de PHP.
        {
            $alert = "El correo o la contraseña son incorrectos!";
            include __DIR__ . '/../vistes/v_login.php';
            exit;
        }

        // Get data from that mail
        $data = getDataFromMail($email);  

        // Start session
        $_SESSION['user_data'] = $data;

        // Redirect to home page
        header("Location: index.php");

    } else {
        echo "No data received in the POST request.";
    }
} else {# Cas on demano el formulari
    // It's not a POST request, handle it accordingly
    include __DIR__ . '/../vistes/v_login.php';
}
?>