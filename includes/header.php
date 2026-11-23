<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?> - MotorMarket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/<?php echo $css; ?>">
</head>
<body>
    <header>
        <h1><a href="index.php">MotorMarket</a></h1>
        <nav>
            <ul>
                <li><a href="index.php"<?php if ($pagina == 'inicio') { echo ' class="active"'; } ?>>Home</a></li>
                <li><a href="catalogo.php"<?php if ($pagina == 'catalogo') { echo ' class="active"'; } ?>>Catálogo</a></li>
                <li><a href="contacto.php"<?php if ($pagina == 'contacto') { echo ' class="active"'; } ?>>Contacto</a></li>
                <?php if (isset($_SESSION['usuario'])) { ?>

                    <li><a href="panel.php"<?php if ($pagina == 'panel') { echo ' class="active"'; } ?>>Panel</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                <?php } else { ?>
                    <li><a href="login.php"<?php if ($pagina == 'login') { echo ' class="active"'; } ?>>Login</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
