const formulario = document.getElementById("form-login");
const campoUsuario = document.getElementById("usuario");
const campoPassword = document.getElementById("password");
const cajaMensaje = document.getElementById("login-mensaje");

formulario.noValidate = true;

formulario.addEventListener("submit", function (evento) {
    const usuario = campoUsuario.value.trim();   
    const password = campoPassword.value;
    const errores = [];

    if (usuario === "") {
        errores.push("Ingresá tu usuario.");
    }
    if (password === "") {
        errores.push("Ingresá tu contraseña.");
    }

    if (errores.length > 0) {
        evento.preventDefault();
        cajaMensaje.className = "mensaje-error";
        cajaMensaje.innerHTML = errores.join("<br>");
        return;
    }

   
});
