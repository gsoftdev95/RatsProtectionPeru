<?php

// Primero, configuramos los parámetros de la cookie de sesión
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);

//Si o si deben colocarlo
//--------------
session_start();
//--------------
// Para poder enviar correos
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('helpers/dd.php');

//Función para efectuar la conexión a la Base de Datos
function conexion($host,$dbname,$user,$password){
    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $bd = new PDO($dsn, $user, $password);
        return $bd   ;
    } catch (PDOException $error) {
        echo "Ha ocurrido un error en la conexión ". $error->getMessage();
        exit;
    }    
}

//Función para guardar los datos del usuario
function guardarUsuario($bd,$tabla,$datos){
    //Organizar los datos a ser guardados
    $nombre = $datos['nombre'];
    $apellidos = $datos['apellidos'];
    $correo = $datos['correo'];
    $password = password_hash($datos["password"], PASSWORD_DEFAULT);
    $perfil = 1;
    
    //Armar la consulta
    $sql = "insert into $tabla (nombre,apellidos,correo,password,perfil) values (:nombre,:apellidos,:correo,:password,:perfil)";
    //Preparar la consulta
    $query = $bd->prepare($sql);
    $query->bindValue(':nombre', $nombre);
    $query->bindValue(':apellidos', $apellidos);
    $query->bindValue(':correo', $correo);
    $query->bindValue(':password', $password);
    $query->bindValue(':perfil', $perfil);
    $query->execute();
}
    
//Función para buscar por usuario
function buscarUsuarios($bd,$tabla,$busqueda,$tipoBusqueda){
    //Armar la consulta
    $sql = "select * from $tabla where  $tipoBusqueda like :busqueda";
    //Preparar la consulta
    $query= $bd->prepare($sql);
    $query->bindValue(':busqueda', "%".$busqueda."%");    
    //Ejecutar la consulta
    $query->execute();
    //Traer los datos de la consulta
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    // dd($usuarios);
    return $usuarios;   
}

//Función para listar los datos del usuario
function listarUsuarios($bd, $tabla){
    //Armar la consulta
    $sql = "select * from $tabla";
    //Preparar la consulta
    $query= $bd->prepare($sql);
    //Ejecutar la consulta
    $query->execute();
    //Traer los datos de la consulta
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    return $usuarios;
}  


//Función para modificar los datos del usuario
function modificarUsuario($bd, $tabla, $datos){

    //Recopilación datos $_POST
    $id= intval($datos['id']);
    $nombre = $datos['nombre'];
    $apellidos = $datos['apellidos'];
    $correo = $datos['correo'];
    //Armado del update
    
    $sql = "update $tabla set id= :id,nombre= :nombre,apellidos= :apellidos ,correo= :correo  where id= :id";
    //Inserción de datos en la sentencia
    
    $query = $bd->prepare($sql);
    $query->bindvalue(':id', $id);
    $query->bindValue(':nombre', $nombre);
    $query->bindValue(':apellidos', $apellidos);
    $query->bindValue(':correo', $correo);
    $query->execute();
    
}
  

//Función para eliminar el registro del usuario
function eliminarUsuario($bd,$tabla,$datos){
    //Recopilación de datos del $_POST
    $id=intval($datos['id']);
    //Armado el delete
    $sql= "delete from $tabla where id= :id";
    //Inserción de datos en la sentencia
    $query=$bd->prepare($sql);
    $query->bindvalue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    if($query->rowCount()>0){
        echo "<h2 style='text-align:center'>Registro eliminado</h2>";
    }else{
        echo "<h2 style='text-align:center'>No se pudo elimiar el registro</h2>";
    }
}


function detalleUsuario($bd, $id, $table) {
    //Armado de la sentencia
    $sql = "select * from $table where id=$id";
    $query = $bd->prepare($sql);
    $query->execute();
    //Lectura de los datos obtenidos en la sentencia como Array Asociativo
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
    //dd($usuario);
    return $usuario;
}

