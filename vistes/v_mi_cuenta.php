<?php if ($alert !== "") {
    echo $alert; // TODO: Poner-lo con el sistema de notificaciones nuevo
};?>

<div class="container">
    <div class="rightbox">
        <div class="profile tabShow">
            <form action="index.php?action=update_account" method="post" enctype="multipart/form-data">
                <h1>Información personal</h1>
                <h2>Imagen de perfil</h2>
                <img src="<?php echo $filesPublicPath.$user['imatge'] ?>" alt="PFP">
                <input type="file" name="image" accept="image/*">
                <h2>Correo electronico</h2>
                <input type="email" name="userEmail" value="<?php echo $user['email']; ?>" required class="input">
                <h2>Nombre</h2>
                <input type="text" name="userName" value="<?php echo $user['nom']; ?>" required class="input" pattern="[A-Za-z ]*">
                <h2>Apellidos</h2>
                <input type="text" name="userSurname" value="<?php echo $user['cognom']; ?>" required class="input" pattern="[A-Za-z ]*">
                <h2>Numero de telefono</h2>
                <input type="tel" name="userPhone" value="<?php echo $user['telefon']; ?>" required class="input" pattern="[0-9]{9}">
                <h2>Fecha de nacimiento</h2>
                <input type="text" name="userBirthDate" value="<?php echo $user['data_naixement']; ?>" required class="input" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[0-2])/((19|20)\d\d)">
                <h2>Codigo postal</h2>
                <input type="text" name="userPostalCode" value="<?php echo $user['codi_postal']; ?>" required class="input" pattern="[0-9]{5}">
                <h2>Dirección</h2>
                <input type="text" name="userHomeAddress" value="<?php echo $user['adreca']; ?>" required class="input" pattern="[A-Za-z0-9]{0,30}">
                <input type="submit" name="update" value="Actualizar">
            </form>
        </div>
    </div>
</div>
