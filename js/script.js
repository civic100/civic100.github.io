
const imagenesLaterales = document.querySelectorAll('.images-laterales img');

const imagenPrincipal = document.getElementById('imagen-principal');

imagenesLaterales.forEach(imagen => {
    imagen.addEventListener('click', () => {
        const nuevaSrc = imagen.getAttribute('data-src');
        imagenPrincipal.src = nuevaSrc;
    });
});


const toggleButton = document.getElementById("toggle-mode");
const body = document.body;

toggleButton.addEventListener("click", () => {
    body.classList.toggle("dark-mode");
    
    if (body.classList.contains("dark-mode")) {
        toggleButton.textContent = "🌞";
    } else {
        toggleButton.textContent = "🌑";
    }
});
