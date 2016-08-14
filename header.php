<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>
	
	<?php

		/*
		* Print the <title> tag based on what is being viewed.
		*/
		global $page, $paged;
		 
		wp_title( '|', true, 'right' );
		 
		// Add the blog name.
		bloginfo( 'name' );
		 
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
		 
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'shape' ), max( $paged, $page ) );
	 
	?>

	</title>

	<link rel="icon" href="<?php echo get_bloginfo('template_directory');?>/assets/img/fav.png">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.1.2/css/material-design-iconic-font.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php if (is_user_logged_in()) : ?>

    <style type="text/css">
    
        .navbar-default {
            margin-top: 32px;
        }
    
    </style>

    <?php endif; ?> 

</head>

<body <?php body_class('ais-blue'); ?>>

<header>
    <nav id="ais-navbar" class="navbar navbar-default navbar-fixed-top">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-primary" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                    <?php 
                        $data = get_option('ais_theme_options_basic');
                        $logo = $data['ais_theme_option_brand_logo_url'];
                    ?>
                    <img src="<?php echo $logo; ?>" class="img-responsive">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="navbar-collapse-primary">
                <div class="navbar-form navbar-right">
                    <?php get_search_form( true ); ?>
                </div>
                <?php
                    if (has_nav_menu('primary')) :

                        $defaults = array(
                            'theme_location'    => 'primary',
                            'menu'              => 'primary',
                            'container'         => '',
                            'container_id'      => '',
                            'menu_class'        => 'nav navbar-nav navbar-right',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'depth'             => 2,
                            'walker'            => new wp_bootstrap_navwalker()
                        );

                        wp_nav_menu($defaults);

                    endif;
                ?>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<section id="content">