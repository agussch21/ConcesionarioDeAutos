const modelosPorMarca = {
    "Ford": ["Fiesta Kinetic", "Ranger", "Raptor F-150"],
    "Volkswagen": ["Gol Trend", "Polo", "Virtus"],
    "Honda": ["Tornado 300", "XR 150"],
    "Yamaha": ["XTZ 250", "Ténéré 700"],
    "Nissan": ["Frontier", "Sentra"]
};

const selectTipo = document.getElementById("tipo");
const selectMarca = document.getElementById("marca");
const selectModelo = document.getElementById("modelo");
const inputPrecio = document.getElementById("precio");
const formulario = document.querySelector(".filtros-sidebar form");
const botonLimpiar = document.querySelector(".btn-limpiar");
const lista = document.querySelector(".autos-lista");
const tarjetas = document.querySelectorAll(".vehiculo-card-horizontal");

const contador = document.createElement("p");
contador.className = "contador-resultados";
lista.insertBefore(contador, lista.firstChild);

function llenarModelos() {
    const marca = selectMarca.value;
    selectModelo.innerHTML = '<option value="">Todos</option>';

    if (marca !== "") {
        const modelos = modelosPorMarca[marca];
        for (let i = 0; i < modelos.length; i++) {
            selectModelo.innerHTML += "<option>" + modelos[i] + "</option>";
        }
    }
}

function filtrar() {
    const tipo = selectTipo.value;
    const marca = selectMarca.value;
    const modelo = selectModelo.value;
    const precioMax = Number(inputPrecio.value); 
    let cantidad = 0;

    for (let i = 0; i < tarjetas.length; i++) {
        const tarjeta = tarjetas[i];

   
        const nombre = tarjeta.querySelector("h3").textContent;
        const tipoTarjeta = tarjeta.querySelector(".vehiculo-info-principal span").textContent.toLowerCase();
        const textoPrecio = tarjeta.querySelector(".vehiculo-precio-catalogo").textContent;
        const precio = Number(textoPrecio.replace("$", "").split(".").join("")); 

    
        let mostrar = true;

        if (tipo !== "" && tipoTarjeta !== tipo) {
            mostrar = false;
        }
        if (marca !== "" && nombre.indexOf(marca) === -1) {
            mostrar = false;
        }
        if (modelo !== "" && nombre.indexOf(modelo) === -1) {
            mostrar = false;
        }
        if (precioMax > 0 && precio > precioMax) {
            mostrar = false;
        }

        if (mostrar) {
            tarjeta.style.display = "";       
            cantidad++;
        } else {
            tarjeta.style.display = "none";   
        }
    }

    if (cantidad === 1) {
        contador.textContent = "1 vehículo encontrado";
    } else {
        contador.textContent = cantidad + " vehículos encontrados";
    }
}



selectTipo.addEventListener("change", filtrar);

selectMarca.addEventListener("change", function () {
    llenarModelos();
    filtrar();
});

selectModelo.addEventListener("change", filtrar);
inputPrecio.addEventListener("input", filtrar);


formulario.addEventListener("submit", function (evento) {
    evento.preventDefault();
    filtrar();
});

botonLimpiar.addEventListener("click", function () {
    selectTipo.value = "";
    selectMarca.value = "";
    inputPrecio.value = "";
    llenarModelos();
    filtrar();
});

filtrar();
