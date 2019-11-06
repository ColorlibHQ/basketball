<?php 
/**
 * @Packge     : BASKETBALL
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }

/*=========================================================
	Image Crop Size
=========================================================*/

add_image_size( 'basketball_770x435', 770, 435, true );
add_image_size( 'basketball_588x406', 588, 406, true );
add_image_size( 'basketball_50x50', 50, 50, true );
add_image_size( 'basketball_60x60', 60, 60, true );


/*=========================================================
	Theme option callback
=========================================================*/
function basketball_opt( $id = null, $default = '' ) {
	
	$opt = get_theme_mod( $id, $default );
	
	$data = '';
	
	if( $opt ) {
		$data = $opt;
	}
	
	return $data;
}


/*=========================================================
	Custom meta id callback
=========================================================*/
function basketball_meta( $id = '' ){
    
    $value = get_post_meta( get_the_ID(), '_basketball_'.$id, true );
    
    return $value;
}


/*=========================================================
	Blog Date Permalink
=========================================================*/
function basketball_blog_date_permalink(){
	
	$year  = get_the_time('Y'); 
    $month_link = get_the_time('m');
    $day   = get_the_time('d');

    $link = get_day_link( $year, $month_link, $day);
    
    return $link; 
}



/*========================================================
	Blog Excerpt Length
========================================================*/
if ( ! function_exists( 'basketball_excerpt_length' ) ) {
	function basketball_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );
		
		// $limit null check
		if( !null == $limit ){
			$limit = $limit;
		}else{
			$limit = 30;
		}
        
        
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice ).' ...';
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		}
		
		$excerpt = '<p>'.preg_replace('`\[[^\]]*\]`','',$excerpt).'</p>';
		return $excerpt;

	}
}


/*==========================================================
	Comment number and Link
==========================================================*/
if ( ! function_exists( 'basketball_posted_comments' ) ) {
    function basketball_posted_comments(){
        
        $comments_num = get_comments_number();
        if( comments_open() ){
            if( $comments_num == 0 ){
                $comments = esc_html__('No Comments','basketball');
            } elseif ( $comments_num > 1 ){
                $comments= $comments_num . esc_html__(' Comments','basketball');
            } else {
                $comments = esc_html__( '1 Comment','basketball' );
            }
            $comments = $comments;
        } else {
            $comments = esc_html__( 'Comments are closed', 'basketball' );
        }
        
        return $comments;
    }
}


/*===================================================
	Post embedded media
===================================================*/
function basketball_embedded_media( $type = array() ){
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );
        
    if( in_array( 'audio' , $type) ){
    
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }
        
    }else{
        
        if( count( $embed ) > 0 ){

            $output = $embed[0];
        }else{
           $output = ''; 
        }
        
    }
    
    return $output;
}


