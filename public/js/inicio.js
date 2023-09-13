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
    n = 1;
  }
  // Si 'n' es menor que 1, muestra el último slide.
  if (n < 1) {
    n = slides.length;
  }

  // Oculta todos los slides con transición de opacidad.
  for (i = 0; i < slides.length; i++) {
    slides[i].style.transition = "opacity 2s"; // Transición de 2 segundos
    slides[i].style.opacity = "0";
    setTimeout(() => {
      slides[i].style.display = "none";
    }, 2000); // Ocultar después de 2 segundos
  }

  // Remueve la clase 'active' de todas las barras.
  for (i = 0; i < barras.length; i++) {
    barras[i].className = barras[i].className.replace(" active", "");
  }

  // Muestra el slide en la posición 'n - 1' con una transición de opacidad.
  slides[n - 1].style.display = "flex";
  setTimeout(() => {
    slides[n - 1].style.opacity = "1";
  }, 0); // Mostrar con opacidad 1 después de un pequeño retraso
  barras[n - 1].className += " active";
}

