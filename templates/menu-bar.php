<!-- ***** Header Area Start ***** -->
<header class="header">
    <div class="header__content row">

        <div class="header__logo">
            <?php 
            // Site Logo
            echo basketball_theme_logo('logo');
            ?>
        </div> <!-- end header__logo -->
            <?php 
            if( has_nav_menu( 'social-menu' ) && basketball_opt('basketball_headersocial_toggle') ){
                $args = array(
                    'theme_location' => 'social-menu',
                    'container'      => '',
                    'depth'          => 1,
                    'menu_class'     => 'header__social',
                    'fallback_cb'    => 'basketball_social_navwalker::fallback',
                    'walker'         => new basketball_social_navwalker(),
                );  
                wp_nav_menu( $args );
            }
            ?>
        <?php 
        if( basketball_opt( 'basketball_hsearchform_toggle' ) ):
        ?>
        <a class="header__search-trigger" href="#0"></a>

        <div class="header__search">
            <form role="search" method="get" class="header__search-form" action="<?php echo esc_url( site_url('/') ); ?>">
                <label>
                    <span class="hide-content"><?php esc_html_e( 'Search for:', 'basketball' ); ?></span>
                    <input type="search" class="search-field" placeholder="<?php esc_html_e( 'Type Keywords', 'basketball' ); ?>" name="s" title="<?php esc_html_e( 'Search for:', 'basketball' ); ?>" autocomplete="off">
                </label>
                <input type="submit" class="search-submit" value="<?php esc_html_e( 'Search', 'basketball' ); ?>">
            </form>

            <a href="#0" title="<?php esc_html_e( 'Close Search', 'basketball' ); ?>" class="header__overlay-close"><?php esc_html_e( 'Close', 'basketball' ); ?></a>

        </div>  <!-- end header__search -->
        <?php 
        endif;
        ?>

        <a class="header__toggle-menu" href="#0" title="Menu"><span><?php esc_html_e( 'Menu', 'basketball' ); ?></span></a>

        <nav class="header__nav-wrap">

            <h2 class="header__nav-heading h6"><?php esc_html_e( 'Site Navigation', 'basketball' ); ?></h2>
                <?php 
                if( has_nav_menu( 'primary-menu' ) ){
                    $args = array(
                        'theme_location' => 'primary-menu',
                        'container'      => '',
                        'depth'          => 2,
                        'menu_class'     => 'header__nav',
                        'fallback_cb'    => 'basketball_bootstrap_navwalker::fallback',
                        'walker'         => new basketball_bootstrap_navwalker(),
                    );  
                    wp_nav_menu( $args );
                }
                ?>

            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu"><?php esc_html_e( 'Close', 'basketball' ); ?></a>

        </nav> <!-- end header__nav-wrap -->

    </div> <!-- header-content -->
</header> <!-- header -->