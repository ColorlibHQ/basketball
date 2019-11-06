<?php 
/**
 * @Packge     : BASKETBALL
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/
// Header top background color
Epsilon_Customizer::add_field(
    'basketball_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_general_section',
        'default'     => '#ff8b23',
    )
);

// Button hover color
Epsilon_Customizer::add_field(
    'basketball_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Hover Color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_general_section',
        'default'     => '#ff8b23',
    )
);

// Button border color
Epsilon_Customizer::add_field(
    'basketball_button_border_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Button border Color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_general_section',
        'default'     => '#fdcb9e',
    )
);

/***********************************
 * Header Section Fields =====================================
 ***********************************/
//Header Top
Epsilon_Customizer::add_field(
    'header_top_sec',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Top', 'basketball' ),
        'section'     => 'basketball_header_section',
        
    )
);
// Header top phone number
Epsilon_Customizer::add_field(
    'basketball_top_phone',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Phone Number', 'basketball' ),
        'description' => esc_html__( 'Empty field would be display none', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_header_section',
        'default'     => esc_html__( '+0123 456 789', 'basketball' ),
    )
);
// Header top register label
Epsilon_Customizer::add_field(
    'basketball_top_register_label',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Register Label', 'basketball' ),
        'description' => esc_html__( 'Empty field would be display none', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_header_section',
        'default'     => esc_html__( 'Register', 'basketball' ),
    )
);
// Header top register url
Epsilon_Customizer::add_field(
    'basketball_top_register_url',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Register URL', 'basketball' ),
        'description' => esc_html__( 'Empty field would be display none', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_header_section',
        'default'     => esc_html__( '#', 'basketball' ),
    )
);


Epsilon_Customizer::add_field(
    'social_pro_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Social Profile', 'basketball' ),
        'section'     => 'basketball_social_section',

    )
);

// Social Profile Show/Hide
Epsilon_Customizer::add_field(
    'basketball_social_profile_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Social Profile Show/Hide', 'basketball' ),
        'section'     => 'basketball_social_section',
        'default'     => true,
    )
);

//Social Profile links
Epsilon_Customizer::add_field(
	'basketball_footer_social',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'basketball_social_section',
		'label'        => esc_html__( 'Social Profile Links', 'basketball' ),
		'button_label' => esc_html__( 'Add new social link', 'basketball' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_link_title',
		),
		'fields'       => array(
			'social_link_title'       => array(
				'label'             => esc_html__( 'Title', 'basketball' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Twitter',
			),
			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'basketball' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'https://twitter.com',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'basketball' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-twitter',
			),
			
		),
	)
);

// Header top background color
Epsilon_Customizer::add_field(
    'basketball_top_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Top Background Color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_header_section',
        'default'     => '#ffffff',
    )
);
// Header top background color
Epsilon_Customizer::add_field(
    'basketball_top_header_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Top Text Color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_header_section',
        'default'     => '#888888',
    )
);

// Header navbar============================================
Epsilon_Customizer::add_field(
    'header_sec',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Navbar', 'basketball' ),
        'section'     => 'basketball_header_section',
        
    )
);

// Navbar background color field
Epsilon_Customizer::add_field(
    'basketball_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Navbar Background Color', 'basketball' ),
        'description' => esc_html__( 'Select the navbar background color.', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_header_section',
        'default'     => '#fff',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'basketball_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_header_section'
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'basketball_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_header_section',
        'default'     => '#ff8b23',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'basketball_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_header_section',
        'default'     => '#2a2a2a',
    )
);

// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'basketball_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_header_section',
        'default'     => '#ff8b23',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'basketball_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'basketball' ),
        'description' => esc_html__( 'Set post excerpt length.', 'basketball' ),
        'section'     => 'basketball_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);



// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'basketball_blog_layout',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'basketball' ),
        'section'  => 'basketball_blog_section',
        'description' => esc_html__( 'Select the option to set blog page layout.', 'basketball' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 2,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'basketball_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'basketball' ),
        'section'     => 'basketball_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'basketball_blog_single_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog single post meta show/hide', 'basketball' ),
        'section'     => 'basketball_blog_section',
        'default'     => true
    )
);

/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'basketball_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'basketball' ),
        'section'           => 'basketball_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'basketball_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'basketball' ),
        'section'           => 'basketball_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'basketball_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'basketball_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'basketball_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'basketball_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'basketball' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'basketball' ),
        'section'     => 'basketball_footer_section',
        'default'     => false,
    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'basketball' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'basketball_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'basketball' ),
        'section'     => 'basketball_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

// Footer widget background color field
Epsilon_Customizer::add_field(
    'basketball_footer_widget_bdcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_footer_section',
        'default'     => '#fff7ef',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'basketball_footer_widget_textcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_footer_section',
        'default'     => '#8a8a8a',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'basketball_footer_widget_titlecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_footer_section',
        'default'     => '#2a2a2a',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'basketball_footer_widget_anchorcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_footer_section',
        'default'     => '#8a8a8a',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'basketball_footer_widget_anchorhovcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'basketball' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'basketball_footer_section',
        'default'     => '#ff8b23',
    )
);



