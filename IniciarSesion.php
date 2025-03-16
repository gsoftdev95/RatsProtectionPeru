<?php

require_once('helpers/dd.php');
require_once('controladores/funciones.php');
require_once('partials/conexionBD.php');
$errores = [];

$password = "";
if ($_POST) {
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $errores = validarUsuarioLogin($_POST);
    //dd($errores);
    if (count($errores) === 0) {
        $usuario = buscarPorEmail($bd,'usuariorats',$correo);
        if($usuario === false){
            $errores['correo'] = 'Email o password inválidos - usuario no encontrado';
        }else{
            if(password_verify($password, $usuario['password'])=== false){
                $errores['password'] = 'Email o password inválidos - Las contraseñas no estan correctas';
            }else{
                //Setear al usuario - Guardar al usuario en sesión - $_SESSION
                // dd($usuario);
                seteoUsuario($usuario);
                //Si el usuario indicó "Recordarme" - Guardar almenos el email del usuario - cookies
                if(isset($_POST['recordarme'])){
                    seteoCookie($usuario);
                }
                header('location:index.php');
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('./partials/head.php') ?>
</head>
<body>
    <header>
        <?php include_once('./partials/navBar.php')?>
    </header>

    <section class="login container-fluid m-o p-0">
        <section class="row container-fluid m-0 p-0">
            <article class="col-12 m-0 p-0">
                <h2 class="bg-black titlelogin text-white text-center pt-5 container-fluid m-0">Iniciar Sesión</h2>
                <h4 class="text-center ">Introduzca su correo y contraseña.</h4>
            </article>
        </section>
        <section class="formlogin pt-15">
            <div class="container">
                <div class="row">
                    <div class="col-8 mx-auto  pt-2 ">
                        <div class="signup-form">
                            <?php if (isset($errores)) : ?>
                                <ul>
                                    <?php foreach ($errores as $key => $error) : ?>
                                        <li class="alert alert-danger"><?= $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control mt-2" name="correo" placeholder="Email" value="<?= isset($correo)? $correo : ''?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control mt-2" name="password" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="recordarme"><label class="checkbox-inline mt-2">Recordarme</label>
                                </div>
                                <div class="form-group ">
                                    <button type="submit" class="btn btn btn-dark mt-2 rounded-0" style="font-family: Agency FB;">Ingresar</button>
                                </div>
                            </form>

                            <div class="text-center mt-3">
                                ¿Aún no tienes una cuenta? ¡<a href="Registro.php">Regístrate</a>  ahora y disfruta de todas nuestros productos y beneficios!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>        
    </section>    
    

    


    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>
</body>
</html>