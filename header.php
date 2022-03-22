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
print "<pre>".print_r($block,1)."</pre>";
}
?>
		
			
					<?php 
			    $blocks = parse_blocks($post->post_content);
			    foreach ($blocks as $block) {
			    if ($block['blockName'] == 'acf/presentation-slide') 
				    {
					    $slide_name = $block['attrs']['data']['slide_name'];
						$slide_slug = '' . sanitize_title( $slide_name ) . '';
						$use_sub_slides = $block['attrs']['data']['use_sub_slides'];
						$sub_slides_title = $blocks['innerBlocks'][$blocks]['attrs']['data']['slide_name'];
						?>		 	
		               <li>
		               	<a href="#<?php echo $slide_slug?>"><?php echo $slide_name?></a>
			               <?php if( $use_sub_slides ): ?> 
				               <ol>
				               
							   <?php echo $sub_slides_title;?>
	
				               
				               <li><?php echo $sub_slides_title; ?></li>
				               </ol>
			               <?php endif; ?>
		               </li>
						 
						 <?php } 
						}
				?>
				
				
				<?php 
			    $blocks = parse_blocks($post->post_content);
			    foreach ($blocks as $block) {
			    if ($block['blockName'] == 'acf/presentation-slide') 
				    {
					    $slide_name = $block['attrs']['data']['slide_name'];
						$slide_slug = '' . sanitize_title( $slide_name ) . '';
						?>		 	
		               <li>
		               	<a href="#<?php echo $slide_slug?>"><?php echo $slide_name?></a>
			               <?php if( $use_sub_slides ): ?> 
				               <ol>
				               
							   <?php echo $sub_slides_title;?>
	
				               
				               <li><?php echo $sub_slides_title; ?></li>
				               </ol>
			               <?php endif; ?>
		               </li>
						 
						 <?php } 
						}
				?>
								
				
			</ol>	
			</div> <!-- .cd-nav-items -->
		</nav> <!-- .cd-slideshow-nav -->
	