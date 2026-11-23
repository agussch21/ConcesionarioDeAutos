<?php

session_start();
include 'datos/vehiculos.php';
include 'includes/funciones.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$autos = 0;
$motos = 0;
$camionetas = 0;
foreach ($vehiculos as $v) {
    if ($v['tipo'] == 'Auto') {
        $autos++;
    } elseif ($v['tipo'] == 'Moto') {
        $motos++;
    } else {
        $camionetas++;
    }
}

$consultas = [];
if (file_exists('datos/consultas.php')) {
    $lineas = file('datos/consultas.php', FILE_IGNORE_NEW_LINES);
    foreach ($lineas as $linea) {
        $partes = explode('|', $linea);
        if (count($partes) == 6) {
            $consultas[] = $partes;
        }
    }
    $consultas = array_reverse($consultas);   
}

$titulo = 'Panel de administración';
$pagina = 'panel';
$css = 'panel.css';

include 'includes/header.php';
?>

    <main class="panel-container">
        <h2>Panel de administración</h2>
        <p class="panel-saludo">Hola, <strong><?php echo limpiar($_SESSION['usuario']); ?></strong>. Esta página solo se ve con la sesión iniciada.</p>

        <div class="panel-resumen">
            <div class="resumen-item"><strong><?php echo count($vehiculos); ?></strong><span>Vehículos</span></div>
            <div class="resumen-item"><strong><?php echo $autos; ?></strong><span>Autos</span></div>
            <div class="resumen-item"><strong><?php echo $motos; ?></strong><span>Motos</span></div>
            <div class="resumen-item"><strong><?php echo $camionetas; ?></strong><span>Camionetas</span></div>
            <div class="resumen-item"><strong><?php echo count($consultas); ?></strong><span>Consultas</span></div>
        </div>

        <section class="panel-card">
            <h3>Consultas recibidas</h3>

            <?php if (count($consultas) == 0) { ?>
                <p class="panel-vacio">Todavía no llegó ninguna consulta.</p>
            <?php } else { ?>
                <div class="tabla-scroll">
                    <table>
                        <tr>
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Vehículo</th>
                            <th>Consulta</th>
                        </tr>
                        <?php foreach ($consultas as $partes) { ?>
                            <tr>
                                <td><?php echo limpiar($partes[0]); ?></td>
                                <td><?php echo limpiar($partes[1]); ?></td>
                                <td><?php echo limpiar($partes[2]); ?></td>
                                <td><?php echo limpiar($partes[3]); ?></td>
                                <td><?php echo limpiar($partes[4]); ?></td>
                                <td><?php echo limpiar($partes[5]); ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php } ?>

            <p class="panel-salir"><a href="logout.php">Cerrar sesión</a></p>
        </section>
    </main>

<?php include 'includes/footer.php'; ?>
