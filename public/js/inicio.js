// Inicializa la variable 'indice' en 1 y muestra el primer slide.
let indice = 1;
muestraSlides(indice);

// Función que avanza o retrocede el slide por 'n' posiciones.
function avanzaSlide(n) {
  muestraSlides((indice += n));
}

// Función que establece el slide en la posición 'n'.
function posicionSlide(n) {
  muestraSlides((indice = n));
}

// Establece un intervalo que cambia automáticamente de slide cada 4000 milisegundos (4 segundos).
setInterval(function tiempo() {
  muestraSlides((indice += 1));
}, 7000);

// Función principal que muestra el slide en la posición 'n'.
function muestraSlides(n) {
  let i;
  let slides = document.getElementsByClassName("miSlider"); // Obtiene los elementos con la clase 'miSlider'.
  let barras = document.getElementsByClassName("barra"); // Obtiene los elementos con la clase 'barra'.

  // Si 'n' es mayor que el número de slides, vuelve al primer slide.
  if (n > slides.length) {
    indice = 1;
  }
  // Si 'n' es menor que 1, muestra el último slide.
  if (n < 1) {
    indice = slides.length;
  }

  // Oculta todos los slides.
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  // Remueve la clase 'active' de todas las barras.
  for (i = 0; i < barras.length; i++) {
    barras[i].className = barras[i].className.replace(" active", "");
  }

  // Muestra el slide en la posición 'indice - 1' y agrega la clase 'active' a la barra correspondiente.
  slides[indice - 1].style.display = "flex";
  barras[indice - 1].className += " active";
}
