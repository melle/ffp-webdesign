<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> id="fb" >

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />

	<title><?php if (is_home()) { ?>Startseite - <?php } ?><?php wp_title(' '); ?><?php if(wp_title(' ', false)) { echo ' - '; } ?> <?php bloginfo('name'); ?></title>

	<?php if ( ( !is_paged() ) && ( is_single() || is_page() || is_home() ) ) { echo '<meta name="robots" content="index, follow" />' . "\n"; } else { echo '<meta name="robots" content="noindex, follow, noodp, noydir" />' . "\n"; } ?>
	<meta name="description" content="<?php if ( is_single() ) { wp_title(''); echo ' - '; } elseif ( is_page() ) { wp_title(''); echo ' - '; } bloginfo('description'); ?>" />
	<meta name="keywords" content="" />
	<meta name="language" content="de" />
	<meta name="content-language" content="de" />
	<meta name="publisher" content="<?php bloginfo('name'); ?>" />
	<meta name="author" content="Frank Bueltge - http://bueltge.de" />

    <link href="<?php bloginfo('template_url'); ?>/css/central_blog.css" rel="stylesheet" type="text/css"/>
    <!--[if lte IE 7]>
    <link href="<?php bloginfo('template_url'); ?>/css/central_patches.css" rel="stylesheet" type="text/css" />
    <![endif]-->
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	
	<link rel="Shortcut Icon" type="image/x-icon" href="<?php bloginfo('url'); ?>/favicon.ico" />
	<link rel="apple-touch-icon" type="image/x-icon" href="<?php bloginfo('url'); ?>/apple-touch-icon.png"/>
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="search" type="application/opensearchdescription+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('stylesheet_directory'); ?>/os.xml" />
	
	<script type="text/javascript" src="<?php echo (TEMPLATEPATH . '/js/.js'); ?>"></script>

	<?php wp_head(); ?>

</head>

<body>
<div id="page_margins">
	<div id="page">
		<div id="header" onclick="location.href='<?php bloginfo('url'); ?>';" onkeypress="location.href='<?php bloginfo('url'); ?>';" style="cursor: pointer;">
			<div id="topnav">
				<!-- start: skip link navigation -->
				<a class="skip" href="#navigation" title="skip link">Skip to the navigation</a><span class="hideme">.</span>
				<a class="skip" href="#content" title="skip link">Skip to the content</a><span class="hideme">.</span>
				<!-- end: skip link navigation -->
				<span><?php
		$redirect = 'wp-admin/edit.php';
		if (!is_user_logged_in()) {
			$link = '<a href="' . get_settings('siteurl') . '/wp-login.php?redirect_to='.$redirect.'">' . __('Login') . '</a>';
		} else {
			$link = '<a href="' . get_settings('siteurl') . '/wp-login.php?action=logout&amp;redirect_to='.$redirect.'">' . __('Logout') . '</a> | <a href="'.get_option('siteurl').'/wp-admin/">Site-Admin</a>';
		}
		echo apply_filters('loginout', $link);
		?> | <a href="http://wiki.freifunk-potsdam.de/Kontakt">Kontakt</a> | <a href="http://wiki.freifunk-potsdam.de/Impressum">Impressum</a></span>
		    </div>
		    <div id="headerbg">
		    </div>
		    <h1><a accesskey="1" href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
 			<span><?php bloginfo('description'); ?></span>    
 		</div>
		<!-- begin: main navigation #nav -->
		<div id="nav"> <a id="navigation" name="navigation"></a>
			<!-- skiplink anchor: navigation -->
			<div id="nav_main">
				<ul>
					<li id="current"><a href="<?php bloginfo('url'); ?>">Neues</a></li>
					<li><a href="http://wiki.freifunk-potsdam.de/">Wiki</a></li>
					<li><a href="http://forum.freifunk-potsdam.de/">Forum</a></li>
					<li><a href="http://karte.freifunk-potsdam.de/">Karte</a></li>
				</ul>
				<div class="searchbox">
                                      <?php include(TEMPLATEPATH . '/searchform.php'); ?>
                                </div>
                        </div>
                        <?php 
                              /* display page navigation only, if there are pages */
                              $pageText = wp_list_pages('title_li=&echo=0'); 
                              if (0 != strlen($pageText))
                              {
                        ?>
                        <div id="nav_sub">
                            <ul>
                            <?php echo $pageText; ?>
                            </ul>
                        </div>
                        <?php
                              }
                        ?>
		</div>
		<!-- end: main navigation -->

		<!-- begin: main content area #main -->
		<div id="main">
			<!-- begin: #col1 - first float column -->
			<div id="col1">
				<div id="col1_content" class="clearfix">
					<!-- skiplink anchor: Content -->
                    <a id="content" name="content"></a>
