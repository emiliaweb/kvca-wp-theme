<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-inner">
                <a href="#" class="header-logo">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/venture-logo.svg" alt="Kazakhstan Venture Capital Association">
                </a>
                <?php
                    wp_nav_menu( [
                        'menu'            => 'nav',
                        'container'       => 'nav',
                        'container_class' => 'header-nav',
                        'container_id'    => 'headerNav',
                        'menu_class'      => 'header-list',
                        'echo'            => true,
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'add_li_class'    => 'header-list-item'
                    ] );
                ?>
                <button class="header-hamburger m-hidden" id="headerHamburger">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/menu.svg" alt="toggle menu">
                </button>
            </div>
        </div>
    </header>