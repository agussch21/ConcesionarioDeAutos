# MotorMarket – Concesionario de autos

Sitio web de un concesionario de autos, motos y camionetas, desarrollado como trabajo práctico de **Desarrollo Web** (UNLZ).

**Integrantes:** Agustin y Thiago
**Repositorio:** https://github.com/agussch21/ConcesionarioDeAutos.git

---

## 1. Qué es el proyecto

MotorMarket muestra un catálogo de 12 vehículos (autos, motos y camionetas) que se pueden filtrar, ver en una ficha técnica detallada y consultar al concesionario. Además tiene un login con sesión y un panel privado donde se ven las consultas recibidas.

| Página | Archivo | Qué hace |
|---|---|---|
| Inicio | `index.php` | Presentación, vehículos destacados y saludo según la hora |
| Catálogo | `catalogo.php` | Listado de los 12 vehículos con filtros dinámicos por tipo, marca, modelo y precio máximo |
| Detalle | `detalle.php` | Ficha completa de un vehículo: datos técnicos, descripción y características |
| Contacto | `contacto.php` | Formulario de consulta con validaciones, precarga del vehículo y registro de las consultas |
| Login | `login.php` | Formulario de acceso con validaciones y manejo de sesión en PHP |
| Panel | `panel.php` | Vista privada para usuarios verificados: resumen de vehículos y tabla de consultas |
| Logout | `logout.php` | Cierre de sesión y redirección al login |

## 2. Tecnologías y diseño

- **PHP:** lógica del lado del servidor, páginas generadas dinámicamente, componentes reutilizables (`includes/`), datos en arrays (`datos/`) y sesiones (`$_SESSION`).
- **HTML5:** estructura semántica, dividida en `header.php` y `footer.php`.
- **CSS3:** una hoja de estilos por página más una común, con Grid y Flexbox, diseño adaptable a celulares y paleta oscura (`#0f1012`) con acentos verde esmeralda (`#00b987`).
- **JavaScript (sin librerías):** un archivo por página para los filtros del catálogo, la vista de detalle, el saludo y las validaciones en el navegador.
- **Git y GitHub:** control de versiones y trabajo colaborativo.

## 3. Estructura del proyecto

```
ConcesionarioDeAutos/
├── index.php
├── catalogo.php
├── detalle.php
├── contacto.php
├── login.php
├── logout.php
├── panel.php
├── README.md
├── css/
│   ├── style.css        (estilos globales: colores, header, footer y alertas)
│   ├── home.css         (página principal)
│   ├── catalogo.css     (grilla y filtros del catálogo)
│   ├── detalle.css      (ficha técnica y acciones)
│   ├── contacto.css     (formulario y mensajes de estado)
│   ├── login.css        (pantalla de acceso)
│   └── panel.css        (panel de administración)
├── datos/
│   ├── vehiculos.php    (listado y ficha de los 12 vehículos)
│   ├── usuarios.php     (usuarios que pueden ingresar)
│   └── consultas.php    (consultas recibidas por el formulario)
├── includes/
│   ├── header.php       (barra de navegación y cabecera común)
│   ├── footer.php       (pie de página común)
│   └── funciones.php    (funciones auxiliares compartidas)
├── js/
│   ├── home.js          (saludo según la hora)
│   ├── catalogo.js      (filtrado dinámico de vehículos)
│   ├── detalle.js       (muestra la ficha elegida)
│   ├── contacto.js      (validación del formulario de contacto)
│   └── login.js         (validación del formulario de ingreso)
└── img/                 (imágenes de los 12 vehículos)
```

## 4.4. Como se dividio el trabajo
Modulo / Tarea

Responsable

Estructura HTML/CSS, sistema visual oscuro con verde esmeralda (css/) y diseno responsivo
Agustin

Vista de detalle (detalle.css), limpieza de rutas/enlaces , formularios base y footer detallado
Agustin

Arquitectura y logica en PHP (index.php, catalogo.php, detalle.php, contacto.php, login.php, logout.php, panel.php)
Thiago

Modularizacion de datos y backend (datos/, includes/funciones.php, models/)
Thiago

Logica interactiva y validaciones en JavaScript (js/home.js, js/catalogo.js, js/detalle.js, js/contacto.js, js/login.js)
Thiago

Arreglos de bugs y mejoras minimas
Ambos

Revision de consola, pruebas generales y unificacion final del repositorio
Ambos

**Metodología de trabajo:** nos dividimos las responsabilidades entre diseño y maquetación por un lado, y lógica y programación por el otro. Sincronizamos los cambios mediante GitHub y revisamos el código antes de cada commit para mantener un historial limpio.

## 5. Cómo se comunican las partes

