
<?php
/**
 * Página principal de SIOC
 */

// Inicializar el sitio
define('SIOC_INIT', true);
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Variables específicas de la página
$page_title = 'Inicio';
$page_description = 'SIOC ofrece soluciones tecnológicas innovadoras, desarrollo web, aplicaciones móviles, IA y automatización para empresas en México. Transformamos retos digitales en oportunidades de crecimiento.';
$body_class = 'home-page';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo page_title($page_title); ?></title>
    
    <!-- Meta tags SEO -->
    <meta name="description" content="<?php echo $page_description; ?>">
    <meta name="keywords" content="SIOC, soluciones tecnológicas, desarrollo web, aplicaciones móviles, inteligencia artificial, automatización, México">
    <meta name="author" content="SIOC">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:title" content="<?php echo page_title($page_title); ?>">
    <meta property="og:description" content="<?php echo $page_description; ?>">
    <meta property="og:image" content="<?php echo asset_url('img/og-image.jpg'); ?>">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    <meta property="twitter:title" content="<?php echo page_title($page_title); ?>">
    <meta property="twitter:description" content="<?php echo $page_description; ?>">
    <meta property="twitter:image" content="<?php echo asset_url('img/twitter-image.jpg'); ?>">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo asset_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset_url('assets/css/components/navbar.css'); ?>">
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo asset_url('img/favicon.ico'); ?>">
    <link rel="apple-touch-icon" href="<?php echo asset_url('img/apple-touch-icon.png'); ?>">
    
    <!-- Structured Data / JSON-LD -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "SIOC",
        "url": "<?php echo SITE_URL; ?>",
        "logo": "<?php echo asset_url('img/logo/LogoBlanco.svg'); ?>",
        "description": "<?php echo SITE_DESCRIPTION; ?>",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Guadalajara",
            "addressRegion": "Jalisco",
            "addressCountry": "MX"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "<?php echo CONTACT_PHONE; ?>",
            "contactType": "customer service",
            "email": "<?php echo CONTACT_EMAIL; ?>"
        },
        "sameAs": [
            <?php
            $social_links_json = [];
            foreach ($social_links as $url) {
                $social_links_json[] = '"' . $url . '"';
            }
            echo implode(',', $social_links_json);
            ?>
        ]
    }
    </script>