/*===================================================
	WP post link pages
====================================================*/
function basketball_link_pages(){
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'basketball' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'basketball' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


/*====================================================
	Theme logo
====================================================*/
function basketball_theme_logo( $class = '' ) {

    $siteUrl = home_url('/');
    // site logo
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imageUrl = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	
	if( !empty( $imageUrl[0] ) ){
		$siteLogo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'"><img src="'.esc_url( $imageUrl[0] ).'" alt=""></a>';
	}else{
		$siteLogo = '<h2><a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2><span>'. esc_html( get_bloginfo('description') ) .'</span>';
	}
	
	return wp_kses_post( $siteLogo );
	
}


/*================================================
    Page Title Bar
================================================*/
function basketball_page_titlebar() {
	if ( ! is_page_template( 'template-builder.php' ) ) {
		?>
        <section class="hero-banner">
            <div class="container">
				<h2>
				<?php
				if ( is_category() ) {
					single_cat_title( __('Category: ', 'basketball') );

				} elseif ( is_tag() ) {
					single_tag_title( 'Tag Archive for &quot;' );

				} elseif ( is_archive() ) {
					echo get_the_archive_title();

				} elseif ( is_page() ) {
					echo get_the_title();

				} elseif ( is_search() ) {
					echo esc_html__( 'Search for: ', 'basketball' ) . get_search_query();

				} elseif ( ! ( is_404() ) && ( is_single() ) || ( is_page() ) ) {
					echo  get_the_title();

				} elseif ( is_home() ) {
					echo esc_html__( 'Blog', 'basketball' );

				} elseif ( is_404() ) {
					echo esc_html__( '404 error', 'basketball' );

				}
				?>
				</h2>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
					<?php
					if ( function_exists( 'basketball_breadcrumbs' ) ) {
						basketball_breadcrumbs();
					}
					?>
                </nav>
            </div>
        </section>
		<?php
	}
}



/*================================================
	Blog pull right class callback
=================================================*/
function basketball_pull_right( $id = '', $condation ){
    
    if( $id == $condation ){
        return ' '.'order-last';
    }else{
        return;
    }
    
}



/*======================================================
	Inline Background
======================================================*/
function basketball_inline_bg_img( $bgUrl ){
    $bg = '';

    if( $bgUrl ){
        $bg = 'style="background-image:url('.esc_url( $bgUrl ).')"'; 
    }

    return $bg;
}


/*======================================================
	Blog Category
======================================================*/
function basketball_featured_post_cat(){

	$categories = get_the_category(); 
	
	if( is_array( $categories ) && count( $categories ) > 0 ){
		$getCat = [];
		foreach ( $categories as $value ) {

			if( $value->slug != 'featured' ){
				$getCat[] = esc_html( $value->name );
			}   
		}

		return implode( ', ', $getCat );
	}
         
}


/*=======================================================
	Customize Sidebar Option Value Return
========================================================*/
function basketball_sidebar_opt(){

    $sidebarOpt = basketball_opt( 'basketball_blog_layout' );
    $sidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $sidebarOpt ) ){
        $sidebarOpt =  $sidebarOpt;
    }else{
        $sidebarOpt =  json_decode( $sidebarOpt, true );
    }
    
    
    if( !empty( $sidebarOpt['columnsCount'] ) ){
        $sidebar = $sidebarOpt['columnsCount'];
    }


    return $sidebar;
}


/**================================================
	Themify Icon
 =================================================*/
function basketball_themify_icon(){
    return[
        'ti-home'       => 'Home',
        'ti-tablet'     => 'Tablet',
        'ti-email'      => 'Email',
        'ti-twitter'    => 'twitter',
        'ti-skype'      => 'skype',
        'ti-instagram'  => 'instagram',
        'ti-dribbble'   => 'dribbble',
        'ti-vimeo'      => 'vimeo',
    ];
}


/*===========================================================
	Set contact form 7 default form template
============================================================*/
function basketball_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-12"><div class="form-group">[textarea* your-message id:message class:form-control class:w-100 rows:9 cols:30 placeholder "Message"]</div></div><div class="col-sm-6"><div class="form-group">[text* your-name id:name class:form-control placeholder "Enter your  name"]</div></div><div class="col-sm-6"><div class="form-group">[email* your-email id:email class:form-control placeholder "Enter your email"]</div></div><div class="col-12"><div class="form-group">[text your-subject id:subject class:form-control placeholder "Subject"]</div></div></div><div class="form-group mt-3">[submit class:button class:button-contactForm "Send Message"]</div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'basketball_contact7_form_content', 10, 2 );



/*============================================================
	Pagination
=============================================================*/
function basketball_blog_pagination(){
	echo '<nav class="blog-pagination justify-content-center d-flex">';
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( '<span class="ti-angle-left"></span>', 'basketball' ),
                'next_text' => __( '<span class="ti-angle-right"></span>', 'basketball' ),
                'screen_reader_text' => ' '
            )
        );
	echo '</nav>';
}


