<?php

session_start();                              
include 'datos/vehiculos.php';                 
include 'includes/funciones.php';              

$titulo = 'Inicio';
$pagina = 'inicio';
$css = 'home.css';
$js = 'home.js';

include 'includes/header.php';                 
?>

    <main>
        <section class="hero-section">
            <h2>Bienvenidos a nuestro concesionario</h2>
            <p>Explorá nuestro catálogo de autos y encontrá el vehículo ideal para vos.</p>
        </section>

        <section class="destacados">
            <h3>Vehículos Destacados</h3>

            <?php foreach ($vehiculos as $v) { ?>
                <?php if ($v['destacado']) { ?>
                <article>
                    <img src="img/<?php echo $v['imagen']; ?>" alt="<?php echo limpiar($v['nombre']); ?>" width="250">
                    <h3><?php echo limpiar($v['nombre']); ?></h3>
                    <p>Año: <?php echo $v['anio']; ?> - Precio: <?php echo formato_precio($v['precio']); ?></p>
                   
                    <a href="detalle.php?id=<?php echo $v['id']; ?>">Ver detalle del vehículo</a>
                </article>
                <?php } ?>
            <?php } ?>

            <div style="grid-column: 1 / -1; text-align: center; margin-top: 1rem;">
                <a href="catalogo.php" class="btn-main">Ver todo el stock</a>
            </div>
        </section>
    </main>

<?php include 'includes/footer.php'; ?>
