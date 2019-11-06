<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'BASKETBALL_DIR_URI' ) )
		define( 'BASKETBALL_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'BASKETBALL_DIR_ASSETS_URI' ) )
		define( 'BASKETBALL_DIR_ASSETS_URI', BASKETBALL_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'BASKETBALL_DIR_CSS_URI' ) )
		define( 'BASKETBALL_DIR_CSS_URI', BASKETBALL_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'BASKETBALL_DIR_JS_URI' ) )
		define( 'BASKETBALL_DIR_JS_URI', BASKETBALL_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('BASKETBALL_DIR_ICON_IMG_URI') )
		define( 'BASKETBALL_DIR_ICON_IMG_URI', BASKETBALL_DIR_URI.'img/core-img/' );
	
	//DIR inc
	if( !defined( 'BASKETBALL_DIR_INC' ) )
		define( 'BASKETBALL_DIR_INC', BASKETBALL_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'BASKETBALL_DIR_ELEMENTOR' ) )
		define( 'BASKETBALL_DIR_ELEMENTOR', BASKETBALL_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'BASKETBALL_DIR_PATH' ) )
		define( 'BASKETBALL_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'BASKETBALL_DIR_PATH_INC' ) )
		define( 'BASKETBALL_DIR_PATH_INC', BASKETBALL_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'BASKETBALL_DIR_PATH_LIB' ) )
		define( 'BASKETBALL_DIR_PATH_LIB', BASKETBALL_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'BASKETBALL_DIR_PATH_CLASSES' ) )
		define( 'BASKETBALL_DIR_PATH_CLASSES', BASKETBALL_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'BASKETBALL_DIR_PATH_WIDGET' ) )
		define( 'BASKETBALL_DIR_PATH_WIDGET', BASKETBALL_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'BASKETBALL_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'BASKETBALL_DIR_PATH_ELEMENTOR_WIDGETS', BASKETBALL_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( BASKETBALL_DIR_PATH_INC . 'basketball-breadcrumbs.php' );
	// Sidebar register file include
	require_once( BASKETBALL_DIR_PATH_INC . 'widgets/basketball-widgets-reg.php' );
	// Post widget file include
	require_once( BASKETBALL_DIR_PATH_INC . 'widgets/basketball-recent-post-thumb.php' );
	// News letter widget file include
	require_once( BASKETBALL_DIR_PATH_INC . 'widgets/basketball-newsletter-widget.php' );
	//Social Links
	require_once( BASKETBALL_DIR_PATH_INC . 'widgets/basketball-social-links.php' );
	// Instagram Widget
	require_once( BASKETBALL_DIR_PATH_INC . 'widgets/basketball-instagram.php' );
	// Nav walker file include
	require_once( BASKETBALL_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( BASKETBALL_DIR_PATH_INC . 'basketball-functions.php' );

	// Theme Demo file include
	require_once( BASKETBALL_DIR_PATH_INC . 'demo/demo-import.php' );

	// Inline css file include
	require_once( BASKETBALL_DIR_PATH_INC . 'basketball-commoncss.php' );
	// Post Like
	// require_once( BASKETBALL_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( BASKETBALL_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( BASKETBALL_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( BASKETBALL_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( BASKETBALL_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( BASKETBALL_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( BASKETBALL_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( BASKETBALL_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( BASKETBALL_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class basketball dashboard
	require_once( BASKETBALL_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );
	// Class basketball dashboard
	require_once( BASKETBALL_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );

	if( class_exists( 'RW_Meta_Box' ) ){
		// Metabox Function
		require_once( BASKETBALL_DIR_PATH_INC . 'basketball-metabox.php' );
	}
	

	// Admin Enqueue Script
	function basketball_admin_script(){
		wp_enqueue_style( 'basketball-admin', get_template_directory_uri().'/assets/css/basketball_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'basketball_admin', get_template_directory_uri().'/assets/js/basketball_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'basketball_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	/**
	 * Instantiate BASKETBALL object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, BASKETBALL Dashboard .
	 *
	 */
	
	$BASKETBALL = new BASKETBALL();

	