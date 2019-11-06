<?php
function basketball_additional_metabox( $meta_boxes ) {

	// Event post type metaboxs
	$meta_boxes[] = array(
		'id'        => 'event_single_metaboxs',
		'title'     => esc_html__( 'Event Single Metabox', 'basketball' ),
		'post_types'=> array( 'event' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => 'event_location',
				'type'  => 'text',
				'name'  => esc_html__( 'Event Location', 'basketball' ),
				'placeholder' => esc_html__( 'Event Location', 'basketball' ),
			),
			array(
				'id'    => 'project_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project Date', 'basketball' ),
				'js_options' => array(
					'dateFormat'      => 'dd <span>M</span>   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'         => 'project_start_time',
				'name'       => esc_html__( 'Project Start Time', 'basketball' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
			array(
				'id'         => 'project_end_time',
				'name'       => esc_html__( 'Project End Time', 'basketball' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
		),
	);


	// Tutorial post type metaboxs
	$meta_boxes[] = array(
		'id'        => 'tutorial_single_metaboxs',
		'title'     => esc_html__( 'Tutorial Metabox', 'basketball' ),
		'post_types'=> array( 'tutorial' ),
		// 'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => 'video_url',
				'type'  => 'oembed',
				'name'  => esc_html__( 'Video URL', 'basketball' ),
				'placeholder' => esc_html__( 'Video URL: Ex- https://www.youtube.com/watch?v=jX38T-ZmATI', 'basketball' ),
				'not_available_string'	=> '<h1 class="text-center">Sorry! No video found! Please try again.</h1>'
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'basketball_additional_metabox' );