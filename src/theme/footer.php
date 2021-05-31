<div class="footer">
    <div class="container flex flex-col justify-center md:flew-row md:items-center md:justify-between">
        <?php
        wp_nav_menu(array('theme_location' => 'footer', 'depth' => 1, 'menu_class' => 'is-style-text-running', 'container_id' => 'footer-menu'));
        ?>
        <div class="my-4">
            <?php
            wp_nav_menu(array('theme_location' => 'social-media', 'depth' => 1));
            ?>
        </div>
    </div>
</div>



<?php wp_footer(); ?>
</body>

</html>