/*=============================================================
	Blog Single Post Navigation
=============================================================*/
if( ! function_exists('basketball_blog_single_post_navigation') ) {
	function basketball_blog_single_post_navigation() {

		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
			?>
			<div class="navigation-area">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
						<?php
						if( get_next_post_link() ){
							$nextPost = get_next_post();

							if( has_post_thumbnail() ){
								?>
								<div class="thumb">
									<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
										<?php echo get_the_post_thumbnail( absint( $nextPost->ID ), 'basketball_60x60', array( 'class' => 'img-fluid' ) ) ?>
									</a>
								</div>
								<?php
							} ?>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<span class="ti-arrow-left text-white"></span>
								</a>
							</div>
							<div class="detials">
								<p><?php echo esc_html__( 'Prev Post', 'basketball' ); ?></p>
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $nextPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<?php
						} ?>
					</div>
					<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
						<?php
						if( get_previous_post_link() ){
							$prevPost = get_previous_post();
							?>
							<div class="detials">
								<p><?php echo esc_html__( 'Next Post', 'basketball' ); ?></p>
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $prevPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<span class="ti-arrow-right text-white"></span>
								</a>
							</div>
							<div class="thumb">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<?php echo get_the_post_thumbnail( absint( $prevPost->ID ), 'basketball_60x60', array( 'class' => 'img-fluid' ) ) ?>
								</a>
							</div>
							<?php
						} ?>
					</div>
				</div>
			</div>
		<?php
		endif;

	}
}


/*=======================================================
	Author Bio
=======================================================*/
function basketball_author_bio(){
	$avatar = get_avatar( absint( get_the_author_meta( 'ID' ) ), 90 );
	?>
	<div class="blog-author">
		<div class="media align-items-center">
			<?php
			if( $avatar  ) {
				echo wp_kses_post( $avatar );
			}
			?>
			<div class="media-body">
				<a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><h4><?php echo esc_html( get_the_author() ); ?></h4></a>
				<p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
			</div>
		</div>
	</div>
	<?php
}


/*===================================================
 BASKETBALL Comment Template Callback
 ====================================================*/
function basketball_comment_callback( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_attr( $tag ); ?> <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent').' comment-list' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-list">
	<?php endif; ?>
		<div class="single-comment">
			<div class="user d-flex">
				<div class="thumb">
					<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
				<div class="desc">
					<div class="comment">
						<?php comment_text(); ?>
					</div>

					<div class="d-flex justify-content-between">
						<div class="d-flex align-items-center">
							<h5 class="comment_author"><?php printf( __( '<span class="comment-author-name">%s</span> ', 'basketball' ), get_comment_author_link() ); ?></h5>
							<p class="date"><?php printf( __('%1$s at %2$s', 'basketball'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'basketball' ), '  ', '' ); ?> </p>
							<?php if ( $comment->comment_approved == '0' ) : ?>
								<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'basketball' ); ?></em>
								<br>
							<?php endif; ?>
						</div>

						<div class="reply-btn">
							<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}
// add class comment reply link
add_filter('comment_reply_link', 'basketball_replace_reply_link_class');
function basketball_replace_reply_link_class( $class ) {
	$class = str_replace("class='comment-reply-link", "class='btn-reply comment-reply-link text-uppercase", $class);
	return $class;
}



/*=========================================================
    Latest Blog Post For Elementor Section
===========================================================*/
function basketball_latest_blog( $post_num ){
    $lBlog = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => $post_num
    ) );


    if( $lBlog->have_posts() ){
        while( $lBlog->have_posts() ){
			$lBlog->the_post(); ?>

			<div class="col-sm-6 col-lg-4 col-xl-4">
				<div class="single-home-blog">
					<div class="card">
						<!-- <img src="img/blog/blog_1.png" class="card-img-top" alt="blog"> -->
						<?php
							if( has_post_thumbnail() ){
								the_post_thumbnail( 'basketball_latest_blog_370x350', array('class' => 'card-img-top') );
							}
						?>
						<div class="card-body">
							<span class="dot"><?php the_time('M j, Y') ?></span>
							<a href="<?php the_permalink(); ?>"><h5 class="card-title"><?php the_title(); ?></h5></a>
							<ul>
								<li> <span class="ti-layers"></span><?php echo basketball_featured_post_cat(); ?></li>
								<li> <span class="ti-comments"></span><?php echo basketball_posted_comments();?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
        <?php
        }

    }

}



