<?php
namespace BASKETBALLelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * BASKETBALL elementor few words section widget.
 *
 * @since 1.0
 */

class BASKETBALL_Blog extends Widget_Base {

	public function get_name() {
		return 'basketball-blog';
	}

	public function get_title() {
		return __( 'Blog', 'basketball' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'basketball-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Latest News & Update', 'basketball' ),
            ]
        );
		$this->add_control(
			'title',
			[
				'label'         => esc_html__( 'Title', 'basketball' ),
				'description'   => __( "Use < span> tag for color and italic word", "basketball" ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => __( 'From The Blog', 'basketball' )
			]
		);
		$this->add_control(
			'sec_title', [
				'label'         => esc_html__( 'Big Title', 'basketball' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => esc_html__( 'Latest News &amp; Update', 'basketball' )

			]
		);
        $this->add_control(
            'blog_limit',
            [
                'label'     => esc_html__( 'Post Limit', 'basketball' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 10,
                'step'      => 1,
                'default'   => 4
            ]
        );

        $this->end_controls_section(); // End few words content

	}

	protected function render() {

    $settings  = $this->get_settings();
    $post_num  = !empty( $settings['blog_limit'] ) ? $settings['blog_limit'] : '3';
    $title = !empty( $settings['title'] ) ? $settings['title'] : '';
    $bigTitle = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    ?>

    <!-- blog_part part start-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <?php
                            if( $title ){
                                echo '<h4>' .wp_kses_post( $title ) . '</h4>';
                            }
                            if( $bigTitle ){
                                echo '<h2>'. esc_html( $bigTitle ) .'</h2>';
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                if( function_exists( 'basketball_latest_blog' ) ) {
	                basketball_latest_blog( $post_num );
                }
                ?>
            </div>
        </div>
    </section>
    <?php
	}
}
