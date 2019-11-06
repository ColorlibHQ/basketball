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
 * BASKETBALL elementor section widget.
 *
 * @since 1.0
 */
class BASKETBALL_Single_Player extends Widget_Base {

	public function get_name() {
		return 'basketball-single-player';
	}

	public function get_title() {
		return __( 'Single Player', 'basketball' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'basketball-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Player Info', 'basketball' ),
			]
		);

		$this->add_control(
            'all_players', [
                'label' => __( 'Create New Player', 'basketball' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Player Name', 'basketball' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Adult Malerd', 'basketball' )
                    ],
                    [
                        'name'  => 'player_role',
                        'label' => __( 'Player Role', 'basketball' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Right Defender', 'basketball' )
                    ],
                    [
                        'name'  => 'player_img',
                        'label' => __( 'Player Image', 'basketball' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'player_number',
                        'label' => __( 'Player Number', 'basketball' ),
                        'type'  => Controls_Manager::NUMBER,
                        'label_block' => true,
                        'default' => esc_html__( '15', 'basketball' )
                    ],
                    [
                        'name'  => 'fb_url',
                        'label' => __( 'Facebook URL', 'basketball' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( '#', 'basketball' )
                    ],
                    [
                        'name'  => 'tw_url',
                        'label' => __( 'Twitter URL', 'basketball' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( '#', 'basketball' )
                    ],
                    [
                        'name'  => 'in_url',
                        'label' => __( 'Instagram URL', 'basketball' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( '#', 'basketball' )
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
		//------------------------------ Style Section ------------------------------
		$this->start_controls_section(
			'style_section', [
				'label' => __( 'Style Section Heading', 'basketball' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_secttitle', [
				'label'     => __( 'Section Title Color', 'basketball' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#202e31',
				'selectors' => [
					'{{WRAPPER}} .area-heading h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_sectsubtitle', [
				'label'     => __( 'Section Sub Title Color', 'basketball' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#888888',
				'selectors' => [
					'{{WRAPPER}} .area-heading p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'style_item',
			[
				'label' => __( 'Style Item', 'basketball' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'more_options',
            [
                'label' => __( 'Description Color', 'basketball' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'testimonial_name_color', [
                'label'     => __( 'Testimonial Name Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#1a1d24',
                'selectors' => [
                    '{{WRAPPER}} .testimonial__content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_desc_color', [
                'label'     => __( 'Testimonial Description Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .testimonial__i' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();



        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'basketball' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'basketball' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'basketball' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .testimonial_sec',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
	$this->load_widget_script();
    $players = !empty( $settings['all_players'] ) ? $settings['all_players'] : '';
    ?>
    <!-- player info part start-->
    <section class="team_member section_padding padding_less_40">
        <div class="container">
            <div class="row">
                <?php
                if( is_array( $players ) && count( $players ) > 0 ){
                    foreach ($players as $player ) {
                        $player_name    = !empty( $player['label'] ) ? $player['label'] : '';
                        $player_role = !empty( $player['player_role'] ) ? $player['player_role'] : '';
                        $player_img     = !empty( $player['player_img']['id'] ) ? wp_get_attachment_image( $player['player_img']['id'], 'basketball_270x297', '', array('class' => 'card-img-top') ) : '';
                        $player_number      = !empty( $player['player_number'] ) ? $player['player_number'] : '';
                        $fb_url      = !empty( $player['fb_url'] ) ? $player['fb_url'] : '';
                        $tw_url      = !empty( $player['tw_url'] ) ? $player['tw_url'] : '';
                        $in_url      = !empty( $player['in_url'] ) ? $player['in_url'] : '';
                        
                ?>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_team_member single-home-blog">
                        <div class="card">
                            <!-- <img src="img/team/team_1.png" class="card-img-top" alt="blog"> -->
                            <?php
                                if( $player_img ){
                                    echo wp_kses_post( $player_img );
                                }
                            ?>
                            <div class="card-body">
                                <div class="tean_content">
                                    <?php
                                        if( $player_number ){
                                            echo '<a href="javascript:void(0)" class="blog_item_date"><h3>'. esc_html( $player_number ) .' </h3></a>';
                                        }
                                    ?>
                                    <?php
                                        if( $player_name ){
                                            echo '<h5 class="card-title">'. esc_html( $player_name ) .' </h5>';
                                        }
                                    ?>
                                    <?php
                                        if( $player_role ){
                                            echo '<p>'. esc_html( $player_role ) .' </p>';
                                        }
                                    ?>
                                </div>
                                <div class="tean_right_content">
                                    <div class="header_social_icon">
                                        <ul>
                                            <?php
                                                if( $fb_url ){
                                                    echo '<li><a href="'. esc_attr( $fb_url ) .'"><i class="ti-facebook"></i></a></li>';
                                                }
                                            ?>
                                            <?php
                                                if( $tw_url ){
                                                    echo '<li><a href="'. esc_attr( $tw_url ) .'"><i class="ti-twitter"></i></a></li>';
                                                }
                                            ?>
                                            <?php
                                                if( $in_url ){
                                                    echo '<li><a href="'. esc_attr( $in_url ) .'"><i class="ti-instagram"></i></a></li>';
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- player info part end-->

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            // $('.testimonial').owlCarousel({
            //     items: 1,
            //     loop: true,
            //     margin: 30,
            //     autoplayHoverPause: true,
            //     smartSpeed:500,
            //     dots: true
            // });
            
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