/*=========================================================
    Share Button Code
===========================================================*/
function basketball_social_sharing_buttons( $ulClass = '', $tagLine = '' ) {

	// Get page URL
	$URL = get_permalink();
	$Sitetitle = get_bloginfo('name');

	// Get page title
	$Title = str_replace( ' ', '%20', get_the_title());

	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.esc_html( $Title ).'&amp;url='.esc_url( $URL ).'&amp;via='.esc_html( $Sitetitle );
	$faceportfolioURL= 'https://www.faceportfolio.com/sharer/sharer.php?u='.esc_url( $URL );
	$linkedin   = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
	$pinterest  = 'http://pinterest.com/pin/create/button/?url='.esc_url( $URL ).'&description='.esc_html( $Title );;

	// Add sharing button at the end of page/page content
	$content = '';
	$content  .= '<ul class="'.esc_attr( $ulClass ).'">';
	$content .= $tagLine;
	$content .= '<li><a href="' . esc_url( $twitterURL ) . '" target="_blank"><i class="ti-twitter-alt"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $faceportfolioURL ) . '" target="_blank"><i class="ti-faceportfolio"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $pinterest ) . '" target="_blank"><i class="ti-pinterest"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $linkedin ) . '" target="_blank"><i class="ti-linkedin"></i></a></li>';
	$content .= '</ul>';

	return $content;

}



/*================================================
	Projects Return data 
================================================ */
function return_tab_data( $getTags, $menu_tabs ) {
	$y = [];
	foreach ( $getTags as $val ) {

		$t = [];

		foreach( $menu_tabs as $data ) {
			if( $data['label'] == $val ) {
				$t[] = $data;
			}
		}

		$y[$val] = $t;

	}

	return $y;
}


