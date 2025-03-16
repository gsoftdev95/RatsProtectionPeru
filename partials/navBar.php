<?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary d-block m-0 p-0">
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
            
    <div class="container-fluid m-0 p-0 border border-light-subtle" id="logymen">
        <a class="navbar-brand" href="./index">
            <div class="logorats">
                <img src="./imagenes/logo_negro_sin_fondo300x89.png" alt="">
            </div>
        </a>
        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse m-0 p-0 container-fluid" id="navbarSupportedContent">
            <ul class="container2menu navbar-nav me-auto mb-2 mb-lg-0 p-0 " >
                <li class="nav-item dropdown textmenu">
                    <a class="nav-link dropdown-toggle text-black" href="./productos.php?categoria=MTB" role="button" data-bs-toggle="" aria-expanded="false">
                        MTB
                    </a>
                    <ul class="dropdown-menu menus2">
                        <li><a class="dropdown-item" href="./productoCategoria?id=1">Canilleras</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=2">Coderas</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=3">Guantes</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=4">Impact Short</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=5">Peto</a></li>                            
                        <li><a class="dropdown-item" href="./productoCategoria?id=6">Rodilleras</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=7">Tobilleras</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=8">Bag Bike MTB</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=9">Bolsa Hidratante</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=10">Helmet Bag</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=11">Hip Pack</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=12">Jersey Space Air</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=13">Pantalón</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=14">Short</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=15">Strap</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=16">Tailgate Cover</a></li>
                        
                    </ul>
                </li>
                <li class="nav-item dropdown textmenu">
                    <a class="nav-link dropdown-toggle text-black" href="./productos.php?categoria=BMX" role="button" data-bs-toggle="" aria-expanded="false">
                        BMX
                    </a>
                    <ul class="dropdown-menu menus2">
                        <li><a class="dropdown-item" href="./productoCategoria?id=17">Canilleras</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=18">Coderas</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=19">Guantes</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=20">Impact Short</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=21">Rodicanilleras</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=22">Rodilleras</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=23">Tobilleras</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=24">Bag Pack</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=25">Maleta BMX</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=26">Frame Bag</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=27">Switch Pack</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown textmenu">
                    <a class="nav-link dropdown-toggle text-black" href="./productos.php?categoria=Roller" role="button" data-bs-toggle="" aria-expanded="false">
                        Roller
                    </a>
                    <ul class="dropdown-menu menus2">
                        <li><a class="dropdown-item" href="./productoCategoria?id=28">Canilleras</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=29">Coderas</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=30">Guantes</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=31">Impact Short</a></li>                            
                        <li><a class="dropdown-item" href="./productoCategoria?id=32">Rodilleras</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown textmenu">
                    <a class="nav-link dropdown-toggle text-black" href="./productos.php?categoria=ScooterSkate" role="button" data-bs-toggle="" aria-expanded="false">
                        Scooter/Skate
                    </a>
                    <ul class="dropdown-menu menus2">
                        <li><a class="dropdown-item" href="./productoCategoria?id=33">Canilleras</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=34">Coderas</a></li>                            
                        <li><a class="dropdown-item" href="./productoCategoria?id=35">Impact Short</a></li>                            
                        <li><a class="dropdown-item" href="./productoCategoria?id=36">Rodilleras</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown textmenu">
                    <a class="nav-link dropdown-toggle text-black" href="./productos.php?categoria=Kids" role="button" data-bs-toggle="" aria-expanded="false">
                        Kids
                    </a>
                    <ul class="dropdown-menu menus2">                            
                        <li><a class="dropdown-item" href="./productoCategoria?id=37">Coderas</a></li>                            
                        <li><a class="dropdown-item" href="./productoCategoria?id=38">Impact Short</a></li>                            
                        <li><a class="dropdown-item" href="./productoCategoria?id=39">Peto</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=40">Rodicanilleras</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown textmenu">
                    <a class="nav-link dropdown-toggle text-black" href="./productos.php?categoria=Extras" role="button" data-bs-toggle="" aria-expanded="false">
                        Extras
                    </a>
                    <ul class="dropdown-menu menus2">
                        <li><a class="dropdown-item" href="./productoCategoria?id=41">Bag Pack</a></li>
                        <li><a class="dropdown-item" href="./productoCategoria?id=42">Caps</a></li>                            
                        <li><a class="dropdown-item" href="./productoCategoria?id=43">Key Chain</a></li>                            
                        <li><a class="dropdown-item" href="./productoCategoria?id=44">Polera</a></li>
                    </ul>
                </li>
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
