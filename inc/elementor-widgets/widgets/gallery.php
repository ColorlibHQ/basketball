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
class BASKETBALL_Gallery extends Widget_Base {

	public function get_name() {
		return 'basketball-gallery';
	}

	public function get_title() {
		return __( 'Gallery', 'basketball' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'basketball-elements' ];
	}

	protected function _register_controls() {

        // Gallery Heading
		$this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Gallery Heading', 'basketball' ),
			]
		);
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Title', 'basketball' ),
                'description'   => __( "Use < span> tag for color and italic word", "basketball" ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Our Gallery', 'basketball' )
            ]
        );
        $this->add_control(
            'sec_subtitle', [
                'label'         => esc_html__( 'Sub Title', 'basketball' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Latest Player Showcase', 'basketball' )
                                
            ]
        );
		$this->end_controls_section(); 

		// ----------------------------------------  Gallery content ------------------------------
		$this->start_controls_section(
			'gallery_content',
			[
				'label' => __( 'Gallery Info', 'basketball' ),
			]
		);

		$this->add_control(
            'gallery_slider', [
                'label' => __( 'Create New Item', 'basketball' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'First Title', 'basketball' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Face is had place image', 'basketball' )
                    ],
                    [
                        'name'  => 'second_title',
                        'label' => __( 'Second Title', 'basketball' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Swords Club vs Uknights Club', 'basketball' )
                    ],
                    [
                        'name'  => 'dynamic_class',
                        'label' => __( 'Select Gallery Measurement', 'basketball' ),
                        'type'  => Controls_Manager::SELECT,
                        'label_block' => true,
                        'default' => esc_html__( 'grid-item--height1', 'basketball' ),
                        'options' => array(
                            'grid-item--height1'    => 'Height 1',
                            'grid-item--height2'    => 'Height 2',
                            'grid-item--width2 grid-item--height2'    => 'Width 2, Height 2',
                            'grid-item--height3'    => 'Height 3',
                        )
                    ],
                    [
                        'name'  => 'gallery_img',
                        'label' => __( 'Gallery Image', 'basketball' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();
    $title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    $galleries = !empty( $settings['gallery_slider'] ) ? $settings['gallery_slider'] : '';
    ?>
    <!-- gallery_part part start-->
    <section class="gallery_part">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <?php
                        if( $title ){
                            echo '<h4>'. wp_kses_post( $title ) .'</h4>';
                        }
                        if( $subTitle ){
                            echo '<h2>'. esc_html( $subTitle ) .'</h2>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="gallery_part_item">
                        <div class="grid">
                            <div class="grid-sizer"></div>
                            <?php
                            if( is_array( $galleries ) && count( $galleries ) > 0 ){
                                foreach ($galleries as $gallery ) {
                                    $first_title      = !empty( $gallery['label'] ) ? $gallery['label'] : '';
                                    $second_title     = !empty( $gallery['second_title'] ) ? $gallery['second_title'] : '';
                                    $gallery_img      = !empty( $gallery['gallery_img']['id'] ) ? wp_get_attachment_image_src( $gallery['gallery_img']['id'], 'full' ) : '';
                                    $dynamic_class = !empty( $gallery['dynamic_class'] ) ? $gallery['dynamic_class'] : '';
                                    
                            ?>
                            <a href="<?php echo wp_kses_post($gallery_img[0]);?>" class="grid-item <?php echo $dynamic_class;?> bg_img img-gal" style="background-image: url(<?php echo wp_kses_post($gallery_img[0]);?>)">
                                <div class="single_gallery_item">
                                    <div class="single_gallery_item_iner">
                                        <div class="gallery_item_text">

                                            <?php
                                            if( $first_title ){
                                                echo '<h3>'. esc_html( $first_title ) .'</h3>';
                                            }
                                            if( $second_title ){
                                                echo '<p>'. esc_html( $second_title ) .'</p>';
                                            }
                                            
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php 
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- gallery_part part end-->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.grid').masonry({
                itemSelector: '.grid-item',
                columnWidth: '.grid-sizer',
                percentPosition: true
            });

            if ($('.img-gal').length > 0) {
                    $('.img-gal').magnificPopup({
                        type: 'image',
                        gallery: {
                            enabled: true
                        }
                    });
            }
            
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
