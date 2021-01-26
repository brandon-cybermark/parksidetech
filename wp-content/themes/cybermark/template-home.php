<?php
/**
 * Template Name: Home Page
 *
 */
?>
<?php get_header(); ?>
<div class="main-banner">
	<div class="main-banner__wrapper">
		<div class="main-banner__inner-wrapper">
			
			<div class="main-banner_content">
				<div class="container">
				<div class="col">
                          		<div class="heading-block tal">
                                	<div class="sub-h">Grow where you want to go</div>
                                	<h4 class="h">Digital Marketing<br>
									                <span>For Franchises <br>&amp; Small Business </span></h4>
                            	</div>
                                <a class="button-style1 variant1" href="#" target="_self" data-magic-cursor="link" data-toggle="modal" data-target="#popupForm">
                        							<span class="d"></span>
                        							<span class="title">WORK WITH US</span>
                  							</a>
              				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<?php get_template_part('template-parts/stripe', 'team');?>
<?php get_template_part('template-parts/stripe', 'testimonials');?>
<?php get_footer(); ?>