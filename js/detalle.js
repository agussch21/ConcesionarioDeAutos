const fichas = document.querySelectorAll(".vehiculo-detalle-item");

const hash = window.location.hash;

let elegida = fichas[0];

for (let i = 0; i < fichas.length; i++) {
    if ("#" + fichas[i].id === hash) {
        elegida = fichas[i];
    }
}

for (let i = 0; i < fichas.length; i++) {
    if (fichas[i] === elegida) {
        fichas[i].style.display = "block";
    } else {
        fichas[i].style.display = "none";
    }
}


document.title = elegida.querySelector("h2").textContent + " - MotorMarket";

window.addEventListener("load", function () {
    setTimeout(function () {
        window.scrollTo(0, 0);
    }, 0);
});
