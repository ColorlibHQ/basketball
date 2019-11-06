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
 * BASKETBALL elementor Team Member section widget.
 *
 * @since 1.0
 */
class BASKETBALL_Instagram extends Widget_Base {

	public function get_name() {
		return 'basketball-instagram';
	}

	public function get_title() {
		return __( 'Instagram', 'basketball' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'basketball-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();
        
		// ----------------------------------------   instagram content ------------------------------
		$this->start_controls_section(
			'instagram_block',
			[
				'label' => __( 'Instagram Settings', 'basketball' ),
			]
		);
		$this->add_control(
            'section_title',
            [
                'label'         => esc_html__( 'Section Title', 'basketball' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__('Social Media', 'basketball')
            ]
        );
		$this->add_control(
            'section_title_big',
            [
                'label'         => esc_html__( 'Section Title Big', 'basketball' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__('Follow Us Instagram', 'basketball')
            ]
        );

		$this->end_controls_section(); // End instagram content

	}

	protected function render() {


    if( !in_array('instagram-feed/instagram-feed.php', apply_filters('active_plugins', get_option('active_plugins'))) ){ 
        echo '<h1 class="text-center section_padding">' . esc_html__('Please install the plugin "Smash Balloon Social Photo Feed" from Dashboard Panel that is required.', 'basketball') . '</h1>';
    } else {

    $settings = $this->get_settings();
    $section_title = !empty( $settings['section_title'] ) ? $settings['section_title'] : '';
    $section_title_big = !empty( $settings['section_title_big'] ) ? $settings['section_title_big'] : '';
    ?>
    <!-- social_connect_part part start-->
    <section class="social_connect_part">
        <div class="container-fluid">
            <div class="row justify-content-center ">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <h4><?php echo $section_title;?></h4>
                        <h2> <?php echo $section_title_big;?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="social_connect">
                        <?php echo do_shortcode('[instagram-feed]');?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- social_connect_part part end-->
    <?php
    }
    }
}
