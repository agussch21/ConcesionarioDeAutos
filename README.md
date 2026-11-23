MotorMarket - Concesionario de autos
Sitio web sobre un concesionario de autos, motos y camionetas

Integrantes: Agustin y Thiago
Repositorio: https://github.com/agussch21/ConcesionarioDeAutos.git

1. Que es el proyecto
MotorMarket muestra un catalogo de 12 vehiculos (autos, motos y camionetas) el cual permite filtrarlos, ver la ficha tecnica detallada de cada uno, enviar una consulta al concesionario, iniciar sesion y administrar informacion desde un panel privado. El sitio cuenta con las siguientes paginas principales:

Pagina

Archivo

Que hace

Inicio

index.php

Presentacion, vehiculos destacados y aviso de local abierto o cerrado segun el horario

Catalogo= catalogo.php

Listado en grilla de los 12 vehiculos con filtros dinamicos por tipo, marca, modelo y precio maximo

Detalle= detalle.php

Ficha completa de un vehiculo especifico con datos tecnicos, descripcion y caracteristicas

Contacto= contacto.php

Formulario de consulta con validaciones, precarga automatica del vehiculo y registro de consultas

Login= login.php

Formulario de acceso con validaciones y manejo de sesion en PHP

Panel= panel.php

Vista privada para usuarios verificados (gestion / visualizacion de datos del sistema)

Logout= logout.php

Cierre de sesion activo y redireccion

2. Tecnologias y diseno
PHP: logica del lado del servidor, renderizado dinamico de vistas, componentes reutilizables (includes/), manejo de datos (datos/ y models/) y sesiones ($_SESSION).

HTML5: estructura semantica modularizada mediante header.php y footer.php.

CSS3: arquitectura modular con hojas de estilo separadas por vista, uso de CSS Grid y Flexbox, diseno adaptable a dispositivos moviles y paleta oscura (#0f1012) con acentos en verde esmeralda (#00b987).

JavaScript (sin librerias): archivos separados por pagina (js/) para filtros del catalogo, logica de detalle, aviso de horario y validaciones en el navegador.

Git y GitHub: control de versiones, revision de cambios y trabajo colaborativo

3. Estructura del proyecto
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
│   ├── style.css              (estilos globales: paleta de colores, header, footer y alertas)
│   ├── home.css               (estilos de la pagina principal)
│   ├── catalogo.css           (grilla y filtros del catalogo)
│   ├── detalle.css            (tarjeta de ficha tecnica y acciones)
│   ├── contacto.css           (formulario y mensajes de estado)
│   └── login.css              (pantalla de acceso y sesion)
├── datos/
│   ├── consultas.php          (almacenamiento / estructura de consultas)
│   ├── usuarios.php           (datos de usuarios del sistema)
│   └── vehiculos.php          (listado y ficha de los 12 vehiculos)
├── includes/
│   ├── header.php             (barra de navegacion y cabecera comun)
│   ├── footer.php             (pie de pagina comun)
│   └── funciones.php          (funciones auxiliares compartidas en PHP)
├── js/
│   ├── home.js                (logica de horario de atencion)
│   ├── catalogo.js            (filtrado dinamico de vehiculos)
│   ├── detalle.js             (interactividad de la vista detalle)
│   ├── contacto.js            (validacion del formulario de contacto)
│   └── login.js               (validacion del formulario de ingreso)
├── models/                    (modelos de datos del proyecto)
└── img/                       (imagenes de los 12 vehiculos)

4. Como se dividio el trabajo
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

Metodologia de trabajo: nos dividimos las responsabilidades entre diseno/maquetacion y logica/programacion, sincronizando los cambios mediante GitHub y revisando el codigo antes de cada commit para mantener un historial limpio.

5. Problemas que tuvimos y como los resolvimos
#

Problema
Causa
Solucion

1
Los filtros del catalogo y el aviso de horario no funcionaban

catalogo.js y home.js existian pero no estaban enlazados en la pagina

Se agregaron las etiquetas <script src="js/..."> al final de cada vista

2

Riesgo de errores 404 al subir a servidores Linux

Algunos archivos y enlaces mezclaban mayusculas y minusculas (Catalogo, Login, Home.js)

Se estandarizaron todos los nombres de archivos y rutas en minuscula (catalogo.php, login.php, js/*.js)

3

El selector de vehiculos en contacto estaba incompleto

Solo mostraba 3 modelos

Se cargaron los 12 vehiculos desde datos/vehiculos.php mas la opcion "Otro"

4

Al consultar desde el detalle, el formulario no sabia que auto era

El enlace apuntaba a contacto sin parametros

Se paso el parametro del vehiculo por URL y se precarga automaticamente

5

Validaciones debiles en los formularios

El campo nombre aceptaba numeros y el telefono permitia letras

Se agregaron validaciones tanto en JavaScript como en PHP (includes/funciones.php) con alertas visuales claras

6

Desincronizacion en la ficha de detalle

El CSS nuevo se aplico sobre una estructura vieja y las imagenes se veian desproporcionadas

Se unifico el marcado de la ficha con las clases de detalle.css y se pasaron los estilos en linea a clases CSS


Aprendizajes 

Hacer siempre git pull antes de empezar a editar 

Mantener sincronizados los cambios de PHP/HTML, CSS y JS cuando se modifica una misma vista.

Usar la consola del navegador (F12) y el servidor local PHP para detectar errores de rutas, sintaxis o logica al instante.

Respetar estrictamente las minusculas o mayusculas para nombres de archivos y carpetas.

6. Como ejecutarlo

Clonar o descargar este repositorio dentro de la carpeta publica de un servidor local con PHP (por ejemplo htdocs en XAMPP o www en Laragon).

Iniciar el servicio de Apache desde el panel del servidor local.

Abrir el navegador e ingresar a http://localhost/ConcesionarioDeAutos/index.php (ajustar el nombre de la carpeta segun corresponda).

Si se realizan cambios en los estilos o scripts y no se reflejan, recargar limpiando cache con Ctrl + F5.

7. Proximos pasos y mejoras futuras

Migrar el almacenamiento de datos/ (vehiculos.php, usuarios.php, consultas.php) hacia una base de datos relacional MySQL usando PDO.

Ampliar las funcionalidades de panel.php para permitir altas, bajas y modificaciones (ABM) de vehiculos desde la interfaz.

Implementar registro de nuevos usuarios y recuperacion de contrasena con password_hash y password_verify.

Agregar mas vehiculos en el menu y hacer imagenes en carrusel (que se muevan solas)
Agregar logo,ubicacion y instagram real