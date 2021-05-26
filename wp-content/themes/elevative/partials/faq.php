<?php 

$content_block = get_sub_field('content_block');?>

<section class="mb-5  section__wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section__container">
					<div class="section__content">
						<?php echo $content_block?>		
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-12">
				<?php

				// check if the repeater field has rows of data
				if( have_rows('faq_option') ):
					$i = 1; // Set the increment variable
					
					echo '<div id="accordion">';
				 	
				 	// loop through the rows of data for the tab header
				    while ( have_rows('faq_option') ) : the_row();
						
						$question = get_sub_field('faq_question');
						$answer = get_sub_field('faq_answer');

					?>
						
						<div class="card">
						    <div class="card-header" id="heading-<?php echo $i;?>">
						      <h5 class="mb-0">
						        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-<?php echo $i;?>" aria-expanded="true" aria-controls="collapse-<?php echo $i;?>">
						          <?php echo $question; ?>
						        </button>
						      </h5>
						    </div>
						
						    <div id="collapse-<?php echo $i;?>" class="collapse" aria-labelledby="heading-<?php echo $i;?>" data-parent="#accordion">
						      <div class="card-body">
						        <?php echo $answer; ?>
						      </div>
						    </div>
						 </div>    
						
						
					<?php $i++; // Increment the increment variable
						
					endwhile; //End the loop 
					
					echo '</div>';
				endif;?>
			</div>
		</div>
	</div>
</section>