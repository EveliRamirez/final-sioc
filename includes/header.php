<?php
/**
 * Header principal con navbar para SIOC
 */

// Prevenir acceso directo
defined('SIOC_INIT') or exit('Acceso directo no permitido');

// Establecer título de la página
$page_title = isset($page_title) ? page_title($page_title) : page_title();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    
    <!-- Meta tags SEO -->
    <meta name="description" content="<?php echo isset($page_description) ? $page_description : SITE_DESCRIPTION; ?>">
    <meta name="keywords" content="SIOC, soluciones tecnológicas, desarrollo web, aplicaciones móviles, inteligencia artificial, automatización, México">
    <meta name="author" content="SIOC">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:title" content="<?php echo $page_title; ?>">
    <meta property="og:description" content="<?php echo isset($page_description) ? $page_description : SITE_DESCRIPTION; ?>">
    <meta property="og:image" content="<?php echo asset_url('img/og-image.jpg'); ?>">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    <meta property="twitter:title" content="<?php echo $page_title; ?>">
    <meta property="twitter:description" content="<?php echo isset($page_description) ? $page_description : SITE_DESCRIPTION; ?>">
    <meta property="twitter:image" content="<?php echo asset_url('img/twitter-image.jpg'); ?>">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo asset_url('css/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset_url('css/components/navbar.css'); ?>">
    <?php if (isset($extra_css)): ?>
        <?php foreach ($extra_css as $css): ?>
            <link rel="stylesheet" href="<?php echo asset_url($css); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo asset_url('img/favicon.ico'); ?>">
    <link rel="apple-touch-icon" href="<?php echo asset_url('img/apple-touch-icon.png'); ?>">
</head>
<body<?php echo isset($body_class) ? ' class="' . $body_class . '"' : ''; ?>>
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