<?php
function registerValidation($data){
$errores=[];
if (strlen($data["nombre"])<2) {
  $errores["nombre"]="Nombre no valido.";
}
if (strlen($data["apellido"])<2) {$errores["apellido"]="Apellido no válido.";}

if (validarSiExiste($data["username"],$data["email"])) {$errores["username"]="Usuario o mail ya existente.";}

if (strlen($data["contrasena"])<7) {$errores["contrasena"]="Contraseña demasiado corta.";}

if ($data["contrasena"]!=$data["contrasena_confirm"]) {$errores["contrasena_conf"]="No concuerdan las contraseñas.";}

if (!filter_var($data["email"],FILTER_VALIDATE_EMAIL)) {$errores["email"]="Mail inválido.";}
if ($data["email"]!=$data["email_confirm"]) {$errores["email_conf"]="No concuerdan los emails.";}

if (date("Y")-$data["fnac_anio"]<18) {header("Location:https://www.youtube.com/watch?v=dQw4w9WgXcQ");}

if (!isset($data["terminos"])) {$errores["terminos"]="No aceptaste los términos y condiciones.";}

if ($_FILES["avatar"]["size"] > 500000) {$errores["avatar"]= "El archivo es demasiado grande.";}

return $errores;
}

function guardarUsuario($data){

  $archivo= file_get_contents("jsondata.json");

  $guardados=json_decode($archivo,true);

  $data["contrasena"]=password_hash($data["contrasena"],PASSWORD_DEFAULT);

  unset($data["contrasena_confirm"]);

  unset($data["email_confirm"]);

  $ultimoID=(count($guardados["usuarios"]));

  $target_dir = "assets/uploads/usuarios/$ultimoID/";

  if (!is_dir($target_dir)) {mkdir($target_dir, 0777, true);}

  $target_file = $target_dir . basename($_FILES["avatar"]["name"]);

  move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

  $data["avatar"]=$target_file;

  $usuario=$data;

  $guardados["usuarios"][]=$usuario;

  $usuarioJson=json_encode($guardados);

  file_put_contents("jsondata.json",$usuarioJson);
}
function validarSiExiste($username,$email){

  $archivo= file_get_contents("jsondata.json");

  $data= json_decode($archivo,true);

  $disponible= true;
  for ($i=0; $i < count($data["usuarios"]); $i++) {

    if ($data["usuarios"][$i]["username"]==$username||$data["usuarios"][$i]["email"]==$email) {

      return true;
    }
  }
}
  function logearUsuario($datosLogin){

      $archivo= file_get_contents("jsondata.json");

      $data= json_decode($archivo,true);

      for ($i=0; $i < count($data["usuarios"]); $i++) {

        if ($data["usuarios"][$i]["username"]==$dataLogin["username"]) {

          if (password_verify($datosLogin["contrasena"],$data["usuarios"][$i]["contrasena"])) {

            session_start();
            $_SESSION['user']= $data["usuarios"][$i]["username"];

            setcookie("avatar", $data["usuarios"][$i]["avatar"], time() + (86400 * 30));
            header("location:profile.php");
          }
        }
      }
}
