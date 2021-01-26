<?php 
$user_info = get_userdata(1);
 global $current_user; wp_get_current_user(); ?>
<div class="dashboard-head">
	<div class="container-fluid ">
		<div class="cybermark-header__brand   cybermark-grid__item" id="cybermark_header_brand">
			<a class="cybermark-header__brand-logo" href="https://www.cybermark.com/" target="_blank">
				<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'cybermark-plugin/images/burst.png'; ?>" alt="CyberMark">
			</a>		
		</div>
		<div class="cybermark-header-menu-wrapper ">
    		<div id="cybermark_header_menu" class="cybermark-header-menu ">
		        <ul class="cybermark-menu__nav ">
		            <li class="cybermark-menu__item">
		            	<a href="<?php echo admin_url();?>admin.php?page=cybermark" class="cybermark-menu__link">
		            		<span class="cybermark-menu__link-text">Dashboard</span>
		            	</a>
		            </li>
		            <li class="cybermark-menu__item">
		            	<a href="<?php echo admin_url();?>admin.php?page=lead_tracking" class="cybermark-menu__link">
		            		<span class="cybermark-menu__link-text">Lead Tracking</span>
		            	</a>
		            </li>
		            <li class="cybermark-menu__item">
		            	<a href="<?php echo admin_url();?>admin.php?page=cybermark_support" class="cybermark-menu__link">
		            		<span class="cybermark-menu__link-text">SMART Support</span>
		            	</a>
		            </li>
		        </ul>
    		</div>
    		<div class="cybermark_profile_menu">
    			<ul class="cybermark_profile_menu__nav">
    				<li class="cybermark_profile_menu__nav-item">
    					<a href="#" class="cybermark_profile_menu__nav-link">
							<div class="menu-avatar">
				    			<img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
				    		</div>
							<?php if ( is_user_logged_in() ) { 
 echo $current_user->display_name; } 
else { wp_loginout(); } ?>
						</a>
						<ul class="cybermark_profile_menu__sub-nav">
    						<li class="cybermark_profile_menu__nav-item">
    							<a href="<?php echo admin_url( 'profile.php' ); ?>" class="cybermark_profile_menu__nav-link">My Profile</a>
    							<a href="<?php echo wp_logout_url(); ?>" class="cybermark_profile_menu__nav-link">Log Out</a>
    						</li>
						</ul>
					</li>
				</ul>
    		</div>
		</div>
	</div>
</div>