<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
} 
/**
 * @Packge     : BASKETBALL
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
// enqueue css
function basketball_common_custom_css(){
    
    wp_enqueue_style( 'basketball-common', get_template_directory_uri().'/assets/css/dynamic.css' );
		$header_bg         		  = esc_url( get_header_image() );
		$header_bg_img 			  = !empty( $header_bg ) ? 'background-image: url('.esc_url( $header_bg ).')' : '';

		$themeColor     		  = basketball_opt( 'basketball_theme_color', '#ff8b23' );
		$buttonBorderColor     	  = basketball_opt( 'basketball_button_border_color', '#fdcb9e' );
		$hoverColor     	  	  = basketball_opt( 'basketball_hover_color', '#ff8b23' );

		$headerTop_bg     		  = basketball_opt( 'basketball_top_header_bg_color' );
		$headerTop_col     		  = basketball_opt( 'basketball_top_header_color' );

		$headerBg          		  = basketball_opt( 'basketball_header_bg_color', '#fff' );
		$menuColor          	  = basketball_opt( 'basketball_header_menu_color' );
		$menuHoverColor           = basketball_opt( 'basketball_header_menu_hover_color' );
		$menuHoverColor           = $menuHoverColor . '!important';
		
		$dropMenuColor            = basketball_opt( 'basketball_header_drop_menu_color' );
		$dropMenuHovColor         = basketball_opt( 'basketball_header_drop_menu_hover_color' );
		$dropMenuHovColor         = $dropMenuHovColor . '!important';


		$footerwbgColor     	  = basketball_opt('basketball_footer_widget_bdcolor');
		$footerwTextColor   	  = basketball_opt('basketball_footer_widget_textcolor');
		$footerwanchorcolor 	  = basketball_opt('basketball_footer_widget_anchorcolor');
		$footerwanchorhovcolor    = basketball_opt('basketball_footer_widget_anchorhovcolor');
		$widgettitlecolor  		  = basketball_opt('basketball_footer_widget_titlecolor');


		$customcss ="
			.hero-banner{
				{$header_bg_img}
			}
			
			.btn_2
			{
				border-color: {$buttonBorderColor};
			}

			.sub_header .sub_header_social_icon a i, 
			.banner_part .banner_text h1 span, 
			.about_text h4,
			.section_tittle h4,
			.copyright_part a,
			.player_info .player_info_text a,
			.btn_1:hover,
			.single_team_member .header_social_icon ul li a i:hover,
			.blog_right_sidebar .widget_basketball_recent_widget .post_item .media-body h3:hover,
			.blog_details a:hover,
			.blog_details a h2:hover,
			.single-post-area .navigation-area a h4:hover
			{
				color: {$themeColor}
			}			

			.sub_header .sub_header_social_icon .register_icon:hover,
			.button, 
			.blog_item_date, 
			.btn_1,
			.btn_2,
			.gallery_part .single_gallery_item .single_gallery_item_iner .gallery_item_text h3:after,
			.blog_part .single-home-blog .card .dot:after,
			.footer-area .single-footer-widget .click-btn,
			.single_team_member .blog_item_date,
			.blog_item_img .blog_item_date,
			.blog_right_sidebar .single_sidebar_widget.widget_basketball_newsletter .btn,
			.single_sidebar_widget .tagcloud a:hover
			{
				background: {$themeColor}
			}

			.btn_2:hover,
			.copyright_part .footer-social a:hover
			{
				background: {$hoverColor};
			}

			.blog_part .single-home-blog .card h5:hover
			{
				color: {$hoverColor};
			}

			.copyright_part .footer-social a
			{
				border-color: {$themeColor}
			}



			.sub_header{
				background: {$headerTop_bg}
			}
			.sub_header .sub_header_social_icon a,
			.sub_header .sub_header_social_icon .register_icon
			{
				color: {$headerTop_col}
			}

			.header_area .main_menu
			{
				background: {$headerBg};
			}
			
			.header_area .main_menu nav .navbar-nav .nav-item .nav-link,
			.main_menu .header_social_icon ul li a
			{
			   color: {$menuColor};
			}
			.header_area .main_menu nav .navbar-nav .nav-item .nav-link:hover,
			.main_menu .header_social_icon ul li a:hover,
			.main_menu ul li :hover
			{
			   color: {$menuHoverColor};
			}
			
			.header_area .main_menu nav .navbar-nav .nav-item.submenu ul .nav-item .nav-link {
			   color: {$dropMenuColor};
			}
			
			.header_area .main_menu nav .navbar-nav .nav-item.submenu ul .nav-item .nav-link {
			   color: {$dropMenuColor};
			}
			
			.header_area .main_menu nav .navbar-nav .nav-item.submenu ul .nav-item .nav-link:hover{
				color: {$dropMenuHovColor}
			}

			.footer-area {
				background-color: {$footerwbgColor};
			}

			.footer-area .single-footer-widget p
			{
				color: {$footerwTextColor}
			}

			.footer-area .single-footer-widget h4
			{
				color: {$widgettitlecolor}
			}

			.footer-area .single-footer-widget ul li a
			{
			   color: {$footerwanchorcolor};
			}

			.footer-area .single-footer-widget ul li a:hover
			{
			   color: {$footerwanchorhovcolor};
			}

        ";
       
    wp_add_inline_style( 'basketball-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'basketball_common_custom_css', 50 );