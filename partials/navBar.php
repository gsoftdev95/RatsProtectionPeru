<?php
require_once('helpers/dd.php');
require_once('controladores/funciones.php');
require_once('partials/conexionBD.php');

// Consulta todos los productos con su tipo
$sql = "SELECT p.*, t.categoria AS tipo_nombre
        FROM productos p
        JOIN tipoproductos t ON p.tipoid = t.id";

$stmt = $bd->prepare($sql);
$stmt->execute();
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Agrupar por categoría y dentro de cada una, por tipoid
$menu_categorias = [];

foreach ($datos as $row) {
    $categoria = $row['categoriaProducto'];
    $tipoid = $row['tipoid'];

    if (!isset($menu_categorias[$categoria])) {
        $menu_categorias[$categoria] = [];
    }

    if (!isset($menu_categorias[$categoria][$tipoid])) {
        $menu_categorias[$categoria][$tipoid] = [];
    }

    $menu_categorias[$categoria][$tipoid][] = [
        'id' => $row['id'],
        'nombre' => $row['nombreProducto']
    ];
}

// Etiquetas de tipo
$etiquetas_tipo = [
    1 => 'Protecciones',
    3 => 'Accesorios',
    2 => 'Ropa'
];
?>

<nav class="navbar navbar-expand-lg m-0 p-0">
    <?php if(isset($_SESSION['nombre'])) :?>
    <div class="my-2 my-lg-0 navbar-nav navwelcome">   
        
        <div class="welcometext">!Hola, <?=$_SESSION['nombre'] ?>!</div>
        
        <?php if(isset($_SESSION['nombre'])):?>            
            <?php if($_SESSION['perfil']== 9):?>
            <div class="li_enc1 nav-item">
                <a class="enc1Admin nav-link" href="administrar.php">Administrar</a>
            </div>
            <?php endif;?>
        <?php endif;?> 
    </div>
    <?php endif;?>  
            
    <div class="navMain container-fluid m-0 p-0" id="logymen">
        <a class="navbar-brand" href="./index.php"><!--href="https://ratsprotectionperu.com/"-->
            <div class="logorats">
                <img src="./imagenes/logo_negro_sin_fondo300x89.png">
            </div>
        </a>
        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse m-0 p-0 container-fluid" id="navbarSupportedContent">
            <ul class="container2menu navbar-nav me-auto mb-2 mb-lg-0 p-0 " >
                <?php foreach ($menu_categorias as $categoria => $tipos): ?>
                    <li class="nav-item dropdown textmenu">
                        <a class="nav-link dropdown-toggle text-black" href="./productos?categoria=<?= $categoria?>" role="button" data-bs-toggle="" aria-expanded="false">
                            <?= htmlspecialchars($categoria) ?>
                        </a>
                        <ul class="dropdown-menu menus2">
                            <?php foreach ([1, 3, 2] as $tipoid): ?>
                                <?php if (isset($tipos[$tipoid])): ?>
                                    <li class="dropdown-header fw-bold"><?= $etiquetas_tipo[$tipoid] ?></li>
                                    <?php foreach ($tipos[$tipoid] as $producto): ?>
                                        <li>
                                            <a class="dropdown-item" href="./detalleProducto.php?id=<?= $producto['id'] ?>">
                                                <?= htmlspecialchars($producto['nombre']) ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                    <li><hr class="dropdown-divider"></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
                <li class="nav-item dropdown textmenu">
                    <a class="nav-link text-black" href="./TeamRats" role="button" data-bs-toggle="" aria-expanded="false">
                        Team Rats
                    </a>                        
                </li>
                <li class="nav-item dropdown textmenu">
                    <a class="nav-link text-black" href="./Eventos" role="button" data-bs-toggle="" aria-expanded="false">
                        Eventos
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="log" >
            <?php if(isset($_SESSION['nombre'])) :?> 
                <div class="logout">                    
                    <a class="nav-link" href="logout.php">Cerrar sesión</a>
                </div>
                <?php else :?>
                
                <div class="loginIco nav-item">
                    <a class="nav-link" href="./IniciarSesion"><span class="icon-user"></span></a>
                </div>    
            <?php endif;?>
        </div>                
    </div>   
</nav>
