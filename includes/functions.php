<?php
/**
 * Funciones auxiliares para el sitio SIOC
 */

// Prevenir acceso directo
defined('SIOC_INIT') or exit('Acceso directo no permitido');

/**
 * Obtener URL completa desde una ruta relativa
 *
 * @param string $path Ruta relativa
 * @return string URL completa
 */
function site_url($path = '') {
    return BASE_URL . ltrim($path, '/');
}

/**
 * Obtener la URL de un asset
 *
 * @param string $path Ruta relativa al directorio de assets
 * @return string URL completa del asset
 */
function asset_url($path = '') {
    return ASSETS_URL . ltrim($path, '/');
}

/**
 * Verificar si la página actual es la indicada
 *
 * @param string $url URL a verificar
 * @return boolean True si es la página actual
 */
function is_current_page($url) {
    // Obtener la URL actual
    $current_url = $_SERVER['PHP_SELF'];
    $current_url = basename($current_url);
    
    // Si es la página de inicio
    if ($url == 'index.php' && ($current_url == 'index.php' || $current_url == '')) {
        return true;
    }
    
    // Si la URL contiene el nombre de la página actual
    if (strpos($current_url, basename($url)) !== false) {
        return true;
    }
    
    return false;
}

/**
 * Determinar si un item del menú debe tener la clase 'active'
 *
 * @param string $url URL del item del menú
 * @return string Clase 'active' o cadena vacía
 */
function active_class($url) {
    return is_current_page($url) ? 'active' : '';
}

/**
 * Generar título de la página
 *
 * @param string $title Título específico de la página
 * @return string Título completo
 */
function page_title($title = '') {
    if (empty($title)) {
        return SITE_NAME . ' - ' . SITE_DESCRIPTION;
    }
    
    return $title . ' | ' . SITE_NAME;
}