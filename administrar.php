<?php
require_once('helpers/dd.php');
require_once('controladores/funciones.php');
require_once('partials/conexionBD.php');
require_once('controladores/controlAcceso.php');

$totalClientes = contarClientes($bd,'usuariorats');
$totalProductos = contarProductos($bd,'productos');
$totalTeam = contarTeam($bd,'teamrats');
$TotalEventos = contarEventos($bd,'eventosrats');


if(isset($_GET['busquedaProducto']) && trim($_GET['busquedaProducto']) != ''){
    $productoAdmin = buscarProductos($bd, 'productos', $_GET['busquedaProducto'], $_GET['tipoBusqueda']);
}else{
    $productoAdmin = listarProductos($bd, 'productos');
}
$busquedaActivaProductos = isset($_GET['busquedaProducto']) && trim($_GET['busquedaProducto']) !== '';


if(isset($_GET['busquedaUsuario']) && trim($_GET['busquedaUsuario']) != ''){
    $usuariosAdmin = buscarUsuarios($bd, 'usuariorats', $_GET['busquedaUsuario'], $_GET['tipoBusqueda']);
}else{
    $usuariosAdmin = listarUsuarios($bd, 'usuariorats');
}
$busquedaActivaClientes = isset($_GET['busquedaUsuario']) && trim($_GET['busquedaUsuario']) !== '';


if(isset($_GET['busquedaTeam']) && trim($_GET['busquedaTeam']) != ''){
    $TeamAdmin = buscarTeam($bd, 'teamrats', $_GET['busquedaTeam'], $_GET['tipoBusqueda']);
}else{
    $TeamAdmin = listarTeam($bd, 'teamrats');
}
$busquedaActivaTeam = isset($_GET['busquedaTeam']) && trim($_GET['busquedaTeam']) !== '';


if(isset($_GET['busquedaEvento']) && trim($_GET['busquedaEvento']) != ''){
    $EventoAdmin = buscarEvento($bd, 'eventosrats', $_GET['busquedaEvento'], $_GET['tipoBusqueda']);
}else{
    $EventoAdmin = listarEvento($bd, 'eventosrats');
}
$busquedaActivaEvento = isset($_GET['busquedaEvento']) && trim($_GET['busquedaEvento']) !== '';


?>

