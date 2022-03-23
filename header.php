<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href=<?php bloginfo('template_directory'); ?>/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css"> <!-- Resource style -->
	<script src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script> <!-- Modernizr -->
  	
	<title>Presentation Slideshow | CodyHouse</title>
	<?php wp_head(); ?>
</head>
<body>
	<div class="cd-slideshow-wrapper">
		<nav class="cd-slideshow-nav">
			<button class="cd-nav-trigger">
				Open Nav
				<span aria-hidden="true"></span>
			</button>
			
			<div class="cd-nav-items">
			
			<ol>				
				
				<?php 
			    $blocks = parse_blocks($post->post_content);
			    foreach ($blocks as $block) {
			    if ($block['blockName'] == 'acf/presentation-slide') 
				    {
					    $slide_name = $block['attrs']['data']['slide_name'];
					    $use_sub_slides = $block['attrs']['data']['use_sub_slides'];
						$slide_slug = '' . sanitize_title( $slide_name ) . '';
						//$slide_name = ['innerBlocks']['data']
						?>		 	
		               
		               	<?php if( !$use_sub_slides ) : ?> 
		               		<li><a href="<?php echo $slide_slug; ?>"><?php echo $slide_name; ?></a></li>
		               	<?php endif ?>
		               
		               
		               	<?php if( $use_sub_slides) : // open sub slides?> 
		             	
		             	<li>
		             		<a href="#<?php echo $slide_slug; ?>"><?php echo $slide_name; ?></a>
					 		
					 		<ol class="sub-nav">
		               	
				               	<?php
					               	 $isFirst = true;
					               	 foreach($block['innerBlocks'] as $sub_slide) {
						               	 if ($isFirst) {
									        $isFirst = false;
									        continue;
									    } 
						               	  ?>
				               	
				               		<?php if(isset($sub_slide['attrs']['data']['slide_name'])) { 
					               		$sub_slide_title = $sub_slide['attrs']['data']['slide_name'];
					              
				               		?>
				               		
				               		<li><a href="#<?php echo $slide_slug; ?>"><?php echo $sub_slide_title; ?></a></li>
					               		
								   	<?php } ?>
							   	<?php }//end foreach ?>
					   	
						   	</ol>
					   	<?php endif // close sub slides ?>
					   	
						 <?php } 
						}
				?>
								
				
			</ol>	
			</div> <!-- .cd-nav-items -->
		</nav> <!-- .cd-slideshow-nav -->
	