/*================================================
    Registering Custom Post
================================================*/
function basketball_custom_posts() {
	
	// Registering Event Post type

	$event_labels = array(
		'name'               => _x( 'Events', 'post type general name', 'basketball' ),
		'singular_name'      => _x( 'Event', 'post type singular name', 'basketball' ),
		'menu_name'          => _x( 'Events', 'admin menu', 'basketball' ),
		'name_admin_bar'     => _x( 'Event', 'add new on admin bar', 'basketball' ),
		'add_new'            => _x( 'Add New', 'Event', 'basketball' ),
		'add_new_item'       => __( 'Add New Event', 'basketball' ),
		'new_item'           => __( 'New Event', 'basketball' ),
		'edit_item'          => __( 'Edit Event', 'basketball' ),
		'view_item'          => __( 'View Event', 'basketball' ),
		'all_items'          => __( 'All Events', 'basketball' ),
		'search_items'       => __( 'Search Events', 'basketball' ),
		'parent_item_colon'  => __( 'Parent Events:', 'basketball' ),
		'not_found'          => __( 'No Events found.', 'basketball' ),
		'not_found_in_trash' => __( 'No Events found in Trash.', 'basketball' )
	);

	$event_args = array(
		'labels'             => $event_labels,
		'description'        => __( 'Description.', 'basketball' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'event' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'event', $event_args );


	// Registering Tutorial Post type

	$tutorial_labels = array(
		'name'               => _x( 'Tutorial', 'post type general name', 'basketball' ),
		'singular_name'      => _x( 'Tutorial', 'post type singular name', 'basketball' ),
		'menu_name'          => _x( 'Tutorial', 'admin menu', 'basketball' ),
		'name_admin_bar'     => _x( 'Tutorial', 'add new on admin bar', 'basketball' ),
		'add_new'            => _x( 'Add New', 'Tutorial', 'basketball' ),
		'add_new_item'       => __( 'Add New Tutorial', 'basketball' ),
		'new_item'           => __( 'New Tutorial', 'basketball' ),
		'edit_item'          => __( 'Edit Tutorial', 'basketball' ),
		'view_item'          => __( 'View Tutorial', 'basketball' ),
		'all_items'          => __( 'All Tutorial', 'basketball' ),
		'search_items'       => __( 'Search Tutorial', 'basketball' ),
		'parent_item_colon'  => __( 'Parent Tutorial:', 'basketball' ),
		'not_found'          => __( 'No Tutorial found.', 'basketball' ),
		'not_found_in_trash' => __( 'No Tutorial found in Trash.', 'basketball' )
	);

	$tutorial_args = array(
		'labels'             => $tutorial_labels,
		'description'        => __( 'Description.', 'basketball' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'tutorial' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail' )
	);

	register_post_type( 'tutorial', $tutorial_args );
	
}
add_action( 'init', 'basketball_custom_posts' );


/*=========================================================
    Event Section
========================================================*/
function basketball_event_section( $pNumber ){

	$events = new WP_Query( array(
		'post_type' => 'event',
		'posts_per_page'=> $pNumber,

	) );

	if( $events->have_posts() ) {
		while ( $events->have_posts() ) {
			$events->the_post();
			$event_location = get_post_meta( get_the_ID(), 'event_location', true ) ? get_post_meta( get_the_ID(), 'event_location', true ) : 'N/A';
			$project_date = get_post_meta( get_the_ID(), 'project_date', true );
			$project_start_time = get_post_meta( get_the_ID(), 'project_start_time', true );
			$project_end_time = get_post_meta( get_the_ID(), 'project_end_time', true );
    ?>
    <div class="col-md-6 col-xl-6">
		<div class="upcoming_event_1">
			<?php echo the_post_thumbnail('basketball_event_570x400');?>
			<div class="upcoming_event_text">
				<div class="date">
					<h3><?php echo $project_date;?> </h3>
				</div>
				<div class="time">
					<ul class="list-unstyle">
						<li> <span class="ti-time"></span> <?php echo $project_start_time;?> - <?php echo $project_end_time;?></li>
						<li> <span class="ti-location-pin"></span> <?php echo $event_location;?></li>
					</ul>
				</div>
				<?php the_content();?>
				<a href="<?php the_permalink(); ?>" class="btn_2"><?php echo esc_html__( 'View Details', 'basketball');?></a>
			</div>
		</div>
	</div>
	<?php
		}
	} ?>
    <?php
}


/*=========================================================
    Tutorial Section
========================================================*/
function basketball_tutorial_section( $tNumber ){

	$tutorials = new WP_Query( array(
		'post_type' => 'tutorial',
		'posts_per_page'=> $tNumber,

	) );
    ?>

	<div class="col-xl-12">
		<div class="swiper-container gallery-top">
			<div class="swiper-wrapper">
				<?php
				if( $tutorials->have_posts() ) {
					while ( $tutorials->have_posts() ) {
						$tutorials->the_post();
						$video_url = get_post_meta( get_the_ID(), 'video_url', true ) ? get_post_meta( get_the_ID(), 'video_url', true ) : 'N/A';
				?>
				<div class="swiper-slide">
					<div class="swiper-slide-container overlay">
						<?php echo the_post_thumbnail( 'basketball_770x435' );?>
						<div class="slider_content">
							<a id="play-video_1" class="video-play-button popup-youtube"  href="<?php echo esc_url($video_url);?>">
								<span class="ti-control-play"></span>
							</a>
						</div>
					</div>
				</div>
				<?php
					}
					wp_reset_query();
				} ?>
			</div>
			<!-- Add Arrows -->
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>
		<div class="swiper-container gallery-thumbs">
			<div class="swiper-wrapper">
				<?php
				if( $tutorials->have_posts() ) {
					while ( $tutorials->have_posts() ) {
						$tutorials->the_post();
						$video_url = get_post_meta( get_the_ID(), 'video_url', true ) ? get_post_meta( get_the_ID(), 'video_url', true ) : 'N/A';
				?>
				<div class="swiper-slide">
					<div class="swiper-slide-container">
						<?php echo the_post_thumbnail( 'basketball_293x203' );?>
						<div class="slider_content">
							<a id="play-video" class="video-play-button popup-youtube d-none d-lg-block"  href="<?php echo esc_url($video_url);?>">
								<span class="ti-control-play"></span>
							</a>
						</div>
					</div>
				</div>
				<?php
					}
					wp_reset_query();
				} ?>
			</div>
		</div>
	</div>
    <?php
}


/*==========================================================
 *  Flaticon Icon List
=========================================================*/
function basketball_flaticon_list(){
    return(
        array(
            'flaticon-leaf'     => 'Leaf',
            'flaticon-send'     => 'Send',
            'flaticon-camera'   => 'Camera',
            'flaticon-balloon'  => 'Balloon'
        )
    );
}

