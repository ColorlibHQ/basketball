<?php 
/**
 * @Packge 	   : BASKETBALL
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	// Final Class
	final class BASKETBALL{

		
		// Theme Version
		private $basketball_version = '1.0';

		// Minimum WordPress Version required
		private $min_wp = '4.0';

		// Minimum PHP version required 
		private $min_php = '5.6.25';

		function __construct(){
			// Theme Support
			add_action( 'after_setup_theme', array( $this, 'support' ) );
			// 
			$this->init();
		}

		// Theme init
		public function init(){
			//
			$this->setup();

			// customizer init Instantiate
			$this->customizer_init();
			
		}

		// Theme setup
		private function setup(){
			
			// Create enqueue class instance
			$enqueu = new basketball_Enqueue();
			$enqueu->scripts = $this->enqueue() ;
			$enqueu->basketball_scripts_enqueue_init() ;

		}
		// Theme Support
		public function support(){
			// content width
	        $GLOBALS['content_width'] = apply_filters( 'basketball_content_width', 751 );

	        
	        // text domain for translation.
	        load_theme_textdomain( 'basketball', BASKETBALL_DIR_PATH . '/languages' );
	        
	        // support title tage
	        add_theme_support( 'title-tag' );
	        
	        // support logo
			add_theme_support( 'custom-logo', array(
				'height'      => 50,
				'width'       => 160,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			) );

			//Custom Hreader
			add_theme_support( 'custom-header', array(
				'flex-width'    => true,
				'width'         => 1920,
				'flex-height'   => true,
				'height'        => 450,
				'default-image' => get_template_directory_uri() . '/assets/img/breadcrumb.png'
			) );

			//Custom Background
			add_theme_support( 'custom-background', array(
				'default-color' => 'ffffff'
			) );

	        //  support post format
	        add_theme_support( 'post-formats', array( 'video','audio' ) );
	        
	        // support post-thumbnails
	        add_theme_support( 'post-thumbnails', array( 'post', 'page', 'event', 'tutorial' ) );
			
			// Latest post thumbnail Widget thumbnail size
			add_image_size( 'basketball_widget_post_thumb', 80, 80, true );

			// Home blog image size
			add_image_size( 'basketball_latest_blog_370x350', 370, 350, true );

			// Latest blog image size
			add_image_size( 'basketball_blog_750x375', 750, 375, true );

			// Event image size
			add_image_size( 'basketball_event_570x400', 570, 400, true );

			// About section image size
			add_image_size( 'basketball_about_588x406', 588, 406, true );

			// Single Player image size
			add_image_size( 'basketball_270x297', 270, 297, true );
	        	        
	        // support automatic feed links
	        add_theme_support( 'automatic-feed-links' );
	        
	        // support html5
	        add_theme_support( 'html5' );
			
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
						    
	        // register nav menu
	        register_nav_menus( array(
				'primary-menu'   => esc_html__( 'Primary Menu', 'basketball' ),
				'social-menu'    => esc_html__( 'Social Menu', 'basketball' ),
	            'top-products'   => esc_html__( 'Top Products', 'basketball' ),
	            'quick-links'    => esc_html__( 'Quick Links', 'basketball' ),
	            'features'    	 => esc_html__( 'Features', 'basketball' ),
	            'resources'    	 => esc_html__( 'Resources', 'basketball' ),
	        ) );

	        // editor style
	        add_editor_style('assets/css/editor-style.css');

		} // end support method

		// enqueue theme style and script
		private function enqueue(){

			$cssPath = BASKETBALL_DIR_CSS_URI;
			$jsPath  = BASKETBALL_DIR_JS_URI;
			

			$scripts = array(
				'style' => array(
					array(
						'handler'		=> 'basketball-theme-google-font',
						'file' 			=> $this->google_font(),
					),
					array(
						'handler'		=> 'basketball-theme-bootstrap',
						'file' 			=> $cssPath.'bootstrap.min.css',
						'dependency' 	=> array(),
						'version' 		=> '5.3.8-5',
					),
					array(
						'handler'		=> 'basketball-theme-font-awesome',
						'file' 			=> $cssPath.'font-awesome.min.css',
						'dependency' 	=> array(),
						'version' 		=> '7.3.1-1',
					),
					array(
						'handler'		=> 'basketball-theme-animate',
						'file' 			=> $cssPath.'animate.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'basketball-theme-owl-carousel',
						'file' 			=> $cssPath.'owl.carousel.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'basketball-theme-themify-icons',
						'file' 			=> $cssPath.'themify-icons.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'basketball-theme-flaticon',
						'file' 			=> $cssPath.'flaticon.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0-s3',
					),
					array(
						'handler'		=> 'basketball-theme-magnific-popup',
						'file' 			=> $cssPath.'magnific-popup.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'basketball-theme-swiper.min',
						'file' 			=> $cssPath.'swiper.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'basketball-theme-default-css',
						'file' 			=> $cssPath.'default.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'basketball-theme-main-style',
						'file' 			=> $cssPath.'style.css',
						'dependency' 	=> array(),
						'version' 		=> $this->basketball_version . '-s3',
					),
					array(
						'handler'		=> 'basketball-theme-basketball-style',
						'file' 			=> get_stylesheet_uri(),
					),
				),
				
				'scripts' => array(
					array(
						'handler'		=> 'basketball-theme-bootstrap',
						'file' 			=> $jsPath.'bootstrap.min.js',
						'dependency' 	=> array(),
						'version' 		=> '5.3.8-4',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'basketball-theme-aos',
						'file' 			=> $jsPath.'aos.js',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'basketball-theme-swiper-min',
						'file' 			=> $jsPath.'swiper.min.js',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'basketball-ui-js',
						'file' 			=> $jsPath . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'colorlib-ui.js' : 'colorlib-ui.min.js' ),
						'dependency' 	=> array(),
						'version' 		=> '3.0.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'basketball-theme-basketball-custom',
						'file' 			=> $jsPath.'custom.js',
						'dependency' 	=> array( 'masonry', 'basketball-ui-js' ),
						'version' 		=> $this->basketball_version . '-s2',
						'in_footer' 	=> true
					),

				)
			);

			return $scripts;

		} // end enqueu method 



		// Google Font  
		private function google_font(){
			$font_url = '';

			/*
			 * The families this theme uses are bundled under
			 * assets/fonts/google, so nothing is fetched from Google and
			 * no request leaves the visitor's browser for a third party.
			 *
			 * Translators can still turn the fonts off for scripts these
			 * families do not cover.
			 */
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'basketball' ) ) {
				$font_url = get_template_directory_uri() . '/assets/css/google-fonts.css';
			}

			return esc_url_raw( $font_url );
		} //End google_font method

		private function customizer_init(){

		
			

			
			// Instantiate basketball theme customizer
			$basketball_theme_customizer = new basketball_theme_customizer();
		}
	} // End BASKETBALL Class

?>