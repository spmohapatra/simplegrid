<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<title><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="google-site-verification" content="kXav6h7Wovuk6XsuFDFEHnutEDxeqsSlXZKf-ddqOqk" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 

	<?php wp_head(); ?>
</head>
<body>
	<site class="tcc">
        <input type="checkbox" id="mobile-nav" />
		<header class="tcc">
    
            <label id="hamburger" for="mobile-nav">
                <div id="hmb-icon">
                    <span id="hmbspan"></span>
                    <span id="hmbspan"></span>
                    <span id="hmbspan"></span>
                    <span id="hmbspan"></span>
                </div>
            </label>

            <logo><a href="<?php bloginfo('url'); ?>"><img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/mohapatra_in.svg" /></a></logo>

            <navpagetitle>
                <p><a href="<?php the_permalink(); ?>"><?php the_time('F j, Y'); ?>&quot;<?php echo get_the_title(); ?>&quot;</a></p>
            </navpagetitle>
            
            <desktopnav class="tcc">
                <?php 
                    wp_nav_menu( array(
                        'menu' => 'desktop-menu', // Serves the desktop menu
                        'menu_class' => 'desktopnavmenu',
                        'container_class' => 'desktopnavmenu'
                    ) );
                ?>
            </desktopnav>

            <search>
                    <form class="search" method="get" id="searchbox" action="<?php bloginfo('home_url'); ?>/">
                        <div class="search__wrapper">
                            <input type="text" name="s" placeholder="search for..." class="search__field">
                            <button type="submit" class="fa fa-search search__icon"></button>
                        </div>
                    </form>
            </search>
            
        </header>

        <mobilenav class="tcc">
            <?php 
                wp_nav_menu( array(
                    'menu' => 'mobile-menu', // Serves the mobile menu
                    'menu_class' => 'mobilenavmenu',
                    'container_class' => 'mobilenavmenu'
                ) );
            ?>
        </mobilenav>

	
