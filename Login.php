<?php
session_start();
include 'includes/funciones.php';

if (isset($_SESSION['usuario'])) {
    header('Location: panel.php');
    exit;
}

$usuario = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = dato_post('usuario');
    $password = '';
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    if ($usuario == '' || $password == '') {
        $error = 'Ingresá tu usuario y tu contraseña.';
    } else {
        include 'datos/usuarios.php';  


        if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $password) {

            $_SESSION['usuario'] = $usuario;
            header('Location: panel.php'); 
            exit;
        } else {
            $error = 'Usuario o contraseña incorrectos.';
        }
    }
}

$titulo = 'Acceso Administrador';
$pagina = 'login';
$css = 'login.css';
$js = 'login.js';

include 'includes/header.php';
?>

    <main class="login-container">
        <section class="login-card">
            <div class="login-header">
                <i class="fa-solid fa-user-shield login-icono"></i>
                <h2>Acceso de Administrador</h2>
                <p>Ingresá tus credenciales para gestionar el catálogo</p>
            </div>
            <form id="form-login" action="login.php" method="POST">
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" placeholder="Ingresá tu usuario" value="<?php echo limpiar($usuario); ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>


                <?php if ($error != '') { ?>
                    <div id="login-mensaje" class="mensaje-error"><?php echo $error; ?></div>
                <?php } elseif (isset($_GET['salio'])) { ?>
                    <div id="login-mensaje" class="mensaje-exito">Cerraste sesión correctamente.</div>
                <?php } else { ?>
                    <div id="login-mensaje" class="mensaje-oculto"></div>
                <?php } ?>

                <button type="submit" class="btn-login">Ingresar</button>
            </form>
        </section>
    </main>

<?php include 'includes/footer.php'; ?>
