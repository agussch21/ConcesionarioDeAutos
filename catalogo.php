<?php

session_start();
include 'datos/vehiculos.php';
include 'includes/funciones.php';

$titulo = 'Catálogo';
$pagina = 'catalogo';
$css = 'catalogo.css';
$js = 'catalogo.js';

include 'includes/header.php';
?>
    <main class="catalogo-layout">
        <h2>Catálogo de Vehículos</h2>
        <p class="catalogo-subtitulo">Explorá nuestra selección completa de autos, motos y camionetas.</p>

        <div class="catalogo-grid-container">
            <aside class="filtros-sidebar">
                <div class="filtros-header">
                    <h3>Filtros</h3>
                    <button class="btn-limpiar" type="reset">× Limpiar</button>
                </div>

                <form>
                    <div class="filtro-grupo">
                        <label for="tipo">Tipo</label>
                        <select id="tipo" name="tipo">
                            <option value="">Todos</option>
                            <option value="auto">Auto</option>
                            <option value="moto">Moto</option>
                            <option value="camioneta">Camioneta</option>
                        </select>
                    </div>

                    <div class="filtro-grupo">
                        <label for="marca">Marca</label>
                        <select id="marca" name="marca">
                            <option value="">Todas</option>
                            <option>Ford</option>
                            <option>Volkswagen</option>
                            <option>Honda</option>
                            <option>Yamaha</option>
                            <option>Nissan</option>
                        </select>
                    </div>

                    <div class="filtro-grupo">
                        <label for="modelo">Modelo</label>
                        <select id="modelo" name="modelo">
                            <option value="">Todos</option>
                        </select>
                    </div>

                    <div class="filtro-grupo">
                        <label for="precio">Precio máximo</label>
                        <input type="number" id="precio" name="precio" placeholder="Ej: 30000000">
                    </div>

                    <button type="submit" class="btn-ver-detalle" style="width: 100%; border: none; cursor: pointer; margin-top: 0.5rem;">Buscar</button>
                </form>
            </aside>

            <section class="autos-lista">
                <?php foreach ($vehiculos as $v) { ?>
                <article class="vehiculo-card-horizontal">
                    <img src="img/<?php echo $v['imagen']; ?>" alt="<?php echo limpiar($v['nombre']); ?>">
                    <div class="vehiculo-info-principal">
                        <span><?php echo $v['tipo']; ?></span>
                        <h3><?php echo limpiar($v['nombre']); ?></h3>
                        <p class="vehiculo-version">Año: <?php echo $v['anio']; ?></p>
                    </div>
                    <div class="vehiculo-accion">
                        <span class="vehiculo-precio-catalogo"><?php echo formato_precio($v['precio']); ?></span>
                        <a href="detalle.php?id=<?php echo $v['id']; ?>" class="btn-ver-detalle">Ver detalles</a>
                    </div>
                </article>
                <?php } ?>
            </section>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>
