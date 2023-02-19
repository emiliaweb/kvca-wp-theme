<?php
/*
    Template Name: Home page
*/
?>
<?php
    get_header();
?>

    <section class="hero">
        <div class="container">
            <div class="hero-wrap">
                <div class="hero-block">
                    <h1 class="title hero-title"><?php the_field('hero-title', false, false); ?></h1>
                    <div class="body-text hero-text"><?php the_field('hero-text'); ?></div>
                    <?php if( have_rows('hero-btn') ): ?>
                        <?php while( have_rows('hero-btn') ): the_row(); 

                            // Get sub field values.
                            $title = get_sub_field('title');
                            $link = get_sub_field('link');

                            ?>
                            
                            <a href="<?= $link; ?>" class="btn hero-btn">
                                <?= $title; ?>
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/arrow-right-white.svg" alt="->" aria-hidden="true">
                            </a>
                            
                        <?php endwhile; ?>
                    <?php endif; ?>                    
                </div>
            </div>
            <div class="hero-banner s-hidden">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/decorations/hero-banner.svg" alt="">
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="container">
            <div class="about-top">
                <h2 class="title about-title"><?php the_field('about-title', false, false); ?></h2>
                <?php if( have_rows('about-members') ): ?>
                    <?php while( have_rows('about-members') ): the_row(); 

                        $title = get_sub_field('title', false, false);
                        $logos = get_sub_field('logos'); /* repeater */
                        $btn = get_sub_field('btn'); /* group */

                        ?>
                        
                        <div class="about-members">
                            <div class="about-members-title"><?= $title; ?></div>
                            <div class="about-members-items">
                            <?php 
                                if ($logos) {
                                    foreach ($logos as $row) {
                                        ?>
                                        <div class="about-members-item">
                                            <img src="<?php echo $row['logo']; ?>">
                                        </div>
                                        <?php
                                    }
                                }
                            ?>
                            </div>
                            <?php
                                if ($btn) {
                                    ?>
                                        <a href="<?= $btn['link']?>" class="btn about-btn btn--narrow"><?= $btn['title']?></a>
                                    <?php
                                }
                            ?>
                        </div>
                        
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <?php if( have_rows('about-list') ): ?> 
                <div class="about-list">

                <?php while( have_rows('about-list') ) : the_row();

                        $icon = get_sub_field('icon');
                        $text = get_sub_field('text', false, false);
                ?>

                    <div class="about-list-item">
                        <div class="about-list-icon">
                            <img src="<?= $icon; ?>">
                        </div>
                        <div class="body-text about-list-text"><?= $text ?></div>
                    </div>
                    
                <?php endwhile; ?> 

                </div> <!-- about-list -->
            <?php else :
                // Do something...
            endif;
            ?>
            <div class="about-blocks">
                <div class="about-block about-block--white">
                    <h3 class="about-block-title"><?php the_field('about-block-1-title'); ?></h3>
                    <ul class="about-block-list about-block-list--slashes">
                    <?php

                    if( have_rows('about-block-1-list') ):

                        while( have_rows('about-block-1-list') ) : the_row();

                            $text = get_sub_field('text', false, false);
                            // Do something...
                        ?>
                        <li><?= $text; ?></li>
                        <?php
                        endwhile;

                    else :
                        // Do something...
                    endif;

                    ?>
                    </ul>
                </div>
                <div class="about-block about-block--green">
                    <h3 class="about-block-title"><?php the_field('about-block-2-title'); ?></h3>
                    <ul class="about-block-list about-block-list--numbers">
                    <?php

                    if( have_rows('about-block-2-list') ):

                        while( have_rows('about-block-2-list') ) : the_row();

                            $text = get_sub_field('text', false, false);
                            // Do something...
                        ?>
                        <li><?= $text; ?></li>
                        <?php
                        endwhile;

                    else :
                        // Do something...
                    endif;

                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="struct">
        <div class="container">
            <div class="struct-grid">
                <div class="struct-col">
                    <h2 class="title struct-title"><?php the_field('struct-title', false, false); ?></h2>
                </div>
                <div class="struct-col">
                    <div class="struct-map">
                        <div class="struct-block arrow-down">
                            <div class="struct-block-text"><?php echo strip_tags(get_field('struct-block-1'), '<br> <strong> <em> <i> <b> <span>'); ?></div>
                        </div>
                        <div class="struct-block">
                            <div class="struct-block-text"><?php echo strip_tags(get_field('struct-block-2'), '<br> <strong> <em> <i> <b> <span>'); ?></div>
                        </div>
                        <div class="struct-block arrow-right-down
                        add-text" data-text="<?php echo strip_tags(get_field('struct-hint')); ?>">
                            <div class="struct-block-text"><?php echo strip_tags(get_field('struct-block-3'), '<br> <strong> <em> <i> <b> <span>'); ?></div>
                        </div>
                        <div class="struct-block arrow-down-double">
                            <div class="struct-block-text"><?php echo strip_tags(get_field('struct-block-4'), '<br> <strong> <em> <i> <b> <span>'); ?></div>
                        </div>
                        <div class="struct-wrap">
                            <div class="struct-block">
                                <div class="struct-block-text"><?php echo strip_tags(get_field('struct-block-5'), '<br> <strong> <em> <i> <b> <span>'); ?></div>
                            </div>
                            <div class="struct-block">
                                <div class="struct-block-text"><?php echo strip_tags(get_field('struct-block-6'), '<br> <strong> <em> <i> <b> <span>'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news" id="news">
        <div class="container">
            <div class="news-top">
                <h2 class="title news-title">Новости</h2>
                <!-- <a href="#" class="btn btn--narrow s-hidden">
                    Показать больше 
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/plus-white.svg" alt="plus" aria-hidden="true">
                </a> -->
                <?php echo do_shortcode('[ajax_load_more id="5275836262" container_type="div" css_classes="news-wrap news-wrap-alm" post_type="post" posts_per_page="4" category="news" offset="3" pause="true" scroll="false" transition_container="false" button_label="Показать больше" button_loading_label="Загрузка" button_done_label="Конец новостей"]')?>
            </div>
            <div class="news-wrap" data-news-container>
                    <?php
                        // The Query
                        $the_query = new WP_Query( array(
                            'post_type' => 'post',
                            'category__in' => 3,
                            'posts_per_page' => 3,
                        ) );

                        // The Loop
                        if ( $the_query->have_posts() ) {
                            $count = 0;
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                        ?>      
                                <a href="#news" data-href="<?php the_permalink(); ?>" class="news-item">
                                    <div class="news-item-img">
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="news post">
                                    </div>
                                    <div class="news-item-body">
                                        <h3 class="news-item-title"><?php the_title(); ?></h3>
                                        <div class="news-item-descr <?php if ($count != 0) { echo 'hidden'; }?>"><?php the_excerpt(); ?></div>
                                    </div>
                                </a>
                    <?php
                                $count = $count + 1;
                            }
                    } else {
                    ?>
                    <p>No posts...</p>
                    <?php
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                    ?>
            </div>
            <div class="news-mobile-btn"></div>
        </div>
    </section>

    <!-- 
        Показ новостей реализован через iframe с учетом посадки на вордпресс в дальнейшем
        news-single можно не менять совсем, вывести новости только в секции news, а дальше скрипт single-on-page.js сам обо всем позаботится. 
        Главное превратить single.html в шаблон записи single.php.
    -->

    <div class="news-single">
        <iframe src="" frameborder="0" scrolling="no" style="height: 0;"></iframe>
    </div>

    <section class="join" id="join">
        <div class="container">
            <h2 class="title join-title"><?php the_field('join-title'); ?></h2>
            
            <?php if( have_rows('join-btns') ): ?> 
            <div class="join-btns"> 
                <?php while( have_rows('join-btns') ) : the_row();

                    $btn = get_sub_field('btn');
                    // Do something...
                ?>

                <?php
                    if ($btn) {
                        if ($btn['is-view-only']) { ?>
                            <a href="<?= $btn['link']; ?>" class="btn btn--ghost btn--narrow join-btn">
                                <?= $btn['title']; ?>
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/eye.svg" alt="eye" aria-hidden="true">
                            </a>
                        <?php
                        } else { ?>
                            <a href="<?= $btn['link']; ?>" download class="btn btn--ghost btn--narrow join-btn">
                                <?= $btn['title']; ?>
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/download.svg" alt="download" aria-hidden="true">
                            </a>
                        <?php
                        }
                    }
                ?>
                    
                <?php endwhile; ?>
            </div>
            <?php else :
                // Do something...
            endif;

            ?>

            <div class="join-outer">
                <div class="join-wrap" id="scrolledContent">
                    <table class="join-table">
                    <?php if( have_rows('join-table') ): ?> 
            
                    <?php while( have_rows('join-table') ) : the_row();
                    
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                    ?>
                        <tr class="join-table-row">
                            <th class="join-table-cell join-table-title">
                                <span class="slash"><?= $title; ?></span>
                            </th>
                            <td class="join-table-cell join-table-descr"><?= $text; ?></td>
                        </tr>     
                    <?php endwhile; ?>
                                
                    <?php else :
                        // Do something...
                    endif;
                    
                    ?>
                    </table>
                </div>
                <div class="join-scrollbar">
                    <div class="join-scrollbar-handle" id="scrollbarHandle">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/scroll-right.svg" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="contact" id="contact">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-col contact-col--left">
                    <h2 class="title contact-title"><?php the_field('contact-title', false, false); ?></h2>
                    <div class="contact-quote"><?php the_field('contact-quote'); ?></div>
                    <ul class="contact-list">
                        <li class="contact-list-item">
                            <a href class="contact-list-link">
                                <img class="contact-list-img" src="<?php bloginfo('template_url'); ?>/assets/img/icons/location.svg" alt="address">
                                <?php the_field('contact-address'); ?>
                            </a>
                        </li>
                        <li class="contact-list-item">
                            <a href="mailto:<?php the_field('contact-email'); ?>" class="contact-list-link">
                                <img class="contact-list-img" src="<?php bloginfo('template_url'); ?>/assets/img/icons/mail.svg" alt="address">
                                <?php the_field('contact-email'); ?>
                            </a>
                        </li>
                        <li class="contact-list-item">
                            <a href="https://<?php the_field('contact-site'); ?>" class="contact-list-link">
                                <img class="contact-list-img" src="<?php bloginfo('template_url'); ?>/assets/img/icons/website.svg" alt="address">
                                <?php the_field('contact-site'); ?>
                            </a>
                        </li>
                        <li class="contact-list-item">
                            <a href="tel:+<?= preg_replace("/[^0-9]/", "", get_field('contact-phone') ); ?>" class="contact-list-link">
                                <img class="contact-list-img" src="<?php bloginfo('template_url'); ?>/assets/img/icons/phone.svg" alt="address">
                                <?php the_field('contact-phone'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="contact-col contact-col--right">
                    <div class="contact-map">
                        <div style="position:relative;overflow:hidden;">
                            <?php the_field('contact-map'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
    get_footer();
?>