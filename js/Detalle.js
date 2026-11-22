

document.addEventListener("DOMContentLoaded", function () {

    const fichas = document.querySelectorAll(".vehiculo-detalle-item");

    if (fichas.length === 0) {
        return;   
    }

    function mostrarFicha() {
      
        const hash = window.location.hash;
        let elegida = null;

        
        fichas.forEach(function (ficha) {
            if ("#" + ficha.id === hash) {
                elegida = ficha;
            }
        });

  
        if (elegida === null) {
            elegida = fichas[0];
        }

        fichas.forEach(function (ficha) {
            ficha.style.display = (ficha === elegida) ? "block" : "none";
        });

        const titulo = elegida.querySelector("h2");
        if (titulo) {
            const nombre = titulo.textContent.trim();
            document.title = nombre + " - MotorMarket";

            const consultar = elegida.querySelector('a[href^="contacto"]');
            if (consultar) {
                consultar.href = "contacto.html?vehiculo=" + encodeURIComponent(nombre);
            }
        }
    }

    mostrarFicha();


    window.addEventListener("hashchange", mostrarFicha);
});
