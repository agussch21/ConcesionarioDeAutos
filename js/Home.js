
const DIA_APERTURA  = 1;    
const DIA_CIERRE    = 5;    
const HORA_APERTURA = 9;    
const HORA_CIERRE   = 18;   

const banner = document.querySelector(".hero-section");

if (banner) {

    const ahora = new Date();       
    const dia   = ahora.getDay();   
    const hora  = ahora.getHours(); 

    let saludo;
    if (hora < 12) {
        saludo = "¡Buen día!";
    } else if (hora < 20) {
        saludo = "¡Buenas tardes!";
    } else {
        saludo = "¡Buenas noches!";
    }

    const esDiaHabil = dia >= DIA_APERTURA && dia <= DIA_CIERRE;
    const estaAbierto = esDiaHabil && hora >= HORA_APERTURA && hora < HORA_CIERRE;

    let aviso;
    if (estaAbierto) {
        aviso = saludo + " Estamos atendiendo hasta las " + HORA_CIERRE + " hs.";
    } else {

        let proxima;
        if (esDiaHabil && hora < HORA_APERTURA) {
            proxima = "hoy a las " + HORA_APERTURA + " hs";
        } else if (dia >= DIA_APERTURA && dia < DIA_CIERRE) {
            proxima = "mañana a las " + HORA_APERTURA + " hs";
        } else {
            proxima = "el lunes a las " + HORA_APERTURA + " hs";
        }
        aviso = saludo + " Ahora estamos cerrados. Abrimos " + proxima + ".";
    }

    const estado = document.createElement("p");
    estado.className = "estado-local";
    estado.textContent = aviso;
    estado.style.marginTop = "1rem";
    banner.appendChild(estado);
}
