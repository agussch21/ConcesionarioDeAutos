<?php
// index.php - Ruteador central del proyecto (MVC)

// 1. Verificamos si se solicitó alguna página a través de la URL (ej: index.php?page=catalogo)
// Si no viene nada, por defecto cargamos 'home'
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// 2. Definimos la ruta de la vista solicitada dentro de la carpeta 'views/'
$file = 'views/' . $page . '.php';

// 3. Validamos si el archivo existe; si existe lo cargamos, sino mostramos un error 404 simple
if (file_exists($file)) {
    // Acá más adelante en la semana 3 también se incluirán los controladores correspondientes
    include $file;
} else {
    // Vista por si la página no existe
    echo "<main style='text-align: center; padding: 5rem;'>";
    echo "<h1>404 - Página no encontrada</h1>";
    echo "<p>La vista solicitada no existe o fue movida.</p>";
    echo "<a href='index.php?page=home' style='color: #00b987; font-weight: bold;'>Volver al Inicio</a>";
    echo "</main>";
}
?>