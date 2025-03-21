/**
 * Funcionalidad para la barra de navegación de SIOC
 */
document.addEventListener('DOMContentLoaded', function() {
    // Elementos del DOM
    const header = document.querySelector('.sioc-header');
    const navToggle = document.querySelector('.sioc-nav-toggle');
    const nav = document.querySelector('.sioc-nav');
    const overlay = document.querySelector('.sioc-mobile-overlay');
    const searchToggle = document.querySelector('.sioc-search-toggle');
    const searchOverlay = document.querySelector('.sioc-search-overlay');
    const searchClose = document.querySelector('.sioc-search-close');
    const searchInput = document.querySelector('.sioc-search-input');
    const themeToggle = document.querySelector('.sioc-theme-toggle');
    const dropdowns = document.querySelectorAll('.sioc-dropdown');
    
    // Cambiar estilo del header al hacer scroll
    window.addEventListener('scroll', function() {
      if (window.pageYOffset > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
    
    // Establecer estado inicial del header
    if (window.pageYOffset > 50) {
      header.classList.add('scrolled');
    }
    
    // Toggle del menú móvil
    if (navToggle) {
      navToggle.addEventListener('click', function() {
        this.classList.toggle('active');
        nav.classList.toggle('active');
        overlay.classList.toggle('active');
        document.body.style.overflow = this.classList.contains('active') ? 'hidden' : 'auto';
      });
    }
    
    // Toggle de la búsqueda
    if (searchToggle) {
      searchToggle.addEventListener('click', function() {
        searchOverlay.classList.add('active');
        setTimeout(() => {
          searchInput.focus();
        }, 300);
      });
    }
    
    // Cerrar búsqueda
    if (searchClose) {
      searchClose.addEventListener('click', function() {
        searchOverlay.classList.remove('active');
        searchInput.value = '';
      });
    }
    
    // Cerrar menú al hacer clic en overlay
    if (overlay) {
      overlay.addEventListener('click', function() {
        navToggle.classList.remove('active');
        nav.classList.remove('active');
        this.classList.remove('active');
        document.body.style.overflow = 'auto';
      });
    }
    
    // Toggle del tema (claro/oscuro)
    if (themeToggle) {
      themeToggle.addEventListener('click', function() {
        document.body.classList.toggle('dark-theme');
        
        // Guardar preferencia en localStorage
        const isDarkTheme = document.body.classList.contains('dark-theme');
        localStorage.setItem('darkTheme', isDarkTheme ? 'true' : 'false');
        
        // Actualizar ícono
        const iconElement = this.querySelector('i');
        if (isDarkTheme) {
          iconElement.style.backgroundImage = "url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"24\" height=\"24\" fill=\"none\" stroke=\"white\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><circle cx=\"12\" cy=\"12\" r=\"5\"></circle><line x1=\"12\" y1=\"1\" x2=\"12\" y2=\"3\"></line><line x1=\"12\" y1=\"21\" x2=\"12\" y2=\"23\"></line><line x1=\"4.22\" y1=\"4.22\" x2=\"5.64\" y2=\"5.64\"></line><line x1=\"18.36\" y1=\"18.36\" x2=\"19.78\" y2=\"19.78\"></line><line x1=\"1\" y1=\"12\" x2=\"3\" y2=\"12\"></line><line x1=\"21\" y1=\"12\" x2=\"23\" y2=\"12\"></line><line x1=\"4.22\" y1=\"19.78\" x2=\"5.64\" y2=\"18.36\"></line><line x1=\"18.36\" y1=\"5.64\" x2=\"19.78\" y2=\"4.22\"></line></svg>')";
        } else {
          iconElement.style.backgroundImage = "url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"24\" height=\"24\" fill=\"none\" stroke=\"white\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z\"></path></svg>')";
        }
      });
      
      // Cargar preferencia de tema al iniciar
      const savedTheme = localStorage.getItem('darkTheme');
      if (savedTheme === 'true') {
        document.body.classList.add('dark-theme');
        const iconElement = themeToggle.querySelector('i');
        iconElement.style.backgroundImage = "url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"24\" height=\"24\" fill=\"none\" stroke=\"white\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><circle cx=\"12\" cy=\"12\" r=\"5\"></circle><line x1=\"12\" y1=\"1\" x2=\"12\" y2=\"3\"></line><line x1=\"12\" y1=\"21\" x2=\"12\" y2=\"23\"></line><line x1=\"4.22\" y1=\"4.22\" x2=\"5.64\" y2=\"5.64\"></line><line x1=\"18.36\" y1=\"18.36\" x2=\"19.78\" y2=\"19.78\"></line><line x1=\"1\" y1=\"12\" x2=\"3\" y2=\"12\"></line><line x1=\"21\" y1=\"12\" x2=\"23\" y2=\"12\"></line><line x1=\"4.22\" y1=\"19.78\" x2=\"5.64\" y2=\"18.36\"></line><line x1=\"18.36\" y1=\"5.64\" x2=\"19.78\" y2=\"4.22\"></line></svg>')";
      }
    }
    
    // Toggle de dropdowns en móvil
    dropdowns.forEach(dropdown => {
      const link = dropdown.querySelector('.sioc-nav-link');
      
      link.addEventListener('click', function(e) {
        if (window.innerWidth <= 992) {
          e.preventDefault();
          dropdown.classList.toggle('active');
          
          // Cerrar otros dropdowns abiertos
          dropdowns.forEach(otherDropdown => {
            if (otherDropdown !== dropdown && otherDropdown.classList.contains('active')) {
              otherDropdown.classList.remove('active');
            }
          });
        }
      });
    });
    
    // Cerrar menú al cambiar tamaño de ventana a desktop
    window.addEventListener('resize', function() {
      if (window.innerWidth > 992 && nav.classList.contains('active')) {
        navToggle.classList.remove('active');
        nav.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = 'auto';
        
        // Cerrar dropdowns abiertos en móvil
        dropdowns.forEach(dropdown => {
          dropdown.classList.remove('active');
        });
      }
    });
    
    // Evitar que se cierre el dropdown al hacer clic dentro de él
    document.querySelectorAll('.sioc-dropdown-menu').forEach(menu => {
      menu.addEventListener('click', function(e) {
        e.stopPropagation();
      });
    });
    
    // Cerrar búsqueda al presionar Escape
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && searchOverlay.classList.contains('active')) {
        searchOverlay.classList.remove('active');
        searchInput.value = '';
      }
    });
    
    // Manejar envío del formulario de búsqueda
    const searchForm = document.querySelector('.sioc-search-form');
    if (searchForm) {
      searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const query = searchInput.value.trim();
        
        if (query) {
          // Aquí puedes implementar la lógica de búsqueda
          // Por ejemplo, redirigir a la página de resultados
          window.location.href = 'buscar.php?q=' + encodeURIComponent(query);
          searchOverlay.classList.remove('active');
        }
      });
    }
    
    // Cerrar menú móvil al hacer clic en un enlace
    document.querySelectorAll('.sioc-nav-link').forEach(link => {
      link.addEventListener('click', function() {
        if (window.innerWidth <= 992 && !this.parentElement.classList.contains('sioc-dropdown')) {
          navToggle.classList.remove('active');
          nav.classList.remove('active');
          overlay.classList.remove('active');
          document.body.style.overflow = 'auto';
        }
      });
    });
  });