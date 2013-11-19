<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		
		<!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		
		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<!-- icons -->
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.gif" rel="shortcut icon">
			
		<!-- css + javascript -->
		<?php wp_head(); ?>
 		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
	        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/webflow.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/redlisted.webflow.css">
                <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/redlisted.wordpress.css">
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
	 	<script>
			WebFont.load({
				google: {
					families: ["Architects Daughter:regular","Aclonica:regular","Karla:regular,italic,700,700italic:latin,latin-ext","Allerta:regular"]
				}
		       });
	        </script>
		<script type="text/javascript" src=""<?php echo get_template_directory_uri(); ?>/js/jquery.js" defer></script>

	</head>
	<body <?php body_class(); ?>>
		<div class="site-header">
		   <a href="<?php echo get_bloginfo('wpurl'); ?>"><img class="headerimg" src="http://noblevitae.com/rltitle.png" alt="Redlisted"></a>
		  </div>	
			<!-- /header -->