</head>
<body class="<?php echo $body_class; ?>">
    <!-- Navbar al estilo Blue Pixel para SIOC -->
    <header class="sioc-header">
      <div class="sioc-container">
        <!-- Logo -->
        <a href="<?php echo site_url(); ?>" class="sioc-logo">
          <img src="<?php echo asset_url('img/logo/LogoBlanco.svg'); ?>" alt="SIOC Logo" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%2240%22><text x=%220%22 y=%2225%22 font-size=%2220%22 fill=%22white%22>SIOC</text></svg>'">
        </a>
        
        <!-- Navegación principal -->
        <nav class="sioc-nav">
          <ul class="sioc-nav-menu">
            <?php foreach ($main_menu as $key => $item): ?>
                <li class="sioc-nav-item<?php echo isset($item['submenu']) ? ' sioc-dropdown' : ''; ?>">
                    <a href="<?php echo site_url($item['url']); ?>" class="sioc-nav-link <?php echo active_class($item['url']); ?>">
                        <?php echo $item['title']; ?>
                        <?php if (isset($item['submenu'])): ?>
                            <i class="sioc-icon-arrow"></i>
                        <?php endif; ?>
                    </a>
                    <?php if (isset($item['submenu'])): ?>
                        <ul class="sioc-dropdown-menu">
                            <?php foreach ($item['submenu'] as $submenu_key => $submenu_item): ?>
                                <li>
                                    <a href="<?php echo site_url($submenu_item['url']); ?>"><?php echo $submenu_item['title']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
          </ul>
        </nav>
        
        <!-- Acciones de navegación -->
        <div class="sioc-nav-actions">
          <div class="sioc-search-toggle">
            <i class="sioc-icon-search"></i>
          </div>
          <div class="sioc-theme-toggle">
            <i class="sioc-icon-moon"></i>
          </div>
          <a href="<?php echo site_url('pages/contacto.php'); ?>" class="sioc-button">Cotizar Proyecto</a>
          <button class="sioc-nav-toggle" aria-label="Menú">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
      </div>
      
      <!-- Barra de búsqueda desplegable -->
      <div class="sioc-search-overlay">
        <div class="sioc-container">
          <form class="sioc-search-form" action="<?php echo site_url('buscar.php'); ?>" method="get">
            <input type="text" name="q" placeholder="¿Qué estás buscando?" class="sioc-search-input">
            <button type="submit" class="sioc-search-submit">
              <i class="sioc-icon-search"></i>
            </button>
            <button type="button" class="sioc-search-close">
              <i class="sioc-icon-close"></i>
            </button>
          </form>
        </div>
      </div>
    </header>

    <!-- Overlay para menú móvil -->
    <div class="sioc-mobile-overlay"></div>
    
    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="fullscreen-section" id="hero">
            <div class="section-background">
               <!-- <video autoplay loop muted playsinline poster="assets/img/">
                    <source src="assets/video/hero.mp4" type="video/mp4">
                    <!-- Fallback para cuando no se puede reproducir el video -->
                    <img src="<?php echo asset_url('img/sections/hero/hero-fallback.jpg'); ?>" alt="Tecnología que transforma" width="1920" height="1080">
                </video>-->
            </div>
            <div class="overlay"></div>
            <div class="section-content">
                <h1>TECNOLOGÍA QUE TRANSFORMA</h1>
                <p class="section-description">Innovación digital para el crecimiento de tu empresa</p>
                <a href="<?php echo site_url('pages/servicios.php'); ?>" class="cta-button">DESCUBRIR MÁS</a>
            </div>
        </section>

        <!-- Historia Section -->
        <section class="fullscreen-section" id="historia-preview">
            <div class="section-background">
               <!-- <img src="<?php echo asset_url('img/sections/about/historia-bg.jpg'); ?>" alt="Historia de SIOC - Innovación digital desde 2024" width="1920" height="1080" loading="lazy">-->
            </div>
            <div class="overlay"></div>
            <div class="section-content">
                <h2>NUESTRA HISTORIA</h2>
                <p class="section-description">Liderando la innovación digital desde 2024</p>
                <a href="<?php echo site_url('pages/historia.php'); ?>" class="cta-button">CONOCE MÁS</a>
            </div>
        </section>

        <!-- Servicios Section -->
        <section class="fullscreen-section" id="servicios-preview">
            <div class="section-background">
               <!-- <video autoplay loop muted playsinline poster="assets/img/">
                    <source src="assets/video/" type="video/mp4">
                    <!-- Fallback para cuando no se puede reproducir el video -->
                    <img src="<?php echo asset_url('img/sections/services/servicios-fallback.jpg'); ?>" alt="Nuestros servicios tecnológicos" width="1920" height="1080" loading="lazy">
                </video>-->
            </div>
            <div class="overlay"></div>
            <div class="section-content">
                <h2>NUESTROS SERVICIOS</h2>
                <p class="section-description">Soluciones tecnológicas a la medida</p>
                <a href="<?php echo site_url('pages/servicios.php'); ?>" class="cta-button">EXPLORAR</a>
            </div>
        </section>

        <!-- Equipo Section -->
        <section class="fullscreen-section" id="equipo-preview">
            <div class="section-background">
           <!-- <img src="<?php echo asset_url('img/sections/team/equipo-bg.jpg'); ?>" alt="Nuestro equipo de expertos" width="1920" height="1080" loading="lazy">-->
            </div>
            <div class="overlay"></div>
            <div class="section-content">
                <h2>NUESTRO EQUIPO</h2>
                <p class="section-description">Expertos apasionados por la tecnología</p>
                <a href="<?php echo site_url('pages/equipo.php'); ?>" class="cta-button">CONOCER EQUIPO</a>
            </div>
        </section>

        <!-- Contacto Section -->
        <section class="fullscreen-section" id="contacto-preview">
            <div class="section-background">
            <!--<img src="<?php echo asset_url('img/sections/contact/contacto-bg.jpg'); ?>" alt="Contacto SIOC" width="1920" height="1080" loading="lazy">-->
            </div>
            <div class="overlay"></div>
            <div class="section-content">
                <h2>CONTACTO</h2>
                <p class="section-description">Comienza tu transformación digital</p>
                <a href="<?php echo site_url('pages/contacto.php'); ?>" class="cta-button">CONTÁCTANOS</a>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <p>&copy; <?php echo date('Y'); ?> SIOC. Todos los derechos reservados.</p>
        </div>
    </footer>
    
    <!-- Scripts principales -->
    <script src="<?php echo asset_url('js/main.js'); ?>"></script>
    <script src="<?php echo asset_url('js/components/navbar.js'); ?>"></script>
    
    <!-- Script para reproducción automática de videos -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const videos = document.querySelectorAll('video');
            videos.forEach(video => {
                video.play().catch(function(error) {
                    console.log("Video autoplay failed:", error);
                });
            });
        });
    </script>
</body>
</html>
