<div class="footer">
    <div class="container flex justify-end">
        <?php
        wp_nav_menu(array('theme_location' => 'footer', 'depth' => 1, 'menu_class' => 'is-style-text-running', 'container_id' => 'footer-menu'));
        ?>
    </div>
</div>



<?php wp_footer(); ?>
</body>

</html>