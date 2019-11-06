<?php
namespace BASKETBALLelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * elementor tutorial section widget.
 *
 * @since 1.0
 */
class BASKETBALL_Tutorial extends Widget_Base {

    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);

        // basketball swiper-custom js
        wp_register_script( 'swiper-custom-basb', BASKETBALL_DIR_ELEMENTOR . 'assets/js/swiper_custom.js', array('jquery'), '1.0', true );
     }
  
    public function get_script_depends() {
       return [ 'swiper-custom-basb' ];
    }

	public function get_name() {
		return 'basketball-tutorial';
	}

	public function get_title() {
		return __( 'Tutorial', 'basketball' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'basketball-elements' ];
	}

	protected function _register_controls() {

        $this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Heading', 'basketball' ),
			]
		);
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Title', 'basketball' ),
                'description'   => __( "Use < span> tag for color italic word", "basketball" ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'free tutorial', 'basketball' )
            ]
        );
        $this->add_control(
            'sec_subtitle', [
                'label'         => esc_html__( 'Sub Title', 'basketball' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Learn About Basketball', 'basketball' )
                                
            ]
        );
		$this->end_controls_section(); 


        // ----------------------------------------  Tutorial Content ------------------------------
        $this->start_controls_section(
            'menu_tab_sec',
            [
                'label' => __( 'Tutorial', 'basketball' ),
            ]
        );
		$this->add_control(
			'tutorial_number', [
				'label'         => esc_html__( 'Tutorial Number', 'basketball' ),
				'type'          => Controls_Manager::NUMBER,
				'max'           => 15,
				'min'           => 1,
				'step'          => 1,
				'default'       => 5

			]
		);

        $this->end_controls_section(); // End Tutorial content

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
                'selector' => '{{WRAPPER}} .learn_about',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    $this->load_widget_script();
    $tNumber = $settings['tutorial_number'];

    $secTitle = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    ?>
    <!-- learn_about part start-->
    <section class="learn_about section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <?php
                        // Section Title =========
                        if( $secTitle ){
                            echo '<h4>'. wp_kses_post( $secTitle ) .'</h4>';
                        }
                        // Section Sub Title=====
                        if( $subTitle ){
                            echo '<h2>'. esc_html( $subTitle ) .'</h2>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php basketball_tutorial_section( $tNumber );?>
            </div>
        </div>
    </section>
    <!-- learn_about part end-->

    <?php

    }

    

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){


            var galleryTop = new Swiper('.gallery-top', {
                spaceBetween: 0,
                
                navigation: {
                nextEl: '.navigationHide',
                prevEl: '.navigationHide',
                },
                autoplay: true,
                loop: true,
                loopedSlides: 4,
                speed: 1000,
                autoplayDisableOnInteraction:true,
                
            });
            var galleryThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween: 0,
                centeredSlides: true,
                slidesPerView: 4,
                touchRatio: 0.2,
                slideToClickedSlide: true,
                loop: true,
                loopedSlides: 4
            });
            galleryTop.controller.control = galleryThumbs;
            galleryThumbs.controller.control = galleryTop;
            

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
