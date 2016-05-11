<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php if ( is_category() ) {
			echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
		} elseif ( is_tag() ) {
			echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
		} elseif ( is_archive() ) {
			wp_title(''); echo ' Archive | '; bloginfo( 'name' );
		} elseif ( is_search() ) {
			echo 'Search for &quot;'.esc_html($s).'&quot; | '; bloginfo( 'name' );
		} elseif ( is_home() || is_front_page() ) {
			bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
		}  elseif ( is_404() ) {
			echo 'Error 404 Not Found | '; bloginfo( 'name' );
		} elseif ( is_single() ) {
			wp_title('');
		} else {
			echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
		} ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">

	<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory') ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory') ?>/fonts/font-awesome/css/font-awesome.css">
	<style>
		body {
			padding-top: 50px;
			padding-bottom: 20px;
		}
	</style>
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory') ?>/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory') ?>/css/main.css">

	<script src="<?php echo get_bloginfo('template_directory') ?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v2.5&appId=215828848462622";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
	your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo get_home_url()?>"><img class="logo" src="<?php echo get_bloginfo('template_directory') ?>/img/logo.jpg"></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li>
					<a href="<?php echo get_permalink( get_page_by_path( 'band' )) ?>">Band</a>
				</li>
				<li>
					<a href="<?php echo get_permalink( get_page_by_path( 'new-releases' )) ?>">Discography</a>
				</li>
				<li>
					<a href="<?php echo get_permalink( get_page_by_path( 'tourdates' )) ?>">Tourdates</a>
				</li>
				<li>
					<a href="<?php echo get_permalink( get_page_by_path( 'media' )) ?>">Media</a>
				</li>
				<li>
					<a href="<?php echo get_permalink( get_page_by_path( 'contacts' )) ?>">Contact</a>
				</li>
				<li>
					<a target="_blank" href="https://arcanaopera.bigcartel.com">Shop</a>
				</li>
				<li class="social-list-element">
					<a target="_blank" href="https://it-it.facebook.com/alexanderwyrd.arcanaopera/"><i class="fa fa-lg fa-facebook"></i></a>
					<a target="_blank" href="https://twitter.com/arcanaopera"><i class="fa fa-lg fa-twitter"></i></a>
					<a target="_blank" href="https://www.youtube.com/user/AlexanderWyrd"><i class="fa fa-lg fa-youtube"></i></a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right social">
				<li><a target="_blank" href="https://it-it.facebook.com/alexanderwyrd.arcanaopera/"><i class="fa fa-lg fa-facebook"></i></a></li>
				<li><a target="_blank" href="https://twitter.com/arcanaopera"><i class="fa fa-lg fa-twitter"></i></a></li>
				<li><a target="_blank" href="https://www.youtube.com/user/AlexanderWyrd"><i class="fa fa-lg fa-youtube"></i></a></li>
			</ul>
		</div><!--/.navbar-collapse -->
	</div>
</nav>