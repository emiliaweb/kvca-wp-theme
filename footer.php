<footer class="footer">
        <div class="container">
            <div class="footer-row">
                <a href="#" class="footer-logo footer-logo--first">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/venture-logo.svg" alt="Venture Capital">
                </a>
                <nav class="footer-col footer-nav">
                    <?php 
                    $menu_items = wp_get_nav_menu_items(wp_get_nav_menu_object( 'footer-nav' )->term_id); 
                    $total_items = count($menu_items);
                    $half_items = $total_items / 2;
                    $remaining_items = $total_items % 2;
                    ?>
                    <ul class="footer-list">
                    <?php
                        for ($i = 0; $i < $half_items; $i++) { ?>
                            <li class="footer-list-item">
                                <a href="<?= $menu_items[$i]->url; ?>"><?= $menu_items[$i]->title; ?></a>
                            </li>
                    <?php } ?>
                    </ul>
                    <ul class="footer-list">
                    <?php
                        for ($i = $half_items + $remaining_items; $i < $total_items; $i++) { ?>
                            <li class="footer-list-item">
                                <a href="<?= $menu_items[$i]->url; ?>"><?= $menu_items[$i]->title; ?></a>
                            </li>
                    <?php } ?>
                    </ul>
                </nav>
                <div class="footer-col">
                    <div class="footer-contact">
                        <ul class="footer-contact-list">
                            <li class="footer-contact-item">
                                <a href class="footer-contact-link">
                                    <img class="footer-contact-img" src="<?php bloginfo('template_url'); ?>/assets/img/icons/location.svg" alt="address">
                                    <?php the_field('footer-address'); ?>
                                </a>
                            </li>
                            <li class="footer-contact-item">
                                <a href="tel:+<?= preg_replace("/[^0-9]/", "", get_field('footer-phone') ); ?>" class="footer-contact-link">
                                    <img class="footer-contact-img" src="<?php bloginfo('template_url'); ?>/assets/img/icons/phone.svg" alt="phone">
                                    <?php the_field('footer-phone'); ?>
                                </a>
                            </li>
                            <li class="footer-contact-item">
                                <a href="mailto:<?php the_field('footer-site'); ?>" class="footer-contact-link">
                                    <img class="footer-contact-img" src="<?php bloginfo('template_url'); ?>/assets/img/icons/website.svg" alt="website">
                                    <?php the_field('footer-site'); ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-col">
                    <a href="#" class="footer-logo footer-logo--second">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/venture-logo.svg" alt="Venture Capital">
                    </a>
                    <div class="footer-cr">
                        <?= date("Y"); ?> <br>
                        Все права защищены ©
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
