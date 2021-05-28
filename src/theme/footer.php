<div class="footer">
    <div class="container flex justify-end items-center">
        <?php
        wp_nav_menu(array('theme_location' => 'footer', 'depth' => 1, 'menu_class' => 'is-style-text-running', 'container_id' => 'footer-menu'));
        wp_nav_menu(array('theme_location' => 'social-media', 'depth' => 1));
        ?>
    </div>
</div>



<?php wp_footer(); ?>
</body>

</html>