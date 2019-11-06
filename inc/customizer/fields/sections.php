<?php 
/**
 * @Packge     : BASKETBALL
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'basketball_theme_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'basketball' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'basketball_general_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'basketball' ),
            'panel'    => 'basketball_theme_options_panel',
            'priority' => 1,
        ),
    ),

    /**
     * Header Section
     */
    array(
        'id'   => 'basketball_header_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'basketball' ),
            'panel'    => 'basketball_theme_options_panel',
            'priority' => 2,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'basketball_blog_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'basketball' ),
            'panel'    => 'basketball_theme_options_panel',
            'priority' => 3,
        ),
    ),

    /**
     * Social Section
     */
    array(
        'id'   => 'basketball_social_section',
        'args' => array(
            'title'    => esc_html__( 'Social', 'basketball' ),
            'panel'    => 'basketball_theme_options_panel',
            'priority' => 4,
        ),
    ),



    /**
     * 404 Page Section
     */
    array(
        'id'   => 'basketball_fof_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'basketball' ),
            'panel'    => 'basketball_theme_options_panel',
            'priority' => 6,
        ),
    ),

    /**
     * Footer Section
     */
    array(
        'id'   => 'basketball_footer_section',
        'args' => array(
            'title'    => esc_html__( 'Footer Page', 'basketball' ),
            'panel'    => 'basketball_theme_options_panel',
            'priority' => 7,
        ),
    ),



);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

?>