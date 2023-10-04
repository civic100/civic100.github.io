// Obtén todas las imágenes laterales
const imagenesLaterales = document.querySelectorAll('.images-laterales img');

// Obtén la imagen principal
const imagenPrincipal = document.getElementById('imagen-principal');

// Itera sobre las imágenes laterales y agrega un evento de clic a cada una
imagenesLaterales.forEach(imagen => {
    imagen.addEventListener('click', () => {
        // Obtiene la URL de la imagen desde el atributo data-src
        const nuevaSrc = imagen.getAttribute('data-src');
        
        // Cambia la src de la imagen principal
        imagenPrincipal.src = nuevaSrc;
    });
});

// Selecciona el botón y el body
const toggleButton = document.getElementById("toggle-mode");
const body = document.body;

// Escucha el clic en el botón
toggleButton.addEventListener("click", () => {
    // Alterna la clase 'dark-mode' en el body
    body.classList.toggle("dark-mode");
    
    // Verifica si el modo oscuro está activado o desactivado
    if (body.classList.contains("dark-mode")) {
        // Cambia el contenido del botón a "☀" cuando se activa el modo oscuro
        toggleButton.textContent = "😎";
    } else {
        // Cambia el contenido del botón a "🌕" cuando se desactiva el modo oscuro
        toggleButton.textContent = "🌕";
    }
});
