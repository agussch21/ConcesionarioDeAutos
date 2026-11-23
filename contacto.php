<?php
session_start();
include 'datos/vehiculos.php';
include 'includes/funciones.php';

$nombre = '';
$email = '';
$telefono = '';
$vehiculo = dato_get('vehiculo');  
$mensaje = '';
$errores = [];                      

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = dato_post('nombre');
    $email = dato_post('email');
    $telefono = dato_post('telefono');
    $vehiculo = dato_post('vehiculo');
    $mensaje = dato_post('mensaje');

        if (strlen($nombre) < 3) {
        $errores[] = 'Ingresá tu nombre (mínimo 3 letras).';
    } elseif (strlen($nombre) > 60) {
        $errores[] = 'El nombre es demasiado largo (máximo 60 caracteres).';
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s\'\-]+$/u', $nombre)) {
        $errores[] = 'El nombre solo puede tener letras, sin números ni símbolos.';
    }


    if ($email == '') {
        $errores[] = 'Ingresá tu correo electrónico.';
    } elseif (strpos($email, '@') === false || strpos($email, '.') === false || strlen($email) > 100) {
        $errores[] = 'El correo no es válido (ej: nombre@correo.com).';
    }

    if ($telefono != '') {
        $numeros = str_replace([' ', '-'], '', $telefono); 
        if (!is_numeric($numeros) || strlen($numeros) < 8 || strlen($numeros) > 15) {
            $errores[] = 'El teléfono no es válido (ej: 11 1234-5678).';
        }
    }

    if (strlen($mensaje) < 10) {
        $errores[] = 'Escribí tu consulta (mínimo 10 caracteres).';
    } elseif (strlen($mensaje) > 1000) {
        $errores[] = 'La consulta es demasiado larga (máximo 1000 caracteres).';
    }


    if (count($errores) == 0) {

        $linea = date('d/m/Y H:i') . '|' . para_archivo($nombre) . '|' . para_archivo($email) . '|'
               . para_archivo($telefono) . '|' . para_archivo($vehiculo) . '|' . para_archivo($mensaje) . "\n";

        $archivo = 'datos/consultas.php';
        if (!file_exists($archivo)) {
            file_put_contents($archivo, "<?php die('Acceso denegado'); ?>\n");
        }

        file_put_contents($archivo, $linea, FILE_APPEND);

        header('Location: contacto.php?enviado=1');
        exit;
    }
}

$enviado = isset($_GET['enviado']);

$titulo = 'Contacto';
$pagina = 'contacto';
$css = 'contacto.css';
$js = 'contacto.js';

include 'includes/header.php';
?>

    <main>
        <section class="contacto-seccion">
            <h2>Contacto</h2>

            <div class="contacto-grid">

                <div class="contacto-info-card">
                    <div class="info-bloque">
                        <h3>Ubicación</h3>
                        <p>Av. Gral. Juan Domingo Perón 3969, Gral. Pacheco.</p>
                        <p>Provincia de Buenos Aires</p>
                    </div>

                    <div class="info-bloque">
                        <h3>Horario:</h3>
                        <p>Lunes - Viernes: 09:00 - 19:00</p>
                        <p>Sábados: 09:00 - 13:00</p>
                    </div>

                    <div class="info-bloque">
                        <h3>Chateá</h3>
                        <a href="https://wa.me/5491100000000" target="_blank" class="btn-whatsapp">
                            <i class="fa-brands fa-whatsapp"></i> Contacto
                        </a>
                    </div>

                    <div class="info-bloque">
                        <h3>Seguinos:</h3>
                        <a href="#" target="_blank" class="btn-instagram" aria-label="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <form id="form-contacto" action="contacto.php" method="POST">
                    <div>
                        <label for="nombre">Nombre completo</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" maxlength="60" value="<?php echo limpiar($nombre); ?>" required>
                    </div>
                    <div>
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" maxlength="100" value="<?php echo limpiar($email); ?>" required>
                    </div>
                    <div>
                        <label for="telefono">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" placeholder="Ej: 11 1234-5678" maxlength="20" value="<?php echo limpiar($telefono); ?>">
                    </div>
                    <div>
                        <label for="vehiculo">Vehículo de interés</label>
                        <select id="vehiculo" name="vehiculo">
                            <option value="">Seleccioná un modelo (opcional)</option>
                            <?php foreach ($vehiculos as $v) { ?>
                            <option value="<?php echo limpiar($v['nombre']); ?>"<?php if ($vehiculo == $v['nombre']) { echo ' selected'; } ?>><?php echo limpiar($v['nombre']); ?></option>
                            <?php } ?>
                            <option value="Otro"<?php if ($vehiculo == 'Otro') { echo ' selected'; } ?>>Otro / Consulta general</option>
                        </select>
                    </div>
                    <div>
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" placeholder="Escribí tu consulta acá..." maxlength="1000" required><?php echo limpiar($mensaje); ?></textarea>
                    </div>

                    <?php if (count($errores) > 0) { ?>
                        <div id="mensaje-respuesta" class="mensaje-error"><?php echo implode('<br>', $errores); ?></div>
                    <?php } elseif ($enviado) { ?>
                        <div id="mensaje-respuesta" class="mensaje-exito">¡Gracias! Recibimos tu consulta y te vamos a responder pronto.</div>
                    <?php } else { ?>
                        <div id="mensaje-respuesta" class="mensaje-oculto"></div>
                    <?php } ?>

                    <button type="submit">Enviar consulta</button>
                </form>
            </div>
        </section>
    </main>

<?php include 'includes/footer.php'; ?>
