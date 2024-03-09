<div class="signin">
<img src="img/Fondo2.jpg" alt="background-image" class="signinBackG">

<form method="post" action="/index.php?action=signin" class="signinForm">
    <h1 class="signinTitle">Registrarse</h1>
    
    <div class="signinInputs">
        <div class="signinBox">
            <input type="text" name="userName" placeholder="Nombre" required class="signinInput" pattern="[A-Za-z ]*">
            <i class="fillEmail"></i>
        </div>
    </div>

    <div class="signinInputs">
        <div class="signinBox">
            <input type="text" name="userSurname" placeholder="Apellidos" required class="signinInput" pattern="[A-Za-z ]*">
            <i class="fillEmail"></i>
        </div>
    </div>

    <div class="signinInputs">
        <div class="signinBox">
            <input type="tel" name="userPhone" placeholder="Telefono movil (9 digitos)" required class="signinInput" pattern="[0-9]{9}">
            <i class="fillPhone"></i>
        </div>
    </div>

    <div class="signinInputs">
        <div class="signinBox">
            <input type="text" name="userBirthDate" placeholder="Fecha de nacimiento (dd/mm/yyyy)" required class="signinInput" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[0-2])/((19|20)\d\d)">
            <i class="fillDate"></i>
        </div>
    </div>

    <div class="signinInputs">
        <div class="signinBox">
            <input type="text" name="userPostalCode" placeholder="Codigo postal (5 digitos)" required class="signinInput" pattern="[0-9]{5}">
            <i class="fillPostalCode"></i>
        </div>
    </div>

    <div class="signinInputs">
        <div class="signinBox">
            <input type="text" name="userHomeAddress" placeholder="Dirección" required class="signinInput" pattern="[A-Za-z0-9\s]{0,30}">
            <i class="fillAddress"></i>
        </div>
    </div>

    <div class="signinInputs">
        <div class="signinBox">
            <input type="email" name="userEmail" placeholder="Email" required class="signinInput">
            <i class="fillEmail"></i>
        </div>
    </div>

    <div class="signinInputs">
        <div class="signinBox">
            <input type="password" name="userPassword" placeholder="Contraseña" required class="signinInput">
            <i class="fillPass"></i>
        </div>
    </div>

    <button type="submit" name="register" value="Register" class="signinButton">Registrarse</button>

    <div class="signinRegister">
        Ya tienes una cuenta? <a href="/index.php?action=login">Iniciar Sesión</a>
    </div>

    <?php if(isset($alert)): ?>
    <div class="alertAccount">
        <p><?php echo $alert; ?></p>
    </div>
    <?php endif; ?>
</form>

</div>
