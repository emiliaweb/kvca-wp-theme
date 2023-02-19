<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body>
    <article class="single">
        <div class="container">
            <div class="single-top">
                <h2 class="title single-title"><?php the_title(); ?></h2>
                <a href="#" class="btn btn--narrow s-hidden" data-close-post>
                    Свернуть
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/cross-white.svg" alt="plus" aria-hidden="true">
                </a>
            </div>
            <div class="body-text single-body">
                <div class="single-slider">
                    <div class="swiper single-swiper" id="singleSwiper">
                        <div class="swiper-wrapper">
                        <?php if( have_rows('single-slider') ): ?> 
            
                        <?php while( have_rows('single-slider') ) : the_row();
                        
                            $media = get_sub_field('media');

                            if (preg_match('/^.*\.(jpg|jpeg|png|gif)$/i', $media)) {
                            
                        ?>
                        <div class="swiper-slide">
                            <div class="single-img">
                                <img src="<?= $media; ?>">
                            </div>
                        </div>
                                        
                        <?php } else if (preg_match('/^.*\.(mp4)$/i', $media)) { ?>
                            <div class="swiper-slide">
                                <div class="single-img">
                                    <video controls>
                                        <source src="<?= $media; ?>">
                                    </video>
                                </div>
                            </div>
                        <?php
                        }
                        endwhile; ?>
                        
                        <?php else :
                            // Do something...
                        endif;
                        
                        ?>
                        </div>
                        <div class="swiper-pagination single-pagination"></div>
                    </div>
                </div>
                <?php the_content(); ?>
            </div>
            <a href="#" class="btn btn--narrow single-btn m-hidden" data-close-post>
                Свернуть
                <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/cross-white.svg" alt="plus" aria-hidden="true">
            </a>
        </div>
    </article>

    <?php wp_footer(); ?>
</body>
</html>