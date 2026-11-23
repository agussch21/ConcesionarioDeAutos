<?php
session_start();
include 'datos/vehiculos.php';
include 'includes/funciones.php';

$id = 0;
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
}

$v = buscar_vehiculo($vehiculos, $id);

$titulo = 'Detalle del Vehículo';
if ($v != false) {
    $titulo = $v['nombre'];
}
$pagina = 'detalle';
$css = 'detalle.css';

include 'includes/header.php';
?>

    <main class="detalle-container">
        <h2>Detalle del vehículo</h2>
        <p><a class="volver-link" href="catalogo.php">← Volver al catálogo</a></p>

        <?php if ($v == false) { ?>
            <p>No encontramos ese vehículo. <a class="volver-link" href="catalogo.php">Ver el catálogo completo</a></p>
        <?php } else { ?>
        <article class="vehiculo-detalle-item" id="auto-<?php echo $v['id']; ?>">
            <div class="detalle-card">
                <h2 class="detalle-nombre"><?php echo limpiar($v['nombre']); ?></h2>
                <div class="detalle-layout">
                    <div class="detalle-galeria">
                        <figure>
                            <img alt="<?php echo limpiar($v['nombre']); ?>" src="img/<?php echo $v['imagen']; ?>">
                        </figure>
                    </div>
                    <div class="detalle-contenido">
                        <section class="detalle-seccion">
                            <h3 class="detalle-titulo-seccion">Datos principales</h3>
                            <ul class="detalle-lista">
                                <li><strong>Tipo:</strong> <?php echo $v['tipo']; ?></li>
                                <li><strong>Año:</strong> <?php echo $v['anio']; ?></li>
                                <li><strong>Kilometraje:</strong> <?php echo number_format($v['km'], 0, ',', '.'); ?> km</li>
                                <li><strong>Combustible:</strong> <?php echo limpiar($v['combustible']); ?></li>
                                <li><strong>Transmisión:</strong> <?php echo limpiar($v['transmision']); ?></li>
                                <li><strong>Precio:</strong> <?php echo formato_precio($v['precio']); ?></li>
                            </ul>
                        </section>
                        <section class="detalle-seccion">
                            <h3 class="detalle-titulo-seccion">Descripción</h3>
                            <p><?php echo limpiar($v['descripcion']); ?></p>
                        </section>
                        <section class="detalle-seccion">
                            <h3 class="detalle-titulo-seccion">Características</h3>
                            <ul class="detalle-lista">
                                <?php foreach ($v['caracteristicas'] as $caracteristica) { ?>
                                <li><?php echo limpiar($caracteristica); ?></li>
                                <?php } ?>
                            </ul>
                        </section>
                        <p class="detalle-acciones" style="margin-top: 1.5rem;">

                            <a class="btn-ver-detalle" href="contacto.php?vehiculo=<?php echo urlencode($v['nombre']); ?>">Consultar por este vehículo</a> |
                            <a class="volver-link" href="catalogo.php">Volver al catálogo</a>
                        </p>
                    </div>
                </div>
            </div>
        </article>
        <?php } ?>
    </main>

<?php include 'includes/footer.php'; ?>
