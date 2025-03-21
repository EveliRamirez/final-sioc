<?php
/**
 * Footer para SIOC
 */

// Prevenir acceso directo
defined('SIOC_INIT') or exit('Acceso directo no permitido');
?>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <p>&copy; <?php echo date('Y'); ?> SIOC. Todos los derechos reservados.</p>
        </div>
    </footer>
    
    <!-- Scripts principales -->
    <script src="<?php echo asset_url('js/main.js'); ?>"></script>
    <script src="<?php echo asset_url('js/components/navbar.js'); ?>"></script>
    
    <?php if (isset($extra_js)): ?>
        <?php foreach ($extra_js as $js): ?>
            <script src="<?php echo asset_url($js); ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>