//Función para validar al usuario
// Función para validar datos de registro de usuario
function validarUsuario($datos) {
    // 1. Variables crudas
    $nombreRaw    = isset($datos['nombre']) ? $datos['nombre'] : '';
    $apellidosRaw = isset($datos['apellidos']) ? $datos['apellidos'] : '';
    $correoRaw    = isset($datos['correo']) ? $datos['correo'] : '';
    $passwordRaw  = isset($datos['password']) ? $datos['password'] : '';
    $confirmRaw   = isset($datos['confirm_password']) ? $datos['confirm_password'] : '';
    
    $errores = [];

    // 2. Normalización
    $nombre    = ucfirst(strtolower(trim($nombreRaw)));      // Primera letra mayúscula
    $apellidos = ucwords(strtolower(trim($apellidosRaw)));   // Cada palabra con mayúscula
    $correo    = strtolower(trim($correoRaw));               // Correos siempre en minúscula
    $password  = trim($passwordRaw);
    $confirm   = trim($confirmRaw);

    // 3. Validaciones
    // Nombre
    if ($nombre === '') {
        $errores['nombre'] = "El nombre es obligatorio.";
    } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
        $errores['nombre'] = "El nombre solo puede contener letras.";
    }

    // Apellidos
    if ($apellidos === '') {
        $errores['apellidos'] = "El apellido es obligatorio.";
    } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $apellidos)) {
        $errores['apellidos'] = "El apellido solo puede contener letras.";
    }

    // Correo
    if ($correo === '') {
        $errores['correo'] = "El correo es obligatorio.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores['correo'] = "El correo no es válido.";
    }

    // Password
    if ($password === '') {
        $errores['password'] = "La contraseña es obligatoria.";
    } elseif (strlen($password) < 6) {
        $errores['password'] = "La contraseña debe tener al menos 6 caracteres.";
    }

    // Confirmación
    if ($confirm === '') {
        $errores['confirm_password'] = "Debe confirmar la contraseña.";
    } elseif ($password !== $confirm) {
        $errores['confirm_password'] = "Las contraseñas no coinciden.";
    }

    // 4. Retorno (errores y valores normalizados)
    return [
        'errores' => $errores,
        'valores' => [
            'nombre'    => $nombre,
            'apellidos' => $apellidos,
            'correo'    => $correo
        ]
    ];
}


//Función para validar los datos del usuario - Inicia sesión
function validarUsuarioLogin($datos){
    $errores =[];
    $correo = trim($datos['correo']);
    $password = trim($datos['password']);
    if(filter_var($correo,FILTER_VALIDATE_EMAIL) != true ){
        $errores['correo'] = 'correo ó Password invalidos';
    }
    if(empty($password)){
        $errores['password'] = 'correo ó Password invalidos';
    }
    return $errores;
}

//Función para buscar al usuario que intenta ingresar al sistema
function buscarPorEmail($bd,$tabla,$correo){
    //Armar la consulta
    $sql = "select * from $tabla WHERE correo = '$correo'";
    //Preparar la consulta
    $query = $bd->prepare($sql);
    $query->execute();
    //Traer los datos de la consulta
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
    return $usuario;
}    

