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
 * elementor projects section widget.
 *
 * @since 1.0
 */
class BASKETBALL_Event extends Widget_Base {

	public function get_name() {
		return 'basketball-events';
	}

	public function get_title() {
		return __( 'Events', 'basketball' );
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
                'default'       => __( 'Upcoming Event', 'basketball' )
            ]
        );
        $this->add_control(
            'sec_subtitle', [
                'label'         => esc_html__( 'Sub Title', 'basketball' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Land Morning Blessed', 'basketball' )
                                
            ]
        );
		$this->end_controls_section(); 


        // ----------------------------------------  Projects Content ------------------------------
        $this->start_controls_section(
            'menu_tab_sec',
            [
                'label' => __( 'Events', 'basketball' ),
            ]
        );
		$this->add_control(
			'event_number', [
				'label'         => esc_html__( 'Event Number', 'basketball' ),
				'type'          => Controls_Manager::NUMBER,
				'max'           => 2,
				'min'           => 1,
				'step'          => 1,
				'default'       => 2

			]
		);

        $this->end_controls_section(); // End projects content


        // Button Style ==============================
        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Button', 'basketball' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );        
        $this->add_control(
            'btn_color', [
                'label'     => __( 'Button label Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .upcoming_event .btn_2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button Background Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .upcoming_event .btn_2' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_border_color', [
                'label'     => __( 'Button Border Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .upcoming_event .btn_2' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color', [
                'label'     => __( 'Button Hover label Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .upcoming_event .btn_2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg_color', [
                'label'     => __( 'Button Hover Background Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .upcoming_event .btn_2:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_border_hover_color', [
                'label'     => __( 'Button Hover Border Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .upcoming_event .btn_2:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    $this->load_widget_script();
    $pNumber = $settings['event_number'];

    $secTitle = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    ?>
    <!-- upcoming_event part start-->
    <section class="upcoming_event section_padding">
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
                <?php basketball_event_section( $pNumber );?>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){


                $('.portfolio-filter ul li').on('click', function () {
                    $('.portfolio-filter ul li').removeClass('active');
                    $(this).addClass('active');

                    var data = $(this).attr('data-filter');
                    $workGrid.isotope({
                        filter: data
                    });
                });

                if (document.getElementById('portfolio')) {
                    var $workGrid = $('.portfolio-grid').isotope({
                        itemSelector: '.all',
                        percentPosition: true,
                        masonry: {
                            columnWidth: '.grid-sizer'
                        }
                    });
                }
            

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
