<div id="login">
    <div id="login-content">
        <div id="logo">
            <h1>PREGUNTAS US</h1>
        </div>
<!--  Datos para el login  -->
        <div id="user-box">
            <fieldset>
            	<form id="formLogin" name="formLogin" method="post" action="./procesado/login.php">
	                <label for="email">Email:</label>
	                <input type="text" id="email" name="email" /> 
	                <label for="pass">Contraseña: </label>
	                <input type="password" id="pass" name="pass" />
	                <input type="submit" value="Login" />            		
            	</form>
            </fieldset>
            <a href="/abd/registrarse.php">Registrarse</a>
        </div>
    </div>
</div>
<?php if(isset($_SESSION["erroresLogin"])){?>
	<div class="errores">
		<?php 
		$errores = $_SESSION["erroresLogin"];
		foreach ($errores as $error){
			echo $error."<br>";
		} ?>
	</div>
<?php	
	unset($_SESSION["erroresLogin"]);
}?>
