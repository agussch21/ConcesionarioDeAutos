const MODO_PRUEBA = true;

const formLogin     = document.getElementById("form-login");
const campoUsuario  = document.getElementById("usuario");
const campoPassword = document.getElementById("password");
const cajaMensaje   = document.getElementById("login-mensaje");

if (formLogin && campoUsuario && campoPassword && cajaMensaje) {

    formLogin.noValidate = true;

    function mostrarMensaje(lineas, tipo) {
        cajaMensaje.innerHTML = "";
        lineas.forEach(function (texto) {
            const linea = document.createElement("span");
            linea.textContent = texto;
            linea.style.display = "block";
            cajaMensaje.appendChild(linea);
        });
        cajaMensaje.className = tipo === "exito" ? "mensaje-exito" : "mensaje-error";
        cajaMensaje.setAttribute("role", tipo === "exito" ? "status" : "alert");
    }

    function ocultarMensaje() {
        cajaMensaje.className = "mensaje-oculto";
        cajaMensaje.textContent = "";
        cajaMensaje.removeAttribute("role");
    }

    function marcarInvalido(campo, invalido) {
        campo.classList.toggle("campo-invalido", invalido);
        if (invalido) {
            campo.setAttribute("aria-invalid", "true");
        } else {
            campo.removeAttribute("aria-invalid");
        }
    }

    [campoUsuario, campoPassword].forEach(function (campo) {
        campo.addEventListener("input", function () {
            marcarInvalido(campo, false);
            ocultarMensaje();
        });
    });


    formLogin.addEventListener("submit", function (evento) {
        const usuario  = campoUsuario.value.trim();
        const password = campoPassword.value;
        const errores  = []; 

        marcarInvalido(campoUsuario, false);
        marcarInvalido(campoPassword, false);

        if (usuario === "") {
            errores.push({ campo: campoUsuario, texto: "Ingresá tu usuario." });
        }

        if (password === "") {
            errores.push({ campo: campoPassword, texto: "Ingresá tu contraseña." });
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
            mostrarMensaje(["Datos completos. La verificación real se hace con PHP."], "exito");
        }
    
    });
}
