/**
 * Script principal para el sitio SIOC
 */

document.addEventListener('DOMContentLoaded', function() {
    // Detección de animaciones al hacer scroll
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    
    if (animateElements.length > 0) {
      // Función para verificar si un elemento está en el viewport
      function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
          rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.8 &&
          rect.bottom >= 0
        );
      }
      
      // Función para animar elementos cuando son visibles
      function handleScrollAnimation() {
        animateElements.forEach(element => {
          if (isInViewport(element)) {
            element.classList.add('animated');
          }
        });
      }
      
      // Ejecutar al cargar la página
      handleScrollAnimation();
      
      // Ejecutar al hacer scroll
      window.addEventListener('scroll', handleScrollAnimation);
    }
    
    // Reproducción automática de videos
    const autoplayVideos = document.querySelectorAll('video[autoplay]');
    
    autoplayVideos.forEach(video => {
      video.play().catch(function(error) {
        console.log("Video autoplay failed:", error);
      });
    });
    
    // Inicialización de enlaces externos
    const externalLinks = document.querySelectorAll('a[target="_blank"]');
    
    externalLinks.forEach(link => {
      // Agregar rel="noopener noreferrer" por seguridad si no existe
      if (!link.getAttribute('rel') || !link.getAttribute('rel').includes('noopener')) {
        const rel = link.getAttribute('rel') || '';
        link.setAttribute('rel', (rel + ' noopener noreferrer').trim());
      }
    });
  });