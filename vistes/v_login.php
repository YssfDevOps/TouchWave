<img src="img/Fondo2.jpg" alt="background-image" class="loginBackG">
            
<form action="/index.php?action=login" method="POST" class="loginForm">
    <h1 class="loginTitle">Iniciar Sesión</h1>

    <div class="loginInputs">
        <div class="loginBox">
            <input type="email" name="userEmail" placeholder="Email" required class="loginInput">
            <i class="fillEmail"></i>
        </div>

        <div class="loginBox">
            <input type="password" name="userPassword" placeholder="Contraseña" required class="loginInput">
            <i class="fillPass"></i>
        </div>
    </div>

    <button type="submit" name="login" class="loginButton">Iniciar Sesión</button>

    <div class="loginRegister">
        No tienes una cuenta? <a href="index.php?action=signin">Registrate</a>
    </div>

    <?php if(isset($alert)): ?>
    <div class="alertAccount">
        <p><?php echo $alert; ?></p>
    </div>
    <?php endif; ?>
</form>