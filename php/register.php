<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Open+Sans+Condensed:300,700" rel="stylesheet">
    <title>Registrate</title>
    <link rel="stylesheet" href="../css/register.css">
  </head>
  <body>
    <header class="main-header">
      <div class="constant">
        <a href="login.php" class="user">
          <span class="fa fa-user"></span>
        </a>
        <a href="index.php"><h1>tribeca</h1></a>
        <a href="#" class="toggle-nav">
          <span class="fa fa-bars"></span>
        </a>
      </div>
      <ul class="main-nav">
        <li><a href="index.php">home</a></li>
        <li><a href="#">nosotros</a></li>
        <li><a href="#">portfolio</a></li>
        <li><a href="#">cotizaciones</a></li>
        <li><a href="faq.php">faq's</a></li>
        <li><a href="#">contacto</a></li>
        <li><a href="register.php">registrate</a></li>
      </ul>
    </header>
<div class="register-photo">
  <div class="form-container">
    <div class="image-holder">
      <img src="../media/interiores.jpg">
    </div>
    <form method="post">
      <h2 class="text-container">
        <strong>Creá</strong> tu cuenta.
      </h2>
      <div class="container">
    		<div class="row">
    			<form role="form" action="" method="post" enctype="multipart/form-data">
    				<div class="row">
    					<div class="form-group col-sm-6">
    						<label for="nombre">Nombre</label>
    						<input type="text" class="form-control" id="nombre" name="nombre" value=""<?php echo (!empty($nombre))?$nombre:""; ?> placeholder="Ingrese Nombre">
    						<?php echo (isset($errores["nombre"]))?>
    					</div>
    					<div class="form-group col-sm-6">
    						<label for="apellido">Apellido</label>
    						<input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo (!empty($apellido))?$apellido:""; ?>" placeholder="Ingrese Apellido">
    					</div>
    				</div>
    				<div class="row">
    					<div class="form-group col-sm-6">
    						<label for="username">Nombre de Usuario</label>
    						<input type="text" class="form-control" id="username" name="username" value="<?php echo (!empty($usuario))?$usuario:""; ?>" placeholder="Ingrese Nombre de Usuario">
    						<?php echo (isset($errores["username"]))?'<p style="color:red;">'.$errores["username"].'</p>':""; ?>
    					</div>
    				</div>
    				<div class="row">
    					<div class="form-group col-sm-6">
    						<label for="email">Email</label>
    						<input type="text" class="form-control" id="email" name="email" value="<?php echo (!empty($email))?$email:""; ?>" placeholder="Ingrese Email">
    						<?php echo (isset($errores["email"]))?'<p style="color:red;">'.$errores["email"].'</p>':""; ?>
    							<?php echo (isset($errores["email_conf"]))?'<p style="color:red;">'.$errores["email_conf"].'</p>':""; ?>
    					</div>
    					<div class="form-group col-sm-6">
    						<label for="email-confirm">Confirmar Email</label>
    						<input type="text" class="form-control" id="email-confirm" name="email_confirm" value="" placeholder="Ingrese Confirmación Email">
    							<?php echo (isset($errores["email_conf"]))?'<p style="color:red;">'.$errores["email_conf"].'</p>':""; ?>
    					</div>
    				</div>
    				<div class="row">
    					<div class="form-group col-sm-6">
    						<label for="contrasena">Contraseña</label>
    						<input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese Contraseña">
    						<?php echo (isset($errores["contrasena"]))?'<p style="color:red;">'.$errores["contrasena"].'</p>':""; ?>
    						<?php echo (isset($errores["contrasena_conf"]))?'<p style="color:red;">'.$errores["contrasena_conf"].'</p>':""; ?>
    					</div>
    					<div class="form-group col-sm-6">
    						<label for="contrasena-confirm">Confirmar Contraseña</label>
    						<input type="password" class="form-control" id="contrasena-confirm" name="contrasena_confirm" placeholder="Ingrese Confirmación Contraseña">
    						<?php echo (isset($errores["contrasena_conf"]))?'<p style="color:red;">'.$errores["contrasena_conf"].'</p>':""; ?>
    					</div>
    				</div>
    				<div class="form-group">
    					<label>Avatar</label>
    					<div>
    						<input type="file" name="avatar"/>
    					</div>
    				</div>
    				<div class="form-group">
    					<label>Sexo</label>
    					<div>
    						<label class="radio-inline">
    							<input type="radio" name="genero" id="genero_masculino" <?php if (isset($genero)&&$genero==0){
    								echo "checked";
    							} ?> value="0"> Masculino
    						</label>
    						<label class="radio-inline">
    							<input type="radio" name="genero" id="genero_femenino" <?php if (isset($genero)&&$genero==1){
    							echo "checked";
    						} ?> value="1"> Femenino
    						</label>
    					</div>
    				</div>
    				<div class="form-group">
    					<label> Fecha de Nacimiento</label>
    					<div class="row">
    						<div class="col-sm-4">
    							<select class="form-control" name="fnac_dia">
    							<?php for ($i=1; $i <= 31; $i++) {
    								if (isset($dia)&&$dia==$i) {
    									echo "<option selected value=$i>$i</option>";
    								}else {
    									echo "<option value=$i>$i</option>";
    								}

    							} ?>
    							</select>
    						</div>
    						<div class="col-sm-4">
    							<select class="form-control" name="fnac_mes">
    							<?php for ($i=0; $i < count($meses); $i++) {
    								if (isset($mes)&&$mes==($i+1)) {
    										echo "<option selected value=".($i+1).">$meses[$i]</option>";
    								}else {
    										echo "<option value=".($i+1).">$meses[$i]</option>";
    								}

    							} ?>
    							</select>
    						</div>
    						<div class="col-sm-4">
    							<select class="form-control" name="fnac_anio">
    								<?php for ($i=1960; $i < 2016; $i++) {
    									if (isset($anio)&&$anio==$i) {
    									echo "<option selected value=$i>$i</option>";
    								}else {
    									echo "<option value=$i>$i</option>";
    								}
    								} ?>

    							</select>
    						</div>
    					</div>
    				</div>
    				<div class="form-group">
    					<label>Categorías</label>
    					<div>
    						<div class="checkbox">
    							<label>
    								<input type="checkbox" name="categorias[]" <?php if (isset($categorias)&&in_array("1",$categorias)) {
    									echo "checked";
    								} ?> value="1"> Deportes
    							</label>
    						</div>
    						<div class="checkbox">
    							<label>
    								<input type="checkbox" name="categorias[]" <?php if (isset($categorias)&&in_array("2",$categorias)) {
    									echo "checked";
    								} ?> value="2"> Geografía
    							</label>
    						</div><div class="checkbox">
    							<label>
    								<input type="checkbox" name="categorias[]" <?php if (isset($categorias)&&in_array("3",$categorias)) {
    									echo "checked";
    								} ?> value="3"> Historia
    							</label>
    						</div><div class="checkbox">
    							<label>
    								<input type="checkbox" name="categorias[]" <?php if (isset($categorias)&&in_array("4",$categorias)) {
    									echo "checked";
    								} ?> value="4"> Ciencias
    							</label>
    						</div>
    					</div>
    				</div>
    				<div class="form-group">
    					<label for="descripcion">Descripción</label>
    					<textarea id="descripcion" name="descripcion" class="form-control" rows="3"><?php
    						echo (isset($descripcion))?$descripcion:"";
    					 ?></textarea>
    				</div>
    				<div class="checkbox">
    					<label>
    						<input type="checkbox" id="chk-terminos" name="terminos"> Acepto los términos y condiciones
    					</label>
    					<?php echo (isset($errores["terminos"]))?'<p style="color:red;">'.$errores["terminos"].'</p>':""; ?>
    				</div>
    				<input type="submit" class="btn btn-info" value="Registrarme"/>
    			</form>
    		</div>
    	</div>
      </div>


      <a class="already" href="login.php">Ya tienes una cuenta? Ingresa aquí.</a>


    </form>

  </div>

  <footer class="main-footer">
    <nav class="social">
      <ul style="list-style-type:none">
        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
        <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
        <li><a href="#"><span class="fa fa-instagram"></span></a></li>
      </ul>
    </nav>
    <nav class="contact">
      <ul style="list-style-type:none">
        <li><a href="index.php">home</a></li>
        <li><a href="#">nosotros</a></li>
        <li><a href="#">portfolio</a></li>
        <li><a href="#">cotizaciones</a></li>
        <li><a href="faq.php">faq's</a></li>
        <li><a href="#">contacto</a></li>
      </ul>
    </nav>
  </footer>

</div>
  </body>
</html>
