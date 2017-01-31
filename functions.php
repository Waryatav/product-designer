<?php
/**
 * product-designer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package product-designer
 */

if ( ! function_exists( 'product_designer_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function product_designer_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on product-designer, use a find and replace
		 * to change 'product-designer' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'product-designer', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'product-designer' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'product_designer_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'product_designer_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function product_designer_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'product_designer_content_width', 640 );
}

add_action( 'after_setup_theme', 'product_designer_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function product_designer_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'product-designer' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'product-designer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'product_designer_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function product_designer_scripts() {
//    wp_enqueue_style( 'product-designer-style', get_stylesheet_uri() );

	wp_enqueue_style( 'product-designer-style-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'product-designer-style-libs', get_template_directory_uri() . '/css/libs.min.css' );

	wp_enqueue_style( 'product-designer-style-slick', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css' );

	wp_enqueue_style( 'product-designer-style-validation', get_template_directory_uri() . '/css/validation.css' );

	wp_enqueue_style( 'product-designer-style-jquery-ui', 'https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/sunny/jquery-ui.css' );

	wp_enqueue_style( 'product-designer-style-owl', get_template_directory_uri() . '/css/owl.carousel.css' );

	wp_enqueue_style( 'product-designer-style-main-css', get_template_directory_uri() . '/css/styles.min.css' );


	wp_enqueue_script( 'product-designer-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'product-designer-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'product-designer-script-jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', array(), '', true );

	wp_enqueue_script( 'product-designer-script-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '', true );

	wp_enqueue_script( 'product-designer-script-validation', get_template_directory_uri() . '/js/validation.js', array(), '', true );

	wp_enqueue_script( 'product-designer-script-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAbzb891KdumTma93f8R4dUvYnBUWaaz5A&language=en&callback=initialize', array(), '', true );

	wp_enqueue_script( 'product-designer-script-ajax', get_template_directory_uri() . '/js/ajax.js', array(), '', true );

	wp_enqueue_script( 'product-designer-script-owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '', true );

	wp_enqueue_script( 'product-designer-script-mainscript', get_template_directory_uri() . '/js/script.min.js', array(), '', true );

	wp_localize_script( 'product-designer-script-ajax', 'vars',
		array(
			'url'      => admin_url( 'admin-ajax.php' ),
			'template' => get_template_directory_uri() . "/",
		)
	);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'product_designer_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_action( 'wp_ajax_contact_us', 'contact_us' );
add_action( 'wp_ajax_nopriv_contact_us', 'contact_us' );
add_action( 'wp_ajax_reserve_day', 'reserve_day' );
add_action( 'wp_ajax_nopriv_reserve_day', 'reserve_day' );
add_action( 'wp_ajax_get_service_placeholder', 'get_service_placeholder' );
add_action( 'wp_ajax_nopriv_get_service_placeholder', 'get_service_placeholder' );

function contact_us() {

	if ( $_POST ) {


		$mail = fw_get_db_customizer_option( 'mail' );

		$strMail = 'С Вашего сайта пришел запрос на консультацию: ' . ' <br>';

		$strMail .= 'Имя отправителя: ' . $_POST['data']['name'] . ' <br>';
		$strMail .= 'Почта отправителя: ' . $_POST['data']['mail'] . ' <br>';
		$strMail .= 'Город отправителя: ' . $_POST['data']['city'] . ' <br>';
		$strMail .= 'Номер телефона отправителя: ' . $_POST['data']['phone'] . ' <br>';
		$strMail .= 'Интересующая услуга: ' . $_POST['data']['we_need'] . ' <br>';
		$strMail .= 'Бюджет: ' . $_POST['data']['budget'] . ' <br>';

		wp_mail( $mail, "Письмо с сайта " . get_bloginfo( 'name' ), $strMail, "Content-type: text/html; charset=UTF-8\r\n" );

		wp_die();
	}

}

function reserve_day() {
	if ( $_POST ) {
		global $wpdb;

		$mail = fw_get_db_customizer_option( 'mail' );

		$strMail = 'С Вашего сайта отправлена заяка на консультацию: ' . ' <br>';

		$strMail .= 'Имя отправителя: ' . $_POST['data']['name'] . ' <br>';
		$strMail .= 'Почта отправителя: ' . $_POST['data']['mail'] . ' <br>';
		$strMail .= 'Город отправителя: ' . $_POST['data']['city'] . ' <br>';
		$strMail .= 'Номер телефона отправителя: ' . $_POST['data']['phone'] . ' <br>';
		$strMail .= 'Интересующая услуга: ' . $_POST['data']['we_need'] . ' <br>';
		$strMail .= 'Бюджет: ' . $_POST['data']['budget'] . ' <br>';
		$strMail .= 'Дата консультации: ' . date( 'd-m-Y', $_POST['data']['dt_evetn'] ) . ' <br>';

		wp_mail( $mail, "Письмо с сайта " . get_bloginfo( 'name' ), $strMail, "Content-type: text/html; charset=UTF-8\r\n" );

		$wpdb->insert( 'orders', [
			'dt_add'   => time(),
			'dt_event' => $_POST['data']['dt_evetn'],
			'name'     => $_POST['data']['name'],
			'city'     => $_POST['data']['city'],
			'service'  => $_POST['data']['we_need'],
			'budget'   => $_POST['data']['budget'],
			'mail'     => $_POST['data']['mail'],
			'phone'    => $_POST['data']['phone'],
			'status'   => 0,

		] );
		echo date( 'F d,Y', $_POST['data']['dt_evetn'] ) . '. Meeting with Sam Mountain to discuss ' . $_POST['data']['we_need'] . '.';

		wp_die();
	}
}

function get_service_placeholder() {
	if ( $_POST ) {

		fw_get_db_customizer_option( 'services' )[ $_POST['data_id'] ]['placeholder'];
		echo fw_get_db_customizer_option( 'services' )[ $_POST['data_id'] ]['placeholder'];

		die();
	}
}

//add_pge_backend
function register_orders_page() {
	add_menu_page(
		'Заявки', 'Заявки', 'manage_options', 'order', 'admin_orders_page', 'dashicons-calendar-alt', 190
	);
	add_submenu_page( 'order', 'Подтвержденные заявки', 'Подтвержденные заявки', 'manage_options', 'confirm-orders', 'admin_orders_page' );

	add_submenu_page( 'order', 'Отклоненные заявки', 'Отклоненные заявки', 'manage_options', 'reject-orders', 'admin_orders_page' );
}

function admin_orders_page() {
	global $wpdb;

	if ( isset( $_GET['reject'] ) ) {
		$wpdb->update( 'orders', [ 'status' => 2 ], [ 'id' => $_GET['reject'] ] );
	}

	if ( isset( $_GET['confirm'] ) ) {
		$wpdb->update( 'orders', [ 'status' => 1 ], [ 'id' => $_GET['confirm'] ] );
	}
	if ( $_GET['page'] == 'order' ) {
		$status = 0;
	} elseif ( $_GET['page'] == 'confirm-orders' ) {
		$status = 1;
	} elseif ( $_GET['page'] == 'reject-orders' ) {
		$status = 2;
	}
	$orders = $wpdb->get_results( "SELECT * FROM `orders` WHERE `status`=$status ORDER BY `dt_event`", ARRAY_A );
	echo fw_render_view( get_stylesheet_directory() . '/template-parts/orders.php', [ 'orders' => $orders ] );


}

add_action( 'admin_menu', 'register_orders_page' );

function draw_calendar( $month, $year, $result_reserved, $result_confirm, $action = 'none' ) {
	$calendar = '<table cellpadding="0" cellspacing="0" class="b-calendar__tb">';

	// вывод дней недели
	$headings = array( 'mo', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun' );
	$calendar .= '<thead><tr class="b-calendar__row">';
	for ( $head_day = 0; $head_day <= 6; $head_day ++ ) {
		$calendar .= '<th class="b-calendar__head';
		// выделяем выходные дни
		if ( $head_day != 0 ) {
			if ( ( $head_day % 5 == 0 ) || ( $head_day % 6 == 0 ) ) {
				$calendar .= ' b-calendar__weekend';
			}
		}
		$calendar .= '">';
		$calendar .= '<th class="b-calendar__number">' . $headings[ $head_day ] . '</th>';
		$calendar .= '</th>';
	}
	$calendar .= '</tr></thead>';

	// выставляем начало недели на понедельник
	$running_day = date( 'w', mktime( 0, 0, 0, $month, 1, $year ) );
	$running_day = $running_day - 1;
	if ( $running_day == - 1 ) {
		$running_day = 6;
	}

	$days_in_month     = date( 't', mktime( 0, 0, 0, $month, 1, $year ) );
	$day_counter       = 0;
	$days_in_this_week = 1;
	$dates_array       = array();

	// первая строка календаря
	$calendar .= '<tr class="b-calendar__row">';

	// вывод пустых ячеек
	for ( $x = 0; $x < $running_day; $x ++ ) {
		$calendar .= '<td class="b-calendar__np"></td>';
		$days_in_this_week ++;
	}

	// дошли до чисел, будем их писать в первую строку
	for ( $list_day = 1; $list_day <= $days_in_month; $list_day ++ ) {
		$curr_day   = $year . '-' . $month . '-' . $list_day;
		$curr_time  = strtotime( $curr_day );
		$popup_date = date( "d F", $curr_time ) . '<br>' . date( "Y", $curr_time );
		if ( strtotime( $curr_day ) < strtotime( date( 'Y-n-j' ) ) ) {
			$calendar .= '<td class="b-calendar__day">';
		} elseif ( array_search( $curr_day, $result_reserved ) ) {
			$calendar .= '<td class="reserved b-calendar__day">                                        
                                         <span class="day-popup">
		                                    Reserved <br> ' . $popup_date . '
		                                </span>';
		} elseif ( array_search( $curr_day, $result_confirm ) ) {
			$calendar .= '<td class="busy_day b-calendar__day">
                                         <span class="day-popup">
		                                    Busy day <br> ' . $popup_date . '
		                                </span>';
		} elseif ( strtotime( $curr_day ) >= strtotime( date( 'Y-n-j' ) ) ) {
			$calendar .= '<td href="#modal1" data-time="' . $curr_time . '" class="free_day b-calendar__day open_modal"><span class="day-popup-free_day">
                                    Book a meeting
                                </span>';
		}; ?>

        <!--        <span class="day-popup">-->
        <!--		                                    Busy day <br> --><?//= date( 'd F', $day ); ?><!--<br>--><?//= date( 'Y', $day ); ?>
        <!--		                                </span>-->

		<?php
		// выделяем выходные дни
//		if ( $running_day != 0 ) {
//			if ( ( $running_day % 5 == 0 ) || ( $running_day % 6 == 0 ) ) {
//				$calendar .= ' b-calendar__weekend';
//			}
//		}
//		$calendar .= '">';

		// пишем номер в ячейку

		$calendar .= '<div class="b-calendar__number">' . $list_day . '</div>';


		$calendar .= '</td>';

		// дошли до последнего дня недели
		if ( $running_day == 6 ) {
			// закрываем строку
			$calendar .= '</tr>';
			// если день не последний в месяце, начинаем следующую строку
			if ( ( $day_counter + 1 ) != $days_in_month ) {
				$calendar .= '<tr class="b-calendar__row">';
			}
			// сбрасываем счетчики
			$running_day       = - 1;
			$days_in_this_week = 0;
		}

		$days_in_this_week ++;
		$running_day ++;
		$day_counter ++;
	}

	// выводим пустые ячейки в конце последней недели
	if ( $days_in_this_week < 8 ) {
		for ( $x = 1; $x <= ( 8 - $days_in_this_week ); $x ++ ) {
			$calendar .= '<td class="b-calendar__np"> </td>';
		}
	}
	$calendar .= '</tr>';
	$calendar .= '</table>';

	return $calendar;
}