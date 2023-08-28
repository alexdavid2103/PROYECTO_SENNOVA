// Selecciona todos los elementos con la clase 'list__button--click' y los almacena en la variable 'listElements'.
let listElements = document.querySelectorAll('.fa-bars');

// Itera a través de cada elemento seleccionado en 'listElements'.
listElements.forEach(listElement => {
    // Agrega un event listener para el evento de clic en cada elemento.
    listElement.addEventListener('click', () => {
        
        // Alterna la clase 'arrow' en el elemento actual, lo que puede modificar su estilo visual.
        // listElement.classList.toggle('arrow');

        // Inicializa una variable 'height' en 0 para determinar la altura del menú desplegable.
        let height = 0;

        // Accede al siguiente elemento hermano de 'listElement', que se asume que es el menú desplegable.
        let menu = listElement.nextElementSibling;

        // Verifica si la altura del menú es igual a "0" (posiblemente cerrado).
        if (menu.clientHeight == "0") {

            // Si la altura del menú es cero, asigna la altura total de despliegue (scrollHeight) a la variable 'height'.
            height = menu.scrollHeight;
        }

        // Establece el estilo de altura del menú desplegable para que coincida con la altura calculada.
        menu.style.height = `${height}px`;
    });
});

