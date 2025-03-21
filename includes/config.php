<?php
/**
 * Archivo de configuración para el sitio SIOC
 */

// Prevenir acceso directo
defined('SIOC_INIT') or define('SIOC_INIT', true);

// Información del sitio
define('SITE_NAME', 'SIOC');
define('SITE_DESCRIPTION', 'Transformamos retos en oportunidades | Soluciones Tecnológicas');
define('SITE_URL', 'https://www.sioccorp.com');

// Rutas del sistema
define('BASE_URL', '/'); // Ajustar según la ubicación en el servidor
define('ASSETS_URL', BASE_URL . 'assets/');
define('CSS_URL', ASSETS_URL . 'css/');
define('JS_URL', ASSETS_URL . 'js/');
define('IMG_URL', ASSETS_URL . 'img/');

// Contacto
define('CONTACT_EMAIL', 'smmaicorporation@gmail.com');
define('CONTACT_PHONE', '+526692536048');

// Enlaces de redes sociales
$social_links = [
    'facebook' => 'https://www.facebook.com/SIOC',
    'twitter' => 'https://www.twitter.com/SIOC',
    'linkedin' => 'https://www.linkedin.com/company/SIOC',
    'instagram' => 'https://www.instagram.com/SIOC'
];

// Menú principal
$main_menu = [
    'inicio' => [
        'title' => 'Inicio',
        'url' => 'index.php',
    ],
    'historia' => [
        'title' => 'Historia',
        'url' => 'pages/historia.php',
    ],
    'servicios' => [
        'title' => 'Servicios',
        'url' => 'pages/servicios.php',
        'submenu' => [
            'desarrollo-web' => [
                'title' => 'Desarrollo Web',
                'url' => 'pages/servicios/desarrollo-web.php',
            ],
            'aplicaciones-moviles' => [
                'title' => 'Apps Móviles',
                'url' => 'pages/servicios/aplicaciones-moviles.php',
            ],
            'inteligencia-artificial' => [
                'title' => 'Inteligencia Artificial',
                'url' => 'pages/servicios/inteligencia-artificial.php',
            ],
            'automatizacion' => [
                'title' => 'Automatización',
                'url' => 'pages/servicios/automatizacion.php',
            ],
        ],
    ],
    'equipo' => [
        'title' => 'Equipo',
        'url' => 'pages/equipo.php',
    ],
    'contacto' => [
        'title' => 'Contacto',
        'url' => 'pages/contacto.php',
    ],
];