<?php 

$user_info = get_userdata(1);
$user = wp_get_current_user();


include 'header-inc.php';?>
<div class="wrap" style="margin: 0">
    <div class="welcome-msg__wrapper">
    	<div class="welcome-msg__inner">
    		<div class="welcome-header">
    			<h2>Dashboard</h2>
    			<h4>Welcome to your dashboard, <?php echo $user_name = $user_info->display_name;?> </h4>
    		</div>
    		<div class="user-details">
	    		<div class="user-avatar">
	    			<img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
	    		</div>
    			<a href="<?php echo admin_url( 'profile.php' ); ?>" class="btn">View Profile</a>
    		</div>
    	</div>
    </div> 
    <div class="dashboard__wrapper">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-lg-12">
	    			<?php include 'inc/what-converts-recent.php';?>
	    		</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-6">
	    			<div class="block block-rounded">
						<div class="block-header block-header-default">
							<h3 class="block-title">Customer Support</h3>
						</div>
						<div class="block-content p-0 text-center">
							<div class="small-block-content">
								<div class="block-content-icon">
									<div><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'cybermark-plugin/images/support-icon.png'; ?>"></div>
								</div>
								<div class="block-content-details">
									<p>Need help with your website? Want to make a change to your marketing? Our team of experts are here for you!  </p>
								</div>
							</div>
						</div>
						<div class="block-footer">
							<div class="block-footer-btn">
								<a href="https://support.cybermark.com/support/">Contact Support</a>
							</div>
						</div>
					</div>
	    		</div>
    			<div class="col-lg-6">
	    			<div class="block block-rounded">
						<div class="block-header block-header-default">
							<h3 class="block-title">FAQ's</h3>
						</div>
						<div class="block-content p-0 text-center">
							<div class="small-block-content">
								<div class="block-content-icon">
									<div><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'cybermark-plugin/images/faq-icon.png'; ?>"></div>
								</div>
								<div class="block-content-details">
									<p> Need to reset your Lead Tracking password? Help reading your most recent report? Our common questions and answers are a click away. </p>
								</div>
							</div>
						</div>
						<div class="block-footer">
							<div class="block-footer-btn">
								<a href="https://support.cybermark.com/support/solutions">View FAQ's</a>
							</div>
						</div>
					</div>
	    		</div>
    			<div class="col-lg-6">
	    		</div>
    		</div>
    	</div>
    </div>   
</div>