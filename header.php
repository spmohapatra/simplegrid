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
		<header class="tcc">
            <crest class="tcc">
                <hamburger>
                    <input type="checkbox" />
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <hamtoggle></hamtoggle>
                </hamburger>
                
                <logo><a href="<?php bloginfo('url'); ?>"><img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/mohapatra_in.svg" /></a></logo>

                <navpagetitle>
                    <p><a href="<?php the_permalink(); ?>"><?php the_time('F j, Y'); ?>&quot;<?php echo get_the_title(); ?>&quot;</a></p>
                </navpagetitle>
                
                <desktopnav class="tcc">
                    <?php wp_page_menu('show_home=1&menu_class=desktopnavmenu'); ?>
                    <search>
                        <form method="get" id="searchbox" action="<?php bloginfo('home_url'); ?>/">
                            <input type="text" name="s" class="search_field" onblur="this.value=(this.value=='') ? 'Search ' : this.value;" onfocus="this.value=(this.value=='Search') ? '' : this.value;" value="Search" />
                            <input type="image" class="search_icon" src="<?php bloginfo('template_url'); ?>/images/searchicon.gif" alt="Search"/>
                        </form>
                    </search>	
                </desktopnav>
            </crest>
		</header>