
import 'flowbite';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Detecta el desplazamiento de la página y cambia el color del título
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    const tex_navbar = document.getElementById('tex_navbar');
    const tex_navbar2 = document.getElementById('tex_navbar2');
    const tex_navbar3 = document.getElementById('tex_navbar3');
    const tex_navbar4 = document.getElementById('tex_navbar4');
    const logoImage = document.getElementById('logo-image');
    const name_ive = document.getElementById('name_ive');
    

    if (window.scrollY > 300) {
        navbar.classList.add('scrolled'); 
       // name_ive.classList.remove('hidden'); 
        tex_navbar.classList.add('text-name1'); 
        tex_navbar2.classList.add('text-name2');
        if (tex_navbar3 !== null ) {
          tex_navbar3.classList.add('text-name2'); 
        }
          if (tex_navbar4 !== null) {
          tex_navbar4.classList.add('text-name2'); 
      }
        
        logoImage.src = '/images/Logo Oficial curvas.svg';
       
    } else {
        navbar.classList.remove('scrolled'); // Elimina la clase bg-transparent si es necesario
        //name_ive.classList.add('hidden'); 
        tex_navbar.classList.remove('text-name1'); // Elimina la clase bg-transparent si es necesario
        tex_navbar2.classList.remove('text-name2');
        if (tex_navbar3 !== null ) {
          tex_navbar3.classList.remove('text-name2'); 
        }
        if (tex_navbar4 !== null) {
        tex_navbar4.classList.remove('text-name2');
        }
        logoImage.src = '/images/Logo Oficial blanco curvas.svg';
       
    }
});


//boton para ir al inicio de la pagina
// Selecciona el botón por su ID
const scrollToTopBtn = document.getElementById('scrollToTopBtn');

// Agrega un evento de desplazamiento a la ventana
window.addEventListener('scroll', () => {
  // Verifica la posición vertical de la página
  if (window.scrollY > 180) { // Cambia 100 por la cantidad de desplazamiento en píxeles que desees
    // Muestra el botón cuando el desplazamiento sea mayor que 100 píxeles
    scrollToTopBtn.style.display = 'block';
  } else {
    // Oculta el botón cuando el desplazamiento sea menor o igual a 100 píxeles
    scrollToTopBtn.style.display = 'none';
  }
});

// Agrega un evento de clic al botón
scrollToTopBtn.addEventListener('click', () => {
  // Hace que la página vuelva al inicio con un desplazamiento suave
  window.scrollTo({
    top: 0,
    behavior: 'smooth' // Esto hace que el desplazamiento sea suave
  });
});









