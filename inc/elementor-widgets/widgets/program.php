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
class BASKETBALL_Program extends Widget_Base {

	public function get_name() {
		return 'basketball-program';
	}

	public function get_title() {
		return __( 'Program', 'basketball' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'basketball-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  Program content ------------------------------
		$this->start_controls_section(
			'program_content',
			[
				'label' => __( 'Program', 'basketball' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Section Title', 'basketball' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__('Recreational Program', 'basketball')
            ]
        );
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Content', 'basketball' ),
                'description'   => esc_html__('Use <br> tag for line break', 'basketball'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h2>Deep which above behold an woter set a herb dry days.</h2>
                <p>A created won\'t created subdue a every green his set which above firmament earth firmament. Seed firmament be likeness fruitful to called waters. Given great said seasons his midst beast.</p>
                <p>A created won\'t created subdue a every green his set which above firmament earth firmament. Seed firmament be likeness fruitful to called waters. </p>', 'basketball' )
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label'         => esc_html__( 'Button Label', 'basketball' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__('Read More', 'basketball')
            ]
        );
        $this->add_control(
            'button_url',
            [
                'label'         => esc_html__( 'Button URL', 'basketball' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                
            ]
        );
		$this->end_controls_section(); // End program content


		$this->start_controls_section(
			'program_feature_image',
			[
				'label' => __( 'Featured Images', 'basketball' ),
			]
		);
		$this->add_control(
			'program_img',
			[
				'label'         => esc_html__( 'Featured Image', 'basketball' ),
				'type'          => Controls_Manager::MEDIA,
			]
		);
		$this->end_controls_section(); // End program content


        // Feature Style ==============================
        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Featuer', 'basketball' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );        
        $this->add_control(
            'btn_color', [
                'label'     => __( 'Button label Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .recreational_part .btn_2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button Background Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .recreational_part .btn_2' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_border_color', [
                'label'     => __( 'Button Border Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .recreational_part .btn_2' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color', [
                'label'     => __( 'Button Hover label Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .recreational_part .btn_2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg_color', [
                'label'     => __( 'Button Hover Background Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .recreational_part .btn_2:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_border_hover_color', [
                'label'     => __( 'Button Hover Border Color', 'basketball' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .recreational_part .btn_2:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();


	}

	protected function render() {
        $settings = $this->get_settings();
        $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $content  = !empty( $settings['content'] ) ? $settings['content'] : '';
        $button_label = !empty( $settings['button_label'] ) ? $settings['button_label'] : '';
        $button_url   = !empty( $settings['button_url']['url'] ) ? $settings['button_url']['url'] : '';

		$feature_img = !empty( $settings['program_img']['id'] ) ? wp_get_attachment_image( $settings['program_img']['id'], 'basketball_about_588x406', false, array() ) : '';

        ?>
        <!-- about part start-->
        <section class="about_part recreational_part">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6 offset-xl-1 col-xl-4">
                        <div class="about_text">
                        <h4><?php echo wp_kses_post( $sec_title );?></h4>

                        <?php
                            //Content ==============
                            if( $content ){
                                echo wp_kses_post( wpautop( $content ) );
                            }
                            // Button =============
                            if( $button_label ){
                                echo '<a class="btn_2" href="'. esc_url( $button_url ) .'">'. esc_html( $button_label ) .'</a>';
                            }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="about_img">
                            <?php
                                if( $feature_img ){
                                    echo wp_kses_post( $feature_img );
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about part start-->
        <?php

    }

}