//Función para guardar en sesión al usuario que está ingresando
function seteoUsuario($usuario){
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['apellido'] = $usuario['apellidos'];
    $_SESSION['correo'] = $usuario['correo'];
    $_SESSION['perfil'] = $usuario['perfil'];
}
//Función para guardar en el navegador los datos del usuario
function seteoCookie($usuario){
    setcookie('correo', $usuario['correo'], [
        'expires' => time() + 3600,
        'path' => '/',
        'domain' => '',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
}

function acceso($bd, $tabla, $username) {
    // Define una consulta SQL para obtener el id, nombre, apellidos, correo y perfil del usuario
    $query = "SELECT id, nombre, apellidos, correo, perfil FROM $tabla WHERE correo = :correo"; 

    // Prepara la consulta para evitar inyecciones SQL
    $stmt = $bd->prepare($query);
    
    // Bind del parámetro (el correo del usuario)
    $stmt->bindValue(':correo', $username); // Usamos bindValue con PDO

    // Ejecuta la consulta
    $stmt->execute();
    
    // Obtiene el resultado
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verifica si se obtuvo algún resultado
    return $usuario ? $usuario : null; // Retorna un array asociativo con los datos del usuario o null
}

//Función para controlar si el usuario está o no en sesión o cookie
function controlIngreso(){
    // dd($_SESSION['nombre']);
    if(!$_SESSION['nombre']){
        header('location:login.php');
    }
}

// Función para verificar el acceso basado en el perfil del usuario
function verificarAcceso($usuario, $perfilesPermitidos) {
    if (!isset($usuario['perfil'])) {
        header('Location: login.php'); // Redirigir a login si no hay perfil
        exit;
    }

    // Verificar si el perfil del usuario está en la lista de perfiles permitidos
    if (!in_array($usuario['perfil'], $perfilesPermitidos)) {
        header('Location: acceso_denegado.php'); // Redirigir a una página de acceso denegado
        exit;
    }
}

function crearTokenRecuperacion($bd, $usuario){
    $token = bin2hex(random_bytes(32));
    $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

    $sql = "INSERT INTO password_resets (usuario_id, token, expira_en, usado)
            VALUES (:usuario_id, :token, :expira, 0)";

    $query = $bd->prepare($sql);
    $query->execute([
        ':usuario_id' => $usuario['id'],
        ':token' => $token,
        ':expira' => $expira
    ]);

    enviarCorreoRecuperacion($usuario['correo'], $token);
}


function enviarCorreoRecuperacion($correo, $token){
    
    require_once 'librerias/PHPMailer/src/PHPMailer.php';
    require_once 'librerias/PHPMailer/src/SMTP.php';
    require_once 'librerias/PHPMailer/src/Exception.php';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ratsprotection@gmail.com'; //'gesoftdev@gmail.com'
        $mail->Password   = 'zpod sqtc eshe vmjz';  //'wncl tsrg bxkg fuic';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('no-reply@tudominio.com', 'Rats Protection');
        $mail->addAddress($correo);

        $link = "https://https://ratsprotectionperu.com/resetear.php?token=$token";
        //$link = "http://localhost/Paginas_web/Rats_Protection/RatsProtection_v6_seguridad/resetear.php?token=$token";

        $mail->isHTML(true);
        $mail->Subject = 'Recuperación de contraseña';
        $mail->Body    = "
            <p>Sobrino!, ¿como te vas a olvidar tu contraseña?.</p>
            <p>Te ayudare a restablecer tu contrasena.</p>
            <p><a href='$link'>Haz clic aqui para cambiarla</a></p>
            <p>Este enlace expira en 1 hora.</p>
        ";

        $mail->send();
        return true;

    } catch (Exception $e) {
        return false;
    }
}



function enviarCorreo($usuario) {    
    //Importar PHPMailer
    require_once 'librerias/PHPMailer/src/PHPMailer.php';
    require_once 'librerias/PHPMailer/src/SMTP.php';
    require_once 'librerias/PHPMailer/src/Exception.php';

    //Guardar los datos del usuario
    $correoUsuario = $usuario['correo'];
    $nombre = $usuario['nombre'];
    $apellido = $usuario['apellidos'];
    $nombreCompleto = $nombre . ' ' . $apellido;

    //Crear instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        //Configuración del servidor
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Cambia a SMTP::DEBUG_SERVER para depuración //otro valor es 0
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ratsprotection@gmail.com'; //'gesoftdev@gmail.com'
        $mail->Password   = 'zpod sqtc eshe vmjz';  //'wncl tsrg bxkg fuic';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // o 'ssl'
        $mail->Port       = 587; // Usa 465 si es 'ssl'

        //Destinatarios
        $mail->setFrom('ratsprotection@gmail.com', 'El tio Rats');
        $mail->addAddress($correoUsuario, $nombreCompleto); 
        $mail->addCC('gesoftdev@gmail.com');

        //Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Registro de cuenta - Rats Protection Peru';

        //Cargar el contenido HTML desde un archivo
        $file = fopen("bodyEmail.html", "r");
        $str = fread($file, filesize("bodyEmail.html"));
        fclose($file);

        $mail->Body = trim($str);

        $mail->send();
        echo 'Correo enviado de forma satisfactoria';
    } catch (Exception $e) {
        echo "Ha ocurrido un error: {$mail->ErrorInfo}";
    }
}




// Funcion para contar cliente
function contarClientes($bd, $tabla){
    $sql = "select count(*) from  $tabla where perfil = 1";
    $stmt = $bd->query($sql);
    return $stmt->fetchcolumn();
}

// Funcion para contar productos
function contarProductos($bd, $tabla){
    $sql = "select count(id) from $tabla";
    $stmt = $bd->query($sql);
    return $stmt->fetchcolumn();
}
// Funcion para contar productos
function contarTeam($bd, $tabla){
    $sql = "select count(idteamrats) from $tabla";
    $stmt = $bd->query($sql);
    return $stmt->fetchcolumn();
}
// Funcion para contar productos
function contarEventos($bd, $tabla){
    $sql = "select count(idevento) from $tabla";
    $stmt = $bd->query($sql);
    return $stmt->fetchcolumn();
}
function contarReclamosPendientes($bd, $tabla){
    $sql = "select count(*) from $tabla WHERE estado = 'pendiente'";
    $stmt = $bd->query($sql);
    return $stmt->fetchcolumn();
}
function contarReclamosEnproceso($bd, $tabla){
    $sql = "select count(*) from $tabla WHERE estado = 'en proceso'";
    $stmt = $bd->query($sql);
    return $stmt->fetchcolumn();
}


