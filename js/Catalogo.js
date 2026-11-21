const formFiltros = document.querySelector(".filtros-sidebar form");
const listaAutos  = document.querySelector(".autos-lista");

if (formFiltros && listaAutos) {

    const selTipo     = document.getElementById("tipo");
    const selMarca    = document.getElementById("marca");
    const selModelo   = document.getElementById("modelo");
    const inputPrecio = document.getElementById("precio");
    const btnLimpiar  = document.querySelector(".btn-limpiar");

    const vehiculos = Array.from(document.querySelectorAll(".vehiculo-card-horizontal"))
        .map(function (tarjeta) {
            const nombre        = tarjeta.querySelector("h3").textContent.trim();
            const etiquetaTipo  = tarjeta.querySelector(".vehiculo-info-principal span");
            const etiquetaPrecio = tarjeta.querySelector(".vehiculo-precio-catalogo");
            const espacio       = nombre.indexOf(" ");

            return {
                tarjeta: tarjeta,
                nombre:  nombre,
                tipo:    etiquetaTipo ? etiquetaTipo.textContent.trim().toLowerCase() : "",
                marca:   espacio === -1 ? nombre : nombre.slice(0, espacio),
                modelo:  espacio === -1 ? ""     : nombre.slice(espacio + 1),
                precio:  etiquetaPrecio ? Number(etiquetaPrecio.textContent.replace(/\D/g, "")) : 0
            };
        });



    const contador = document.createElement("p");
    contador.className = "contador-resultados";
    contador.setAttribute("aria-live", "polite");  
    listaAutos.prepend(contador);

    const sinResultados = document.createElement("p");
    sinResultados.className = "sin-resultados";
    sinResultados.textContent = "No hay vehículos con esos filtros. Probá con otros o tocá “Limpiar”.";
    sinResultados.hidden = true;
    listaAutos.appendChild(sinResultados);

    function valoresUnicos(lista, campo) {
        const unicos = new Set(lista.map(function (v) { return v[campo]; }).filter(Boolean));
        return Array.from(unicos).sort(function (a, b) { return a.localeCompare(b, "es"); });
    }

    function llenarSelect(select, valores, seleccionado) {
        const textoPrimera = select.options[0].textContent; 
        select.innerHTML = "";

        const primera = document.createElement("option");
        primera.value = "";
        primera.textContent = textoPrimera;
        select.appendChild(primera);

        valores.forEach(function (valor) {
            const opcion = document.createElement("option");
            opcion.value = valor;
            opcion.textContent = valor;
            select.appendChild(opcion);
        });

        select.value = valores.indexOf(seleccionado) !== -1 ? seleccionado : "";
    }

    function actualizarOpciones() {
        const tipo = selTipo.value;
        const deEseTipo = vehiculos.filter(function (v) { return !tipo || v.tipo === tipo; });
        llenarSelect(selMarca, valoresUnicos(deEseTipo, "marca"), selMarca.value);

        const marca = selMarca.value;
        const deEsaMarca = deEseTipo.filter(function (v) { return !marca || v.marca === marca; });
        llenarSelect(selModelo, valoresUnicos(deEsaMarca, "modelo"), selModelo.value);
    }


    function aplicarFiltros() {
        const tipo      = selTipo.value;
        const marca     = selMarca.value;
        const modelo    = selModelo.value;
        const precioMax = Number(inputPrecio.value) || 0;   

        let visibles = 0;

        vehiculos.forEach(function (v) {
            const coincide =
                (!tipo      || v.tipo === tipo) &&
                (!marca     || v.marca === marca) &&
                (!modelo    || v.modelo === modelo) &&
                (!precioMax || v.precio <= precioMax);
            v.tarjeta.style.display = coincide ? "" : "none";
            if (coincide) { visibles++; }
        });

        contador.textContent = visibles + " vehículo" + (visibles === 1 ? "" : "s") +
                               " encontrado" + (visibles === 1 ? "" : "s");
        sinResultados.hidden = visibles !== 0;
    }

    selTipo.addEventListener("change", function () {
        actualizarOpciones();
        aplicarFiltros();
    });

    selMarca.addEventListener("change", function () {
        const marca = selMarca.value;
        const deEsaMarca = vehiculos.filter(function (v) {
            return (!selTipo.value || v.tipo === selTipo.value) && (!marca || v.marca === marca);
        });
        llenarSelect(selModelo, valoresUnicos(deEsaMarca, "modelo"), selModelo.value);
        aplicarFiltros();
    });

    selModelo.addEventListener("change", aplicarFiltros);

    inputPrecio.min = 0;
    inputPrecio.addEventListener("input", aplicarFiltros);

    formFiltros.addEventListener("submit", function (evento) {
        evento.preventDefault();
        aplicarFiltros();
    });

    if (btnLimpiar) {
        btnLimpiar.addEventListener("click", function () {
            formFiltros.reset();
            actualizarOpciones();
            aplicarFiltros();
        });
    }

    function fijar(select, valor) {
        if (valor && Array.from(select.options).some(function (o) { return o.value === valor; })) {
            select.value = valor;
        }
    }

    const parametros = new URLSearchParams(window.location.search);
    fijar(selTipo, (parametros.get("tipo") || "").toLowerCase());
    actualizarOpciones();
    fijar(selMarca, parametros.get("marca"));
    actualizarOpciones();
    fijar(selModelo, parametros.get("modelo"));
    if (parametros.get("precio")) { inputPrecio.value = parametros.get("precio"); }

    aplicarFiltros();
}
