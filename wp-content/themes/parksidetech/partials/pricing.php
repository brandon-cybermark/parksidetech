<?php 
$pricing_type = get_sub_field('pricing_type');
$content_block = get_sub_field('content_block');?>

<section class="mb-5 <?php echo $pricing_type;?> section__wrapper section pp-scrollable" style="background-color: #FFF">
	<div class="container h-100 align-items-center">
		<div class="row h-100 align-items-center">
			<div class="col-md-12">
				<div class="section__container">
					<div class="section__content">
						<?php echo $content_block?>		
					</div>
				</div>
			</div>
		</div>
		<?php if( have_rows('pricing_options') ): ?>
		<div class="row mt-5 justify-content-center h-100 align-items-center">
			 <?php while( have_rows('pricing_options') ): the_row(); 
		        $title = get_sub_field('title');
		        $price = get_sub_field('price');
		        $block_id = get_sub_field('block_id');
		        $details = get_sub_field('details');
				$button = get_sub_field('button');
				$button_class = get_sub_field('button_class');
		        $icon = get_sub_field('icon');
		        $add_options = get_sub_field('add_options');
		        ?>
        		<div class="col-lg-4">
					<div class="<?php echo $pricing_type;?>_card card mb-5 mb-lg-0" id="<?php echo $block_id;?>">
						<div class="card-body">
							<?php if($pricing_type == 'pricing_1'):?>
								<div class="pricing-icon">
									<img src="<?php echo $icon;?>" />
								</div>
							<?php endif;?>
							<span class="h5 card-title text-uppercase d-block"><?php echo $title;?></span>

							<?php if($pricing_type == 'pricing_3'):?>
								<div class="pricing-icon">
									<img src="<?php echo $icon;?>" />
								</div>
							<?php endif;?>
							<?php if($pricing_type == 'pricing_1' || $pricing_type == 'pricing_2'):?>
								<span class="h2 card-price d-block">$<?php echo $price;?></span>
							<?php endif;?>
							<?php if($details ){
								echo '<p>' . $details .'</p>';
							};?>
							<?php if($add_options):?>
							<?php if($pricing_type == 'pricing_3'):?>
								<span class="h2 card-price d-block">$<?php echo $price;?></span>
							<?php endif;?>
							<ul class="fa-ul">
								<?php while( have_rows('add_options') ): the_row();$option = get_sub_field('option');?>
								<li><span class="fa-li"><span class="fas fa-check"></span></span><?php echo $option;?></li>
								<?php endwhile;?>
							</ul>
							<?php endif;?>
								<?php 
								if($button):
									$link_url = $button['url'];
								    $link_title = $button['title'];
								    $link_target = $button['target'] ? $button['target'] : '_self';?>
										<a class="btn <?php echo $button_class;?>-btn w-100" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>	
								<?php endif;?>
							</div>
						</div>
					</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>