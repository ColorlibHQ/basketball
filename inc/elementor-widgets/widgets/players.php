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
class BASKETBALL_Player extends Widget_Base {

	public function get_name() {
		return 'basketball-player';
	}

	public function get_title() {
		return __( 'Player', 'basketball' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'basketball-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Player Info content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Player Info', 'basketball' ),
			]
		);

		$this->add_control(
            'player_slider', [
                'label' => __( 'Create New Player', 'basketball' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Player Name', 'basketball' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Jequline Dodge', 'basketball' )
                    ],
                    [
                        'name'  => 'player_details',
                        'label' => __( 'Player Details', 'basketball' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Together won\'t fowl you fish living in signs open which seed Face it above male in him his subdue spirit deep given. Won\'t forth don\'t cattle was were second fruitful. Together won\'t fowl Together won\'t fowl you fish living in signs open which seed Face it above male in him his subdue spirit deep given. Won\'t forth don\'t cattle was were second fruitful.', 'basketball')
                    ],
                    [
                        'name'  => 'player_img',
                        'label' => __( 'Player Image', 'basketball' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'club_name',
                        'label' => __( 'Club Name', 'basketball' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Swords Club', 'basketball' )
                    ],
                    [
                        'name'  => 'club_img',
                        'label' => __( 'Club Image', 'basketball' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
	$this->load_widget_script();
    $players = !empty( $settings['player_slider'] ) ? $settings['player_slider'] : '';
    ?>
    <!-- player info part start-->
    <section class="player_info section_padding">
        <div class="container">
            <div class="row">
                <div class="player_info_item owl owl-carousel">
                    <?php
	                if( is_array( $players ) && count( $players ) > 0 ){
	                    foreach ($players as $player ) {
                            $player_name    = !empty( $player['label'] ) ? $player['label'] : '';
                            $player_details = !empty( $player['player_details'] ) ? $player['player_details'] : '';
                            $player_img     = !empty( $player['player_img']['id'] ) ? wp_get_attachment_image( $player['player_img']['id'], 'basketball_588x406' ) : '';
                            $club_name      = !empty( $player['club_name'] ) ? $player['club_name'] : '';
                            $club_img     = !empty( $player['club_img']['id'] ) ? wp_get_attachment_image( $player['club_img']['id'], 'basketball_50x50' ) : '';
                            
                    ?>
                    <div class="player_info_iner">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-xl-5">
                                <div class="player_info_img">
                                    <?php
                                    if( $player_img ){
                                        echo wp_kses_post( $player_img );
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6 offset-xl-1 col-xl-5">
                                <div class="player_info_text">
                                    <?php
                                    // Player Name ----------------------
                                    if( $player_name ){
                                        echo '<h3>'. esc_html( $player_name ) .' </h3>';
                                    }

                                    // Player Details ---------------
                                    if( $player_details ){
                                        echo '<p>'. esc_html( $player_details ) .'</p>';
                                    }

                                    // club details ---------------
                                    if( $club_name ){
                                        echo '<a href="#" class="">'.esc_html($club_name).'</a> '. wp_kses_post( $club_img );
                                    }
                                    ?>
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
        </div>
    </section>
    <!-- about part start-->

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            var review = $('.player_info_item');
            if (review.length) {
                review.owlCarousel({
                items: 1,
                loop: true,
                dots: false,
                autoplay: true,
                margin: 40,
                autoplayHoverPause: true,
                autoplayTimeout:5000,
                nav: false,
                responsive:{
                    0:{
                    margin: 15
                    },
                    600:{
                    margin: 10
                    },
                    1000:{
                    margin: 10
                    }
                }
                });
            }
            
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
