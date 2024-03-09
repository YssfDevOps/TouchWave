<?php
# Cas on demano enviar el formulari
$alert = "";
$user = $_SESSION['user_data'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../models/m_connectaBD.php';
    require_once __DIR__ . '/../models/m_gestio_comptes.php';

    // It's a POST request
    if (isset($_POST['update'])) 
    {
        // Check for empty fields
        $requiredFields = ['userEmail', 'userName', 'userSurname', 'userPhone', 'userBirthDate', 'userPostalCode', 'userHomeAddress'];

        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                $alert = "Todos los campos son obligatorios. Por favor, complete todos los campos.";
                include __DIR__ . '/../vistes/v_mi_cuenta.php';
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

        $imageName = $_SESSION['user_data']['imatge'];
        if(!empty($_FILES['image']) && !empty($_FILES['image']['name'])){
            $imageName = basename($_FILES['image']['name']);
            $imagePath = sprintf('%s%s', $UPLOADS_FULL_PATH, $imageName); // Es el nombre original del archivo que se subió desde el sistema del cliente.

            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath); // Es la ubicación temporal del archivo en el servidor 
                                                                        //después de haber sido subido y antes de ser procesado por el script PHP.
        }

        // Check if the mail belongs to an account already
        if(checkMail($email) && $email != $_SESSION['user_data']['email'])
        {
            $alert = "El nuevo correo ya esta registrado!";
            include __DIR__ . '/../vistes/v_mi_cuenta.php';
            exit;
        }
       
        #Send it to the model
        $data = updateAccount(array($_SESSION['user_data']['id'], $email, $name, $surname, $phone, $birthdate, $postalCode, $address, $imageName));
        if ($data === false)
        {
            $alert = "Ha havido un error en la actualización de la cuenta!";
            include __DIR__ . '/../vistes/v_mi_cuenta.php';
            exit;
        }

        #if everything is correct update session
        $_SESSION['user_data'] = $data;
        $user = $data;

        header('Location: index.php?action=mi_cuenta');
        exit;

    } else {
        $alert = "No data received in the POST request.";
    }
} else {# Cas on demano el formulari
    // It's not a POST request, handle it accordingly
    $alert = "Error, no post request recived";
}

include __DIR__ . '/../vistes/v_mi_cuenta.php';

?>