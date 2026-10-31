<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto - Concesionario</title>
</head>
<body>
    <header>
        <h1>MotorMarket</h1>
        <nav>
            <ul>
                <li><a href="home.php">Inicio</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="detalle.php">Detalle</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Formulario de Contacto y Test-Drive</h2>
            <form action="#" method="POST">
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre">
                </div>
                <div>
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email">
                </div>
                <div>
                    <label for="mensaje">Consulta o vehículo de interés:</label>
                    <textarea id="mensaje" name="mensaje"></textarea>
                </div>
                <div>
                    <button type="submit">Enviar Consulta</button>
                </div>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 - Desarrollo Web UNLZ</p>
    </footer>
</body>
</html>