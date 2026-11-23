
const hora = new Date().getHours(); 
let saludo;

if (hora < 12) {
    saludo = "¡Buen día!";
} else if (hora < 20) {
    saludo = "¡Buenas tardes!";
} else {
    saludo = "¡Buenas noches!";
}

const banner = document.querySelector(".hero-section");
const parrafo = document.createElement("p");
parrafo.textContent = saludo + " Encontrá tu próximo vehículo con nosotros.";
parrafo.style.marginTop = "1rem";
banner.appendChild(parrafo);
