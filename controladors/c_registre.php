<?php
# Cas on demano enviar el formulari
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../models/m_connectaBD.php';
    require_once __DIR__ . '/../models/m_gestio_comptes.php';

    // It's a POST request
    if (isset($_POST['register'])) 
    {
        // Check for empty fields
        $requiredFields = ['userEmail', 'userName', 'userSurname', 'userPhone', 'userBirthDate', 'userPostalCode', 'userHomeAddress', 'userPassword'];

        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                $alert = "Todos los campos son obligatorios. Por favor, complete todos los campos.";
                include __DIR__ . '/../vistes/v_registre.php';
                exit;
            }
        }

        // Prepare and validate data
        $email = filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_STRING);

        $name = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
        $surname = filter_var($_POST['userSurname'], FILTER_SANITIZE_STRING);

        $phone = filter_var($_POST['userPhone'], FILTER_SANITIZE_NUMBER_INT);

        $birthdate = $_POST['userBirthDate'];
        $birthdate_valid = (bool)strtotime($birthdate);

        $postalCode = filter_var($_POST['userPostalCode'], FILTER_SANITIZE_STRING);
        $address = filter_var($_POST['userHomeAddress'], FILTER_SANITIZE_STRING);
        $password = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
        $imatge = "Default_pfp.jpg";

        /* ALTERNATIVA A VALIDAR DATOS.
        // Prepare and validate data
        $email = filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL);
        if ($email === false) {
            // Handle invalid email
        }
        
        $name = trim($_POST['userName']);
        $surname = trim($_POST['userSurname']);
        
        $phone = filter_var($_POST['userPhone'], FILTER_SANITIZE_NUMBER_INT);
        
        $birthdate = $_POST['userBirthDate'];
        $birthdate_valid = (bool)strtotime($birthdate);
        
        $postalCode = trim($_POST['userPostalCode']);
        $address = trim($_POST['userHomeAddress']);
        $password = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
        */

        // Check if the mail belongs to an account already
        if(checkMail($email))
        {
            $alert = "Este correo ya está registrado!";
            include __DIR__ . '/../vistes/v_registre.php';
            exit;
        }

        #Send it to the model
        $err = insertUser(array($email, $name, $surname, $phone, $birthdate, $postalCode, $address, $password, $imatge));
        if ($err === false)
        {
            $alert = "Este correo ya está registrado!";
            include __DIR__ . '/../vistes/v_registre.php';
            exit;
        }
        else
        {
            header("Location: index.php");
            exit;
        }

    } else {
        echo "No data received in the POST request.";
    }
} else {# Cas on demano el formulari
    // It's not a POST request, handle it accordingly
    include __DIR__ . '/../vistes/v_registre.php';
}

?>