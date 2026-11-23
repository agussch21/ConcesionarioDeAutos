const modoPrueba = true;

const formulario = document.getElementById("form-contacto");
const campoNombre = document.getElementById("nombre");
const campoEmail = document.getElementById("email");
const campoTelefono = document.getElementById("telefono");
const campoVehiculo = document.getElementById("vehiculo");
const campoMensaje = document.getElementById("mensaje");
const cajaMensaje = document.getElementById("mensaje-respuesta");

formulario.noValidate = true;

const vehiculos = [
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

const primeraOpcion = campoVehiculo.options[0].textContent;
campoVehiculo.innerHTML = '<option value="">' + primeraOpcion + "</option>";

for (let i = 0; i < vehiculos.length; i++) {
    campoVehiculo.innerHTML += "<option>" + vehiculos[i] + "</option>";
}
campoVehiculo.innerHTML += "<option>Otro / Consulta general</option>";

formulario.addEventListener("submit", function (evento) {
    const nombre = campoNombre.value.trim();
    const email = campoEmail.value.trim();
    const telefono = campoTelefono.value.trim();
    const mensaje = campoMensaje.value.trim();
    const errores = [];


    if (nombre.length < 3) {
        errores.push("Ingresá tu nombre (mínimo 3 letras).");
    }

    const arroba = email.indexOf("@");
    const punto = email.lastIndexOf(".");

    if (email === "") {
        errores.push("Ingresá tu correo electrónico.");
    } else if (arroba < 1 || punto < arroba + 2 || punto === email.length - 1) {
        errores.push("El correo no es válido (ej: nombre@correo.com).");
    }


    if (telefono !== "") {
        const numeros = telefono.split(" ").join("").split("-").join("");  
        if (isNaN(numeros) || numeros.length < 8) {
            errores.push("El teléfono no es válido (ej: 11 1234-5678).");
        }
    }


    if (mensaje.length < 10) {
        errores.push("Escribí tu consulta (mínimo 10 caracteres).");
    }


    if (errores.length > 0) {
        evento.preventDefault();
        cajaMensaje.className = "mensaje-error";
        cajaMensaje.innerHTML = errores.join("<br>");
        return;
    }


    if (modoPrueba) {
        evento.preventDefault();
        cajaMensaje.className = "mensaje-exito";
        cajaMensaje.textContent = "¡Gracias, " + nombre + "! Tu consulta fue enviada (modo prueba).";
        formulario.reset();
    }
});
