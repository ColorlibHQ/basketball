<?php
namespace BASKETBALLelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
//use Elementor\Scheme_Color;
//use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
//use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * BASKETBALL elementor about us section widget.
 *
 * @since 1.0
 */
class BASKETBALL_Banner extends Widget_Base {

	public function get_name() {
		return 'basketball-banner';
	}

	public function get_title() {
		return __( 'Banner', 'basketball' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'basketball-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Content', 'basketball' ),
            ]
        );
        $this->add_control(
            'banner_content',
            [
                'label'         => esc_html__( 'Banner Content', 'basketball' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h1><span>Defend &amp;</span><br> Dominate</h1> <p>They are to sea i waters female from lights. Deep had divided to which had. For it saw firmament face whales.</p>', 'basketball' )
            ]
        );

        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'basketball' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'learn more', 'basketball' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'basketball' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->end_controls_section(); // End content


        //------------------------------ Style button ------------------------------
        $this->start_controls_section(
            'style_btn', [
                'label' => __( 'Style Button', 'basketball' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_btnlabel', [
                'label'     => __( 'Button Label Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner_text .btn_1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhoverlabel', [
                'label'     => __( 'Button Hover Label Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner_text .btn_1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label'       => __( 'Button Background Color', 'basketball' ),
                'type'        => Controls_Manager::COLOR,
                'default'     => '',
                'selectors'   => [
                    '{{WRAPPER}} .banner_text .btn_1' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbg', [
                'label'     => __( 'Button Hover Background Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .banner_text .btn_1:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'basketball' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'basketball' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $ban_content = !empty( $settings['banner_content'] ) ? $settings['banner_content'] : '';
        $btn_label = !empty( $settings['banner_btnlabel'] ) ? $settings['banner_btnlabel'] : '';
        $buttonUrl = !empty( $settings['banner_btnurl']['url'] ) ? $settings['banner_btnurl']['url'] : '';
        $socialLinks = !empty( $settings['social_links'] ) ? $settings['social_links'] : '';
        ?>
        <!-- banner part start-->
        <section class="banner_part">
            <div class="container">
                <div class="row align-content-center">
                    <div class="col-lg-7 col-xl-5">
                        <div class="banner_text">
                            <?php
                            if( $ban_content ){
                                echo wp_kses_post( wpautop( $ban_content ) );
                            }

                            if( $btn_label ){
                                echo '<a class="btn_1" href="'. esc_url( $buttonUrl ) .'">'. esc_html( $btn_label ) .' <span class="ti-angle-right"></span> </a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner part start-->
        <?php

    }
	
}