//PRODUCTO
//PRODUCTO
//PRODUCTO
//PRODUCTO  



//Función para validar producto
function validarProducto($datos){
    $errores = [];
    $nombreProducto = trim($datos['nombreProducto']);
    $categoriaProducto = trim($datos['categoriaProducto']);
    if($nombreProducto === ''){
        $errores['nombreProducto'] = 'El campo nombre no puede estar vacio';
    }    
    if(empty($categoriaProducto)){
        $errores['categoriaProducto'] = 'El campo producto no puede estar vacio';
    }
    //Validar si me mandaron la imagen
    if(isset($imagen)){
        //dd($imagen);
        if($imagen['avatar']['error']!=0){
            $errores['avatar'] = 'Debe subir una imagen';
        }    
    }
    return $errores;
}

//Función para cargar la imagen del producto en el servidor
function armarLaImagenProducto($archivos)
{
    // Ruta relativa o absoluta de la carpeta de destino
    $rutaCarpeta = __DIR__ . '/../imgRats/Productos/'; // Ajusta según la ubicación de tu script
    if (!is_dir($rutaCarpeta)) {
        mkdir($rutaCarpeta, 0777, true); // Crea la carpeta si no existe
    }

    $nombresArchivos = []; // Array para almacenar los nombres de los archivos

    // Verifica que se subieron archivos sin errores
    if (isset($archivos['avatar']) && is_array($archivos['avatar']['name'])) {
        foreach ($archivos['avatar']['name'] as $key => $nombre) {
            if ($archivos['avatar']['error'][$key] === UPLOAD_ERR_OK) {
                $origenTemporal = $archivos['avatar']['tmp_name'][$key];
                $nombreArchivo = uniqid('producto_') . '.' . pathinfo($nombre, PATHINFO_EXTENSION);
                $rutaDestino = $rutaCarpeta . $nombreArchivo;

                // Mover el archivo a la carpeta de destino
                if (move_uploaded_file($origenTemporal, $rutaDestino)) {
                    $nombresArchivos[] = $nombreArchivo; // Agrega el nombre del archivo al array
                }
            }
        }
    }

    return $nombresArchivos; // Retorna el array de nombres de archivos
}



//Función para guardar los datos del producto
function guardarProducto($bd, $tabla, $datos, $imagenes)
{
    try {
        $nombreProducto = trim($datos['nombreProducto']);
        $categoriaProducto = trim($datos['categoriaProducto']); 
        $precio = trim($datos['precio']);
        $tallas = is_array($datos['tallas']) ? json_encode($datos['tallas']) : trim($datos['tallas']);    
        $avatar = json_encode($imagenes);
        $descripcion = trim($datos['descripcion']);
        $tipoid = isset($datos['tipoid']) ? (int)$datos['tipoid'] : null; // Convertir a entero

        $especificaciones = isset($datos['especificaciones']) ? json_encode(explode("\n", trim($datos['especificaciones']))) : json_encode([]);

        $sql = "INSERT INTO $tabla (nombreProducto, categoriaProducto, avatar, descripcion, precio, tallas, especificaciones, tipoid) 
                VALUES (:nombreProducto, :categoriaProducto, :avatar, :descripcion, :precio, :tallas, :especificaciones, :tipoid)";

        $query = $bd->prepare($sql);
        $query->bindValue(':nombreProducto', $nombreProducto);
        $query->bindValue(':categoriaProducto', $categoriaProducto);
        $query->bindValue(':avatar', $avatar);
        $query->bindValue(':descripcion', $descripcion);
        $query->bindValue(':precio', $precio, PDO::PARAM_STR);
        $query->bindValue(':tallas', $tallas);
        $query->bindValue(':especificaciones', $especificaciones);
        $query->bindValue(':tipoid', $tipoid, PDO::PARAM_INT); // Asegurar que es entero

        $query->execute();
    } catch (PDOException $e) {
        die("Error al guardar el producto: " . $e->getMessage());
    }
}



