<?php

add_action( 'wp_enqueue_scripts', 'kvca_scripts' );

function kvca_scripts() {
	wp_enqueue_style( 'font-inter', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap' );
	wp_enqueue_style( 'font-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap' );
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.min.css' );
	wp_enqueue_style( 'wp-integration', get_template_directory_uri() . '/assets/css/wp-integration.css' );
	if (is_front_page()) {
		wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.min.css' );

		wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js', array(), null, true );
		wp_enqueue_script( 'gsap-draggable', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/Draggable.min.js', array(), null, true );
		wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js', array(), null, true );
		wp_enqueue_script( 'single-on-page', get_template_directory_uri() . '/assets/js/single-on-page.js', array(), null, true );
		wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array(), null, true );
		wp_enqueue_script( 'join', get_template_directory_uri() . '/assets/js/join.js', array(), null, true );
		wp_enqueue_script( 'news', get_template_directory_uri() . '/assets/js/news.js', array(), null, true );
	} else if (is_single() || in_category('news')) {
		wp_enqueue_style( 'single', get_template_directory_uri() . '/assets/css/single.min.css' );
		wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css' );

		wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), null, true );
		wp_enqueue_script( 'single', get_template_directory_uri() . '/assets/js/single.js', array(), null, true );
	}
}

show_admin_bar(false);

add_action('after_setup_theme', function() {
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('title-tag');
});

add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}

add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );

# Формирует данные для отображения SVG как изображения в медиабиблиотеке.
function show_svg_in_media_library( $response ) {

	if ( $response['mime'] === 'image/svg+xml' ) {

		// С выводом названия файла
		$response['image'] = [
			'src' => $response['url'],
		];
	}

	return $response;
}

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function mytheme_custom_excerpt_length( $length ) {
    return 80;
}

add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 120 );

?>
