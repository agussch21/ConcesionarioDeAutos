
const MODO_PRUEBA = true;

const VEHICULOS = [
    "Ford Fiesta Kinetic",
    "Volkswagen Gol Trend",
    "Honda Tornado 300",
    "Ford Ranger",
    "Ford Raptor F-150",
    "Yamaha XTZ 250",
    "Nissan Frontier",
    "Volkswagen Polo",
    "Volkswagen Virtus",
    "Honda XR 150",
    "Yamaha Ténéré 700",
    "Nissan Sentra (Advance CVT)"
];


const formContacto   = document.getElementById("form-contacto");
const campoNombre    = document.getElementById("nombre");
const campoEmail     = document.getElementById("email");
const campoTelefono  = document.getElementById("telefono");
const campoVehiculo  = document.getElementById("vehiculo");
const campoMensaje   = document.getElementById("mensaje");
const cajaRespuesta  = document.getElementById("mensaje-respuesta");

if (formContacto && campoNombre && campoEmail && campoMensaje && cajaRespuesta) {

    formContacto.noValidate = true;

    if (campoVehiculo) {
        const textoPrimera = campoVehiculo.options[0].textContent;
        campoVehiculo.innerHTML = "";

        agregarOpcion("", textoPrimera);
        VEHICULOS.forEach(function (nombre) {
            agregarOpcion(nombre, nombre);
        });
        agregarOpcion("Otro", "Otro / Consulta general");
    }

    function agregarOpcion(valor, texto) {
        const opcion = document.createElement("option");
        opcion.value = valor;
        opcion.textContent = texto;
        campoVehiculo.appendChild(opcion);
    }

    const parametros = new URLSearchParams(window.location.search);
    const vehiculoElegido = parametros.get("vehiculo");

    if (vehiculoElegido && campoVehiculo && VEHICULOS.indexOf(vehiculoElegido) !== -1) {
        campoVehiculo.value = vehiculoElegido;
        if (campoMensaje.value.trim() === "") {
            campoMensaje.value = "Hola, quiero consultar por el " + vehiculoElegido + ".";
        }
    }


    function mostrarMensaje(lineas, tipo) {
        cajaRespuesta.innerHTML = "";
        lineas.forEach(function (texto) {
            const linea = document.createElement("span");
            linea.textContent = texto;
            linea.style.display = "block";
            cajaRespuesta.appendChild(linea);
        });
        cajaRespuesta.className = tipo === "exito" ? "mensaje-exito" : "mensaje-error";
        cajaRespuesta.setAttribute("role", tipo === "exito" ? "status" : "alert");
    }

    function ocultarMensaje() {
        cajaRespuesta.className = "mensaje-oculto";
        cajaRespuesta.textContent = "";
        cajaRespuesta.removeAttribute("role");
    }

    function marcarInvalido(campo, invalido) {
        campo.classList.toggle("campo-invalido", invalido);
        if (invalido) {
            campo.setAttribute("aria-invalid", "true");
        } else {
            campo.removeAttribute("aria-invalid");
        }
    }

    function emailValido(texto) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(texto);
    }

    function telefonoValido(texto) {
        const soloNumeros = texto.replace(/\D/g, "");
        return /^[0-9+()\s-]+$/.test(texto) && soloNumeros.length >= 8 && soloNumeros.length <= 13;
    }

    [campoNombre, campoEmail, campoTelefono, campoMensaje].forEach(function (campo) {
        if (campo) {
            campo.addEventListener("input", function () {
                marcarInvalido(campo, false);
                ocultarMensaje();
            });
        }
    });


    formContacto.addEventListener("submit", function (evento) {
        const nombre   = campoNombre.value.trim();
        const email    = campoEmail.value.trim();
        const telefono = campoTelefono ? campoTelefono.value.trim() : "";
        const mensaje  = campoMensaje.value.trim();
        const errores  = [];

        [campoNombre, campoEmail, campoTelefono, campoMensaje].forEach(function (campo) {
            if (campo) { marcarInvalido(campo, false); }
        });


        if (nombre.length < 3 || !/^[\p{L}\s'.-]+$/u.test(nombre)) {
            errores.push({ campo: campoNombre, texto: "Ingresá tu nombre (solo letras, mínimo 3)." });
        }

        if (email === "") {
            errores.push({ campo: campoEmail, texto: "Ingresá tu correo electrónico." });
        } else if (!emailValido(email)) {
            errores.push({ campo: campoEmail, texto: "El correo no es válido (ej: nombre@correo.com)." });
        }

        if (telefono !== "" && !telefonoValido(telefono)) {
            errores.push({ campo: campoTelefono, texto: "El teléfono no es válido (ej: 11 1234-5678)." });
        }

        if (mensaje.length < 10) {
            errores.push({ campo: campoMensaje, texto: "Escribí tu consulta (mínimo 10 caracteres)." });
        }


        if (errores.length > 0) {
            evento.preventDefault();
            errores.forEach(function (e) { marcarInvalido(e.campo, true); });
            mostrarMensaje(errores.map(function (e) { return e.texto; }), "error");
            errores[0].campo.focus();
            return;
        }


        if (MODO_PRUEBA) {
            evento.preventDefault();
            mostrarMensaje(["¡Gracias, " + nombre + "! Tu consulta fue enviada (modo prueba)."], "exito");
            formContacto.reset();
        }

    });
}
    