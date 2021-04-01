<?php
/**
Template Name: Landing Page 1
Template Post Type: landing-pages
 */

get_header(); ?>

<div class="page_banner1" style="background-image: url(<?php if(get_field('banner_image')):?><?php the_field('banner_image');?><?php else:?><?php echo get_template_directory_uri(); ?>/images/banner.jpg<?php endif;?>); ">
	<div class="container">
		<div class="page-banner-heading-1">
			<h1 id="4" class=""><?php echo do_shortcode(get_field('banner_h1'));?></h1>
            <h2><?php if(get_field('banner_h2')):?><?php echo do_shortcode(get_field('banner_h2'));?><?php else:?>Subheading<?php endif;?></h2>
                <div class="form_one" >
                <?php gravity_form( 4, $display_title = false, $display_description = false );?>
                </div>
		</div>
	</div>
</div>

<div class="section__wrapper" style="position: relative;">
<div class="container" style="position: relative;">
    <div class="row">
        <div class="col-md-6">
            <div class="row ">
                
                <div class="col-sm-6 info">
                    <h4>CyberMark</h4>
                    <p>18456 N 25 Ave</p>
                    <p>Phoenix, AZ, 85023</p>
                    <p>623-555-1235</p>
                    <a href="#4" class="btn primary">Directions</a>
                </div>
                <div class="col-sm-6 hours ">
                    <h4>Hours</h4>
                    <p>Monday: 8am - 6pm</p>
                    <p>Tuesday: 8am - 6pm</p>
                    <p>Wednesday: 8am - 6pm</p>
                    <p>Thursday: 8am - 6pm</p>
                    <p>Friday: 8am - 6pm</p>
                    <p>Saturday: 8am - 6pm</p>
                    <p>Sunday: 8am - 6pm</p>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="map-wrapper">
    <div><iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=700&amp;hl=en&amp;q=18456%20N%2025%20Ave,%20Phoenix%20AZ+(CyberMark)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="300" frameborder="0"></iframe></div>
        </div>

 

</div>

<div class="section__wrapper" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="content__img">
                    <img src="https://www.cowgirlcontractcleaning.com/wp-content/uploads/sites/360/2018/05/placeholder-img-2.jpg" alt="" srcset="" class="cover">
                </div>
            </div>
            <div class="col-md-6">
                <div class="content__container">
                    <h2>About <?php the_field('business_name', 'option'); ?></h2>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid recusandae explicabo ab! Maiores placeat quis expedita quasi, suscipit odio facere earum, sit saepe iusto eum esse repellat officia rerum debitis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit corrupti maxime qui dolorem culpa quasi ipsa saepe delectus ex eligendi, voluptas sed quia commodi molestiae eaque sapiente quis voluptatem beatae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt aliquam deleniti nemo sunt perferendis voluptate officia dolorem eaque saepe. Placeat deserunt cupiditate, consectetur dolores tempore animi aspernatur eaque dignissimos eligendi.</p>
                    <a href="#4" class="btn secondary">Editable CTA</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section__wrapper dk-bg">
    <div class="container ">
        <div class="row align-items-center">
            <div class="col-md-4 benefits ">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="p-2 mb-2"><i class="fas fa-rocket fa-3x"></i></div>
                       <div class="p-2"><h5 class="card-title"><strong>Benefit or Feature</strong></h5></div> 
                       <div> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p></div>

                     </div>
                </div>
            </div>
            <div class="col-md-4 benefits">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="p-2 mb-2"><i class="fas fa-rocket fa-3x"></i></div>
                       <div class="p-2"><h5 class="card-title"><strong>Benefit or Feature</strong></h5></div> 
                       <div> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p></div>

                     </div>
                </div>
            </div>
            <div class="col-md-4 benefits">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="p-2 mb-2"><i class="fas fa-rocket fa-3x"></i></div>
                       <div class="p-2"><h5 class="card-title"><strong>Benefit or Feature</strong></h5></div> 
                       <div> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p></div>

                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
      
    get_template_part('template-parts/testimonials');
?>

<div class="section__wrapper ">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center">
                <h2>Editable Offer</h2>
                <p>Click the button below to claim this offer!</p>
                <a href="#4" class="btn secondary">Editable CTA</a>
            </div>
        </div>
    </div>
</div>

 
  </div>
</div>

<?php
get_footer();







