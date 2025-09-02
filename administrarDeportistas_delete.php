<?php
    require_once('helpers/dd.php');
    require_once('controladores/funciones.php');
    controlIngreso();
    require_once('partials/conexionBD.php');
    //controll de accesso por roles
    require_once('controladores/controlAcceso.php');
    
    if($_GET &&  trim($_GET['busqueda']) != ''){
        $team = buscarTeam($bd, 'teamrats', $_GET['busqueda'], $_GET['tipoBusqueda']);
    }else{
        $team = listarTeam($bd, 'teamrats');
    }
  
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once('./partials/head.php')?>
</head>
<body>
    <header>
        <?php include_once('./partials/navBar.php')?>
    </header>
    
    <section class="container-fluid m-0 p-0">        
        <section class="col-12 container-fluid m-0 p-0">
            <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5">Administrar Team Rats</h2>            
        </section>
        <article class="container-fluid col-12">
            <section class="container-fluid d-flex justify-content-between">
                <form class="formularioAdministracion mt-3 mb-4" role="search" action="#" method="GET" >
                    <input class="form-control me-2 w-50" type="search" placeholder="Buscador..." aria-label="Search" name="busqueda">
                    <select name="tipoBusqueda" id="tipoBusqueda">
                    <option class="m-1 text-primary-emphasis" value="nombre">Por nombre</option>
                    <option class="m-1 text-primary-emphasis" value="apellido">Por apellido</option>
                    </select>
                    <button class="btn btn-success rounded-0 m-1" type="submit">Buscar</button>
                    <div class="form-group">                    
                        <a  class="btn btn-secondary rounded-0" href="./administrar.php">Volver</a>
                    </div>                       
                </form>    
                <div class="mx-2 mt-3"><a class="text-decoration-none text-dark" href="AddTeamRats.php"><span class="icon-plus"></span> Agregar deportista</a></div> 
            </section>
            

            <!-- <h4 ><a class="pl-3" href="incluirUsuario.php"><ion-icon name="person-add-outline"></ion-icon></a></h4> -->
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
                    <?php foreach ($team as $id => $teams) :?>
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
        </article>
    </section>
    
    
        
    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>
        
    
    
    
    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>