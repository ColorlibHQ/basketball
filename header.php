<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

    <!--::header part start::-->
    <header class="header_area">
        <div class="sub_header">
            <div class="container">
                <div class="row align-items-center">
                  <div class="col-md-4 col-xl-6">
                      <div id="logo">
                        <?php
                            echo basketball_theme_logo( 'navbar-brand logo_h' );
		                ?>
                      </div>
                  </div>
                  <?php 
                    $phoneNumber = basketball_opt( 'basketball_top_phone' ) ? basketball_opt( 'basketball_top_phone' ) : '+02 213 - 256 (365)';
                    $regUrl = basketball_opt( 'basketball_top_register_url' ) ? basketball_opt( 'basketball_top_register_url' ) : '#';
                    $regLabel = basketball_opt( 'basketball_top_register_label' ) ? basketball_opt( 'basketball_top_register_label' ) : 'Register';
                  
                  ?>
                  <div class="col-md-8 col-xl-6">
                      <div class="sub_header_social_icon float-right">
                        <a href="tel:<?php echo esc_html( $phoneNumber ) ?>"><i class="flaticon-phone"></i><?php echo esc_html( $phoneNumber ) ?></a>
                        <a href="<?php echo esc_url( $regUrl );?>" class="register_icon"><i class="ti-arrow-right"></i><?php echo esc_html( $regLabel );?></a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <?php
                            if(has_nav_menu('primary-menu')) {
                                wp_nav_menu(array(
                                    'menu'           => 'primary-menu',
                                    'theme_location' => 'primary-menu',
                                    'menu_id'        => 'menu-main-menu',
                                    'container_class'=> 'collapse navbar-collapse offset',
                                    'container_id'   => 'navbarSupportedContent',
                                    'menu_class'     => 'navbar-nav mr-auto',
                                    'walker'         => new basketball_bootstrap_navwalker,
                                    'depth'          => 3
                                ));
                            }
                            ?>
                            
                            <?php
                                $social_icons = basketball_opt( 'basketball_footer_social' );
                                if( !empty($social_icons)){
                                    $show_social = basketball_opt('basketball_social_profile_toggle');
                                    if ( $show_social == 1 ){
                            ?>
                            <div class="header_social_icon d-none d-lg-block">
                                <ul>
                                    <?php
                                        for ( $i = 0; $i < count($social_icons); $i++ ) {
                                    ?>
                                
                                    <li><a href="<?php echo esc_url($social_icons[$i]['social_url']);?>"><i class="<?php echo esc_attr($social_icons[$i]['social_icon']);?>"></i></a></li>
                                    
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php 
                                    }
                                }
                            ?>
                        </nav>

                        <?php
                            $social_icons = basketball_opt( 'basketball_footer_social' );
                            if( !empty($social_icons)){
                                $show_social = basketball_opt('basketball_social_profile_toggle');
                                if ( $show_social == 1 ){
                        ?>
                        <div class="header_social_icon d-block d-lg-none">
                            <ul>
                                <?php
                                    $social_icons = basketball_opt( 'basketball_footer_social' );
                                    for ( $i = 0; $i < count($social_icons); $i++ ) {
                                ?>
                            
                                <li><a href="<?php echo esc_url($social_icons[$i]['social_url']);?>"><i class="<?php echo esc_attr($social_icons[$i]['social_icon']);?>"></i></a></li>
                                
                                <?php } ?>
                            </ul>
                        </div>
                        <?php 
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <?php
    //Page Title Bar
    if( function_exists( 'basketball_page_titlebar' ) ){
	    basketball_page_titlebar();
    }