function buscarProductos($bd,$tabla,$busqueda,$tipoBusqueda){
    //Armar la consulta
    $sql = "select * from $tabla where  $tipoBusqueda like :busqueda";
    //Preparar la consulta
    $query= $bd->prepare($sql);
    $query->bindValue(':busqueda', "%".$busqueda."%");    
    //Ejecutar la consulta
    $query->execute();
    //Traer los datos de la consulta
    $productos = $query->fetchAll(PDO::FETCH_ASSOC);
    // dd($usuarios);
    return $productos;
}
//Función para listar los datos del producto
function listarProductos($bd, $tabla){
    //Armar la consulta
    $sql = "select * from $tabla";
    //Preparar la consulta
    $query= $bd->prepare($sql);
    //Ejecutar la consulta
    $query->execute();
    //Traer los datos de la consulta
    $productos = $query->fetchAll(PDO::FETCH_ASSOC);
    return $productos;
}


function obtenerProductosPorCategoria($bd, $categoria) {
    // Construir la consulta SQL con ordenación
    $sql = "SELECT * FROM productos 
            WHERE categoriaProducto = :categoria 
            ORDER BY tipoid ASC, nombreProducto ASC";
    
    $query = $bd->prepare($sql);
    $query->bindValue(':categoria', $categoria);
    
    $query->execute();
    
    return $query->fetchAll(PDO::FETCH_ASSOC);
}


function obtenerProductoPorId($bd, $id) {
    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = $bd->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}



// Función para ver los datos del producto y sus imágenes
function detalleProducto($bd, $id, $table) {
    // Armado de la sentencia
    $sql = "SELECT * FROM $table WHERE id = :id";

    // Preparar la consulta
    $query = $bd->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    // Obtener los datos como array asociativo
    $productos = $query->fetch(PDO::FETCH_ASSOC);

    if (!$productos) {
        return null; // Retorna null si no encuentra el producto
    }

    // Decodificar el JSON de 'avatar' para obtener todas las imágenes
    $productos['imagenes'] = json_decode($productos['avatar'], true);

    return $productos;
}

//Función para modificar los datos del producto
function modificarProducto($bd, $tabla, $datos, $avatar)
{
    // Recopilación de datos
    $id = intval($datos['id']);
    $nombreProducto = $datos['nombreProducto'];
    $categoriaProducto = $datos['categoriaProducto'];
    $precio = $datos['precio'];
    $descripcion = $datos['descripcion'];
    $tipoid = isset($datos['tipoid']) ? intval($datos['tipoid']) : null; // Convertir a entero
    
    // 🔥 TALLAS BIEN MANEJADAS
    if (isset($datos['tallas'])) {
        if (is_array($datos['tallas'])) {
            $tallas = json_encode($datos['tallas']);
        } else {
            $tallas = json_encode(explode(',', $datos['tallas']));
        }
    } else {
        $tallas = json_encode([]);
    }

    $especificaciones = json_encode(explode("\n", $datos['especificaciones']));

    // Se mantiene el formato JSON de imágenes
    $avatar_json = is_array($avatar) ? json_encode($avatar) : $avatar;

    // Armado del UPDATE (ahora incluye tipoid)
    $sql = "UPDATE $tabla SET 
            nombreProducto = :nombreProducto, 
            categoriaProducto = :categoriaProducto, 
            tipoid = :tipoid,
            precio = :precio, 
            descripcion = :descripcion, 
            tallas = :tallas, 
            especificaciones = :especificaciones, 
            avatar = :avatar
            WHERE id = :id";

    // Preparar y ejecutar la consulta
    $query = $bd->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':nombreProducto', $nombreProducto);
    $query->bindValue(':categoriaProducto', $categoriaProducto);
    $query->bindValue(':tipoid', $tipoid, PDO::PARAM_INT);
    $query->bindValue(':precio', $precio);
    $query->bindValue(':descripcion', $descripcion);
    $query->bindValue(':tallas', $tallas);
    $query->bindValue(':especificaciones', $especificaciones);
    $query->bindValue(':avatar', $avatar_json);
    
    $query->execute();
}