<!doctype html>
<html lang="es">
  <head>
    <?php include_once('./partials/head.php')?>
  </head>
  <body>    
    
    <header>
        <?php include_once('./partials/navBar.php')?>
    </header>

    <main class="mainAdmin">
        <!-- Sidebar -->
        <?php include_once('./partials/asideAdmin.php')?>

        <!-- Contenido principal -->
        <section class="admin-content">
            <section id="dashboard">
                <h1>Dashboard</h1>
                <div class="ContainerCardsDashboard">
                    <div class="cardDashboard cd1">
                    <p class="m-0">Productos:</p>
                    <p class="m-0" style="font-size:3rem"><?= $totalProductos ?></p>               
                    </div>
                    <div class="cardDashboard cd2">
                    <p class="m-0">Clientes:</p>
                    <p class="m-0" style="font-size:3rem"><?= $totalClientes ?></p>
                    </div>
                    <div class="cardDashboard cd3">
                    <p class="m-0">Team:</p>
                    <p class="m-0" style="font-size:3rem"><?= $totalTeam ?></p>
                    </div>
                    <div class="cardDashboard cd4">
                    <p class="m-0">Eventos:</p>
                    <p class="m-0" style="font-size:3rem"><?= $TotalEventos ?></p>
                    </div>
                </div>
            </section>

            <hr>

            <section id="productos">
                <h2>Gestión de Productos</h2>
                <p>Aquí puedes registrar, editar o eliminar productos.</p>          

                <section>
                Ver productos

                    <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#verProductos" aria-expanded="false" aria-controls="verProductos">
                        <span id="flechaProductos"><i class="bi bi-caret-down-fill"></i></span>
                    </button>

                    <section id="verProductos" class="collapse <?= $busquedaActivaProductos ? 'show' : '' ?>">
                        <section class="container-fluid d-flex justify-content-between">
                            <form class="formularioAdministracion mt-3 mb-4" role="search" action="#" method="GET" >
                                <input class="form-control me-2" type="search" placeholder="Buscador..." aria-label="Search" name="busquedaProducto">
                                <select name="tipoBusqueda" id="tipoBusqueda">
                                <option  class="m-1" value="nombreProducto">Por nombre</option>
                                <option  class="m-1" value="categoriaProducto">Por categoria</option>
                                </select>
                                <button class="btn btn-success rounded-0 m-1" data-bs-toggle="collapse" data-bs-target="#verProductos" aria-expanded="<?= $busquedaActivaProductos ? 'true' : 'false' ?>" aria-controls="verProductos">Buscar</button>
                            </form>
                            <div class="mx-2 mt-3 "><a class="text-decoration-none text-dark" href="AddProduct.php"><span class="icon-plus"></span> Agregar producto</a></div> 
                        </section>
                        
                        <section class="table-responsive-custom tableAdminProductCont">
                            <table class="tableAdministracion table table-striped-columns text-primary-emphasis containerfluid">
                                <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Nombre Producto</th>
                                        <th class="text-center">Categoria</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Ver</th>
                                        <th class="text-center">Editar</th>
                                        <th class="text-center">Eliminar</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productoAdmin as $id => $productoAdmins) :?>
                                        <tr>
                                            <td class="text-center text-primary-emphasis"><?= $productoAdmins['id'] ?></td>
                                            <td class="text-primary-emphasis"><?= $productoAdmins['nombreProducto']?></td> <!--"nombreProducto" es la columna de la BD-->
                                            <td class="text-center text-primary-emphasis"><?= $productoAdmins['categoriaProducto']?></td>
                                            <td class="text-center text-primary-emphasis"><?= $productoAdmins['precio']?></td>
                                            <!-- Envío de ID por Query String -->
                                            <td class="text-center text-primary-emphasis"><a href="detalleProducto.php?id=<?= $productoAdmins['id'];?>"><span class="icon-eye"></span></a></td>
                                            <!-- Envío de ID por Query String -->
                                            <td class="text-center text-primary-emphasis"><a href="modificarProducto.php?id=<?= $productoAdmins['id'];?>"><span class="icon-pencil"></span></a></td>
                                            <!-- Envío de ID por Query String -->
                                            <td class="text-center text-primary-emphasis"><a href="eliminarProducto.php?id=<?= $productoAdmins['id'];?>"><span class="icon-bin2"></span></a></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </section>
                    </section>
                </section>
            </section>

            <hr>

            <section id="clientes">
                <h2>Clientes</h2>
                <p>Lista de usuarios registrados y su actividad.</p>

                <section>
                    Ver clientes

                    <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#verClientes" aria-expanded="false" aria-controls="verClientes">
                        <span id="flechaProductos"><i class="bi bi-caret-down-fill"></i></span>
                    </button>

                    <section id="verClientes" class="collapse <?= $busquedaActivaClientes ? 'show' : '' ?>">
                        <div class="container-fluid d-flex justify-content-between">
                            <form class="formularioAdministracion mt-3 mb-4" role="search" action="#" method="GET" >
                                <input class="form-control me-2" type="search" placeholder="Buscador..." aria-label="Search" name="busquedaUsuario">
                                <select name="tipoBusqueda" id="tipoBusqueda">
                                <option class="m-1 text-primary-emphasis" value="nombre">Por nombre</option>
                                <option class="m-1 text-primary-emphasis" value="apellido">Por apellido</option>
                                </select>
                                <button class="btn btn-success rounded-0 m-1" data-bs-toggle="collapse" data-bs-target="#verUsuarios" aria-expanded="<?= $busquedaActivaClientes ? 'true' : 'false' ?>" aria-controls="verUsarios">Buscar</button>
                            </form>
                            <div class="mx-2 mt-3 "></div> 
                        </div>
                        
                        <section class="table-responsive-custom">
                            <table class="tableAdministracion table table-striped-columns text-primary-emphasis containerfluid ">
                                <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Apellido</th>
                                        <th class="text-center">Correo</th>
                                        <th class="text-center">Ver</th>
                                        <th class="text-center">Editar</th>
                                        <th class="text-center">Eliminar</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usuariosAdmin as $id => $usuario) :?>
                                        <tr>
                                            <td class="text-center text-primary-emphasis"><?= $usuario['id'] ?></td>
                                            <td class="text-center text-primary-emphasis"><?= $usuario['nombre']?></td>
                                            <td class="text-center text-primary-emphasis"><?= $usuario['apellidos']?></td>
                                            <td class="text-center text-primary-emphasis"><?= $usuario['correo']?></td>
                                            <!-- Envío de ID por Query String -->
                                            <td class="text-center text-primary-emphasis"><a href="detalleUsuario.php?id=<?= $usuario['id'];?>"><span class="icon-eye"></span></a></td>
                                            <!-- Envío de ID por Query String -->
                                            <td class="text-center text-primary-emphasis"><a href="modificarUsuario.php?id=<?= $usuario['id'];?>"><span class="icon-pencil"></span></a></td>
                                            <!-- Envío de ID por Query String -->
                                            <td class="text-center text-primary-emphasis"><a href="eliminarUsuario.php?id=<?= $usuario['id'];?>"><span class="icon-bin2"></span></a></td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </section>
                    </section>                
                </section>
            </section>

            <hr>

            <section id="team">
                <h2>Team Rats</h2>
                <p>Lista de miembros del team.</p>

                <section>
                    Ver team

                    <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#verTeam" aria-expanded="false" aria-controls="verTeam">
                        <span id="flechateam"><i class="bi bi-caret-down-fill"></i></span>
                    </button>

                    <section id="verTeam" class="collapse <?= $busquedaActivaTeam ? 'show' : '' ?>">
                        <div class="container-fluid d-flex justify-content-between">
                            <form class="formularioAdministracion mt-3 mb-4" role="search" action="#" method="GET" >
                                <input class="form-control me-2" type="search" placeholder="Buscador..." aria-label="Search" name="busquedaTeam">
                                <select name="tipoBusqueda" id="tipoBusqueda">
                                <option class="m-1 text-primary-emphasis" value="nombre">Por nombre</option>
                                <option class="m-1 text-primary-emphasis" value="apellido">Por apellido</option>
                                </select>
                                <button class="btn btn-success rounded-0 m-1" type="submit">Buscar</button>
                            </form>
                            <div class="mx-2 mt-3 "><a class="text-decoration-none text-dark" href="addTeamRats.php"><span class="icon-plus"></span> Agregar miembro</a></div> 
                            
                        </div>
                        
                        <section class="table-responsive-custom">
                            <table class="tableAdministracion table table-striped-columns text-primary-emphasis containerfluid" style="">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Ver</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($TeamAdmin as $id => $teams) :?>
                                        <tr>
                                            <td class="text-primary-emphasis"><?= $teams['idteamrats'] ?></td>
                                            <td class="text-primary-emphasis"><?= $teams['nombre']?></td>
                                            <td class="text-primary-emphasis"><?= $teams['apellido']?></td>                            
                                            <!-- Envío de ID por Query String -->
                                            <td><a href="detalleDeportista.php?id=<?= $teams['idteamrats'];?>"><span class="icon-eye"></span></a></td>
                                            <!-- Envío de ID por Query String -->
                                            <td><a href="modificarDeportista.php?id=<?= $teams['idteamrats'];?>"><span class="icon-pencil"></span></a></td>
                                            <!-- Envío de ID por Query String -->
                                            <td><a href="eliminarDeportista.php?id=<?= $teams['idteamrats'];?>"><span class="icon-bin2"></span></a></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </section>
                    </section>              
                </section>
            </section>
            
            <hr>

            <section id="evento">
                <h2>Eventos</h2>
                <p>Lista de eventos auspiciados o de difusión.</p>

                <section>
                    Ver eventos

                    <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#verEvento" aria-expanded="false" aria-controls="verEventos">
                        <span id="flechaEvento"><i class="bi bi-caret-down-fill"></i></span>
                    </button>

                    <section id="verEvento" class="collapse <?= $busquedaActivaTeam ? 'show' : '' ?>">
                        <div class="container-fluid d-flex justify-content-between">
                            <form class="formularioAdministracion mt-3 mb-4" role="search" action="#" method="GET" >
                                <input class="form-control me-2" type="search" placeholder="Buscador..." aria-label="Search" name="busquedaEvento">
                                <select name="tipoBusqueda" id="tipoBusqueda">
                                    <option class="m-1 text-primary-emphasis" value="nombre">Por nombre</option>
                                </select>                                
                                <button class="btn btn-success rounded-0 m-1" type="submit">Buscar</button>
                            </form>
                            <div class="mx-2 mt-3 "><a class="text-decoration-none text-dark" href="addEvento.php"><span class="icon-plus"></span> Agregar evento</a></div> 
                            
                        </div>
                        
                        <section class="table-responsive-custom">
                            <table class="tableAdministracion table table-striped-columns text-primary-emphasis containerfluid">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre de evento</th>
                                        <th>Ver</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($EventoAdmin as $id => $eventos) :?>
                                        <tr>
                                            <td class="text-primary-emphasis"><?= $eventos['idevento'] ?></td>
                                            <td class="text-primary-emphasis"><?= $eventos['nombreevento']?></td>                           
                                            <!-- Envío de ID por Query String -->
                                            <td><a href="detalleEvento.php?id=<?= $eventos['idevento'];?>"><span class="icon-eye"></span></a></td>
                                            <!-- Envío de ID por Query String -->
                                            <td><a href="modificarEvento.php?id=<?= $eventos['idevento'];?>"><span class="icon-pencil"></span></a></td>
                                            <!-- Envío de ID por Query String -->
                                            <td><a href="eliminarEvento.php?id=<?= $eventos['idevento'];?>"><span class="icon-bin2"></span></a></td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </section>
                    </section>              
                </section>
            </section>

            <hr>

            <section class="estadisticas">
                <h2>Estadisticas</h2>
                <p>estadisticas de la pagina</p>
                <!-- Google Tag Manager (noscript) -->
                <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NRFLP22S"
                height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
                <!-- End Google Tag Manager (noscript) -->
            </section>
        </section>
    </main>

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>

    <!--Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    


  </body>
</html>