1. El navegador pide una página, por ejemplo `catalogo.php`.
2. PHP carga `datos/vehiculos.php` y recorre el array con `foreach`, generando una tarjeta por cada vehículo.
3. Cada página incluye `header.php` y `footer.php` con `include`, y les pasa su título, su CSS y su JS en variables.
4. El navegador recibe el HTML ya armado y ejecuta el JavaScript de la página (filtros y validaciones).
5. Entre páginas, los datos viajan por la dirección: `detalle.php?id=3` o `contacto.php?vehiculo=Ford+Ranger`.
6. Las consultas del formulario se guardan en `datos/consultas.php`, y el panel las lee para mostrarlas.
7. El login guarda al usuario en `$_SESSION`, y `panel.php` lo consulta para dejar entrar o redirigir al login.

## 6. Problemas que tuvimos y cómo los resolvimos

Problema 
Causa 
Solución 

| 1 | Los filtros del catálogo y el aviso de horario no funcionaban |
 `catalogo.js` y `home.js` existían pero no estaban enlazados en la página 
Se agregaron las etiquetas `<script src="js/...">` al final de cada vista 

| 2 Riesgo de errores 404 al subir a servidores Linux 
| Algunos archivos y enlaces mezclaban mayúsculas y minúsculas (`Catalogo`, `Login`, `Home.js`) 
| Se estandarizaron todos los nombres de archivos y rutas en minúscula (`catalogo.php`, `login.php`, `js/*.js`) 

| 3 |El selector de vehículos en contacto estaba incompleto| Solo mostraba 3 modelos
Se cargaron los 12 vehículos desde `datos/vehiculos.php` más la opción "Otro" 
| 4 | Al consultar desde el detalle, el formulario no sabía qué auto era 
| El enlace apuntaba a contacto sin parámetros 
| Se pasa el vehículo por la dirección y el formulario lo preselecciona 

| 5 | Validaciones débiles en los formularios 
| El campo nombre aceptaba números y el teléfono permitía letras 
| Se agregaron validaciones en JavaScript y también en PHP (`contacto.php`), con mensajes claros 
| 6 | Desincronización en la ficha de detalle 
| El CSS nuevo se aplicó sobre una estructura vieja y las imágenes se veían desproporcionadas 
| Se unificó el marcado de la ficha con las clases de `detalle.css` y se pasaron los estilos en línea a clases CSS 

| 7  El login y el formulario de contacto no llegaban a PHP desde el navegador 
| Los scripts tenían un "modo prueba" activado que frenaba el envío 
| Se quitó el modo prueba, así los datos se envían y PHP los procesa 

| 8 Las páginas `.php` no mostraban datos ni imágenes 
| Se abrían con Live Server, que no ejecuta PHP 
| Se pasó a un servidor local con PHP (Laragon) 

**Aprendizajes**

- Hacer siempre `git pull` antes de empezar a editar.
- Mantener sincronizados los cambios de PHP/HTML, CSS y JS cuando se modifica una misma vista.
- Usar la consola del navegador (F12) y el servidor local PHP para detectar errores de rutas, sintaxis o lógica al instante.
- Respetar estrictamente las mayusculas y minusculas en los nombres de archivos y carpetas.
- Validar siempre también del lado del servidor: el JavaScript se puede saltear.

## 7. Como ejecutarlo

1. Clonar o descargar este repositorio dentro de la carpeta pública de un servidor local con PHP (por ejemplo `htdocs` en XAMPP o `www` en Laragon).
2. Iniciar el servicio de Apache desde el panel del servidor local.
3. Abrir el navegador e ingresar a `http://localhost/ConcesionarioDeAutos/index.php` (ajustar el nombre de la carpeta según corresponda).
4. Si se cambian estilos o scripts y no se reflejan, recargar limpiando la caché con **Ctrl + F5**.

> Las páginas `.php` no funcionan abriéndolas con doble clic ni con Live Server: necesitan un servidor que ejecute PHP.

**Usuarios de prueba para el login** (definidos en `datos/usuarios.php`):

| Usuario | Contraseña |
|---|---|
| `admin` | `admin123` |
| `vendedor` | `ventas2026` |

## 8. Próximos pasos y mejoras futuras

- Migrar el almacenamiento de `datos/` (`vehiculos.php`, `usuarios.php`, `consultas.php`) a una base de datos MySQL usando PDO.
- Ampliar `panel.php` para permitir altas, bajas y modificaciones (ABM) de vehículos desde la interfaz.
- Guardar las contraseñas con `password_hash` y verificarlas con `password_verify`, e implementar registro de usuarios y recuperación de contraseña.
- Agregar más vehículos al catalogo y un carrusel de imágenes automático.
- Agregar el logo, la ubicación y el Instagram reales.