//Función para eliminar el registro del producto
function eliminarProducto($bd,$tabla,$datos){
    //Recopilación de datos del $_POST
    $id=intval($datos['id']);
    //Armado el delete
    $sql= "delete from $tabla where id= :id";
    //Inserción de datos en la sentencia
    $query=$bd->prepare($sql);
    $query->bindvalue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    if($query->rowCount()>0){
        echo "<h2 style='text-align:center'>Registro eliminado</h2>";
    }else{
        echo "<h2 style='text-align:center'>No se pudo elimiar el registro</h2>";
    }
}
function obtenerImagenes($bd, $id) {
    $sql = "SELECT avatar FROM producto WHERE id = :id";
    $query = $bd->prepare($sql);
    $query->execute([$id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function guardarImagenes($bd, $tabla, $id, $imagenes) {
    foreach ($imagenes as $imagen) {
        // Aquí deberías insertar la ruta de la imagen en la base de datos
        $consulta = $bd->prepare("INSERT INTO imagenes (producto_id, ruta) VALUES (?, ?)");
        $consulta->execute([$id, $imagen]);
    }
}







//TEAM//TEAM//TEAM//TEAM//TEAM//TEAM//TEAM
//TEAM//TEAM//TEAM//TEAM//TEAM//TEAM//TEAM
//TEAM//TEAM//TEAM//TEAM//TEAM//TEAM//TEAM
//TEAM//TEAM//TEAM//TEAM//TEAM//TEAM//TEAM
//TEAM//TEAM//TEAM//TEAM//TEAM//TEAM//TEAM
//TEAM//TEAM//TEAM//TEAM//TEAM//TEAM//TEAM



function obtenerTeam($bd,$tabla) {
    $sql = "SELECT * FROM $tabla"; // Asegúrate de que la tabla y columnas sean correctas
    $query = $bd->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
function buscarTeam($bd,$tabla,$busqueda,$tipoBusqueda){
    //Armar la consulta
    $sql = "select * from $tabla where  $tipoBusqueda like :busqueda";
    //Preparar la consulta
    $query= $bd->prepare($sql);
    $query->bindValue(':busqueda', "%".$busqueda."%");    
    //Ejecutar la consulta
    $query->execute();
    //Traer los datos de la consulta
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    // dd($usuarios);
    return $usuarios;   
}
function listarTeam($bd, $tabla){
    //Armar la consulta
    $sql = "select * from $tabla";
    //Preparar la consulta
    $query= $bd->prepare($sql);
    //Ejecutar la consulta
    $query->execute();
    //Traer los datos de la consulta
    $team = $query->fetchAll(PDO::FETCH_ASSOC);
    return $team;
} 
function validarTeam($datos,$imagen){
    $errores = [];
    $nombre = trim($datos['nombre']);
    $apellido = trim($datos['apellido']);
    if($nombre === ''){
        $errores['nombre'] = 'El campo nombre no puede estar vacio';
    }    
    if(empty($apellido)){
        $errores['apellido'] = 'El campo apellido no puede estar vacio';
    }
    //Validar si me mandaron la imagen
    if(isset($imagen)){
        //dd($imagen);
        if($imagen['avatar']['error']!=0){
            $errores['avatar'] = 'Debe subir una imagen';
        }
    }
    return $errores;
}
function armarLaImagenTeam($imagen){
    $avatar = $imagen['imgteamrats']['name']; // Cambié 'avatar' a 'imgteamrats'
    $ext = pathinfo($avatar, PATHINFO_EXTENSION);
    $archivoOrigen = $imagen['imgteamrats']['tmp_name'];
    $nombreArchivo = uniqid('avatar-').'.'.$ext;
    $ruta = dirname(__DIR__).'/imgRats/Team/';
    $archivoDestino = $ruta.$nombreArchivo;
    
    move_uploaded_file($archivoOrigen, $archivoDestino);
    return $nombreArchivo;
}

function guardarTeam($bd,$tabla,$datos,$imgteamrats){
    //Organizar los datos a ser guardados
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    
    //Armar la consulta
    $sql = "insert into $tabla (nombre,apellido,imgteamrats) values (:nombre,:apellido,:imgteamrats)";
    //Preparar la consulta
    $query = $bd->prepare($sql);
    $query->bindValue(':nombre', $nombre);
    $query->bindValue(':apellido', $apellido);
    $query->bindValue(':imgteamrats', $imgteamrats);
    $query->execute();
}
function detalleDeportista($bd, $id, $table) {
    // Armado de la sentencia
    $sql = "SELECT * FROM $table WHERE idteamrats = :id"; // Cambia 'id' por 'idteamrats'
    // Ejecución de la sentencia
    $query = $bd->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT); // Usar parámetros preparados
    $query->execute();
    // Lectura de los datos obtenidos en la sentencia como Array Asociativo
    $team = $query->fetch(PDO::FETCH_ASSOC);
    return $team;
}
function armarLaImagenDeportista($imagen) {
    $avatar = $imagen['imgteamrats']['name'];
    $ext = pathinfo($avatar, PATHINFO_EXTENSION);
    $archivoOrigen = $imagen['imgteamrats']['tmp_name'];
    $nombreArchivo = uniqid('avatar-') . '.' . $ext;
    $ruta = dirname(__DIR__) . '/imgRats/Team/';
    $archivoDestino = $ruta . $nombreArchivo;

    move_uploaded_file($archivoOrigen, $archivoDestino);
    return $nombreArchivo;
}

function modificarDeportista($bd, $tabla, $datos) {
    // Recopilación de datos $_POST
    $id = intval($datos['id']);
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];    
    $imgteamrats = $datos['imgteamrats'];

    // Armado del update
    $sql = "UPDATE $tabla SET nombre = :nombre, apellido = :apellido, imgteamrats = :imgteamrats WHERE idteamrats = :idteamrats";

    // Inserción de datos en la sentencia
    $query = $bd->prepare($sql);    
    $query->bindValue(':idteamrats', $id);
    $query->bindValue(':nombre', $nombre);
    $query->bindValue(':apellido', $apellido);
    $query->bindValue(':imgteamrats', $imgteamrats);

    // Ejecución de la consulta y manejo de errores
    if ($query->execute()) {
        return true;
    } else {
        $errorInfo = $query->errorInfo();
        throw new Exception("Error al modificar deportista: " . $errorInfo[2]);
    }
}



function eliminarDeportista($bd, $tabla, $datos) {
    try {
        $id = intval($datos['id']);
        $sql = "DELETE FROM $tabla WHERE idteamrats = :id";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if ($query->rowCount() > 0) {
            echo "<h2 style='text-align:center'>Registro eliminado</h2>";
        } else {
            echo "<h2 style='text-align:center'>No se pudo eliminar el registro</h2>";
        }
    } catch (Exception $e) {
        echo "<h2 style='text-align:center'>Error: " . $e->getMessage() . "</h2>";
    }
}





//EVENTO//EVENTO//EVENTO//EVENTO//EVENTO//EVENTO
//EVENTO//EVENTO//EVENTO//EVENTO//EVENTO//EVENTO
//EVENTO//EVENTO//EVENTO//EVENTO//EVENTO//EVENTO
//EVENTO//EVENTO//EVENTO//EVENTO//EVENTO//EVENTO
//EVENTO//EVENTO//EVENTO//EVENTO//EVENTO//EVENTO
//EVENTO//EVENTO//EVENTO//EVENTO//EVENTO//EVENTO


function validarEvento($datos, $imagen) {
    $errores = [];
    $nombre = trim($datos['nombreevento']);
    if ($nombre === '') {
        $errores['nombreevento'] = 'El campo nombre no puede estar vacío';
    }
    
    // Validar si me mandaron la imagen
    if (!isset($imagen['imgevento']) || $imagen['imgevento']['error'] != 0) {
        $errores['imgevento'] = 'Debe subir una imagen';
    }
    
    return $errores;
}

function armarLaImagenEvento($imagen) {
    $avatar = $imagen['imgevento']['name'];
    $ext = pathinfo($avatar, PATHINFO_EXTENSION);
    $archivoOrigen = $imagen['imgevento']['tmp_name'];
    $nombreArchivo = uniqid('evento-') . '.' . $ext;
    $ruta = dirname(__DIR__) . '/imgRats/Eventos/';
    $archivoDestino = $ruta . $nombreArchivo;

    move_uploaded_file($archivoOrigen, $archivoDestino);
    return $nombreArchivo;
}

function guardarEvento($bd, $tabla, $datos, $imgevento) {
    // Organizar los datos a ser guardados
    $nombre = $datos['nombreevento'];

    // Armar la consulta
    $sql = "INSERT INTO $tabla (nombreevento, imgevento) VALUES (:nombreevento, :imgevento)";
    
    // Preparar la consulta
    $query = $bd->prepare($sql);
    $query->bindValue(':nombreevento', $nombre);
    $query->bindValue(':imgevento', $imgevento);
    $query->execute();
}

function buscarEvento($bd,$tabla,$busqueda,$tipoBusqueda){
    //Armar la consulta
    $sql = "select * from $tabla where  $tipoBusqueda like :busqueda";
    //Preparar la consulta
    $query= $bd->prepare($sql);
    $query->bindValue(':busqueda', "%".$busqueda."%");    
    //Ejecutar la consulta
    $query->execute();
    //Traer los datos de la consulta
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    // dd($usuarios);
    return $usuarios;   
}
function listarEvento($bd, $tabla){
    //Armar la consulta
    $sql = "select * from $tabla";
    //Preparar la consulta
    $query= $bd->prepare($sql);
    //Ejecutar la consulta
    $query->execute();
    //Traer los datos de la consulta
    $team = $query->fetchAll(PDO::FETCH_ASSOC);
    return $team;
}

function detalleEvento($bd, $id, $table) {
    // Armado de la sentencia
    $sql = "SELECT * FROM $table WHERE idevento = :id";
    // Ejecución de la sentencia
    $query = $bd->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT); // Usar parámetros preparados
    $query->execute();
    // Lectura de los datos obtenidos en la sentencia como Array Asociativo
    $evento = $query->fetch(PDO::FETCH_ASSOC);
    return $evento;
}

function modificarEvento($bd, $tabla, $datos) {
    // Recopilación de datos $_POST
    $id = intval($datos['idevento']);
    $nombreevento = $datos['nombreevento'];
    $imgevento = $datos['imgevento'];

    // Armado del update
    $sql = "UPDATE $tabla SET nombreevento = :nombreevento, imgevento = :imgevento WHERE idevento = :idevento";

    // Inserción de datos en la sentencia
    $query = $bd->prepare($sql);
    $query->bindValue(':nombreevento', $nombreevento);
    $query->bindValue(':imgevento', $imgevento);
    $query->bindValue(':idevento', $id, PDO::PARAM_INT);

    // Ejecución de la consulta y manejo de errores
    if ($query->execute()) {
        return true;
    } else {
        $errorInfo = $query->errorInfo();
        throw new Exception("Error al modificar evento: " . $errorInfo[2]);
    }
}

function obtenerEvento($bd,$tabla) {
    $sql = "SELECT * FROM $tabla"; 
    $query = $bd->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}


function eliminarEvento($bd, $tabla, $datos) {
    try {
        $id = intval($datos['id']);
        $sql = "DELETE FROM $tabla WHERE idevento = :id";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if ($query->rowCount() > 0) {
            echo "<h2 style='text-align:center'>Registro eliminado</h2>";
        } else {
            echo "<h2 style='text-align:center'>No se pudo eliminar el registro</h2>";
        }
    } catch (Exception $e) {
        echo "<h2 style='text-align:center'>Error: " . $e->getMessage() . "</h2>";
    }
}

//RECLAMO//RECLAMO//RECLAMO//RECLAMO//RECLAMO//RECLAMO//RECLAMO
//RECLAMO//RECLAMO//RECLAMO//RECLAMO//RECLAMO//RECLAMO
//RECLAMO//RECLAMO//RECLAMO//RECLAMO//RECLAMOV
//RECLAMO//RECLAMO//RECLAMO//RECLAMO//RECLAMO//RECLAMO
//RECLAMO//RECLAMO//RECLAMO//RECLAMO//RECLAMO

function listarReclamos($bd, $tabla) {
    $sql = "select * from $tabla where estado != 'atendido' ";
    $query = $bd->prepare($sql);
    $query -> execute();
    $reclamos = $query->fetchAll(PDO::FETCH_ASSOC);
    return $reclamos;
}

function detalleReclamos($bd, $id, $table){
    $sql = " select * from $table where id = :id";
    $query = $bd -> prepare($sql);
    $query->bindvalue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $reclamos = $query->fetch(PDO::FETCH_ASSOC);
    return $reclamos;
}



/************************* */
/************************* */
/*******perfil cliente**** */
/************************* */
/************************* */

function obtenerUsuarioPorId($bd, $idUsuario) {
    $stmt = $bd->prepare("SELECT id, nombre, apellidos, correo
                            FROM usuariorats
                            WHERE correo = :correo");
    $stmt->bindValue(':correo', $idUsuario, PDO::PARAM_INT);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    return $usuario ? $usuario : null;
}
/*
function obtenerPedidosPorUsuario(PDO $bd, int $idUsuario): array {
    $stmt = $bd->prepare("
        SELECT 
            p.id, 
            p.fecha_pedido, 
            e.estado, 
            p.monto_total, 
            e.descripcion_cliente
        FROM pedidos p
        JOIN estados_pedido e ON p.estado_id = e.id
        WHERE p.usuario_id = :usuario_id 
        ORDER BY p.fecha_pedido DESC
    ");
    $stmt->bindValue(':usuario_id', $idUsuario, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
*/