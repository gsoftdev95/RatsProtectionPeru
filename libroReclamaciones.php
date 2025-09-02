<?php
    require_once('helpers/dd.php');
    require_once('controladores/funciones.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once('./partials/head.php')?>
    <style>
        .libro-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .libro-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .libro-header img {
            max-width: 120px;
            margin-bottom: 10px;
        }
        .libro-header h1 {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>    
    <header>
        <?php include_once('./partials/navBar.php')?>
    </header>

    <main class="container my-5">
        <section class="libro-container">
            <div class="libro-header">
                <img src="./imagenes/libroRec.png" alt="Libro de Reclamaciones">
                <h1>Libro de Reclamaciones Virtual</h1>
                <p>Conforme a lo establecido en el Código de Protección y Defensa del Consumidor</p>
            </div>

            <form action="guardar_reclamo.php" method="POST" class="border p-4 rounded bg-light">
                <h4>Datos del Consumidor</h4>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre y Apellidos</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI / CE / Pasaporte</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono">
                </div>

                <h4>Detalle del Reclamo</h4>
                <div class="mb-3">
                    <label for="producto" class="form-label">Producto o Servicio</label>
                    <input type="text" class="form-control" id="producto" name="producto" required>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select class="form-select" id="tipo" name="tipo" required>
                        <option value="">Seleccione</option>
                        <option value="Reclamo">Reclamo (disconformidad relacionada al producto/servicio)</option>
                        <option value="Queja">Queja (malestar o descontento con la atención)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="detalle" class="form-label">Detalle del reclamo/queja</label>
                    <textarea class="form-control" id="detalle" name="detalle" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="pedido" class="form-label">Pedido del consumidor</label>
                    <textarea class="form-control" id="pedido" name="pedido" rows="3" required></textarea>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="consentimiento" required>
                    <label class="form-check-label" for="consentimiento">
                        Declaro que los datos consignados son correctos y verídicos.
                    </label>
                </div>

                <!-- 🔹 Información legal obligatoria -->
                <div class="alert alert-secondary mt-4" role="alert" style="font-size: 0.9rem; line-height:1.4;">
                    <p><b>RECLAMO:</b> Disconformidad relacionada a los productos o servicios.</p>
                    <p><b>QUEJA:</b> Disconformidad no relacionada a los productos o servicios o malestar o descontento respecto a la atención al público.</p>
                    <p>La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito previo para interponer una denuncia ante el INDECOPI.</p>
                    <p>El proveedor deberá dar respuesta al reclamo en un plazo no mayor de <b>treinta (30) días calendario</b>, pudiendo ampliar el plazo hasta por treinta (30) días más, previa comunicación al consumidor.</p>
                </div>

                <button type="submit" class="btn btn-danger w-100">Registrar Reclamo</button>
            </form>

            <p class="mt-3 text-muted">
                Nota: La empresa deberá dar respuesta a su reclamo en un plazo máximo de 30 días calendario.
            </p>
        </section>
    </main>

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>

    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
