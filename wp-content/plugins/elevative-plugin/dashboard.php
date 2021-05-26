<?php 

$user_info = get_userdata(1);
$user = wp_get_current_user();
?>
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
    			<div class="col-xl-6">
    				<div class="block__wrapper">
		    			<div class="block block-rounded color_b" style="width: 100%">
		    				<a href="<?php echo admin_url();?>admin.php?page=lead_tracking">
								<div class="block-content p-0 text-center">
									<div class="block-content-icon">
										<div>
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 269 264" style="enable-background:new 0 0 269 264;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:#000;stroke-width:10;stroke-miterlimit:10}</style><g> <g> <g> <path class="st0" d="M161.1,134.1H241c8.6,0,15.5-6.9,15.5-15.5v-62c0-8.6-6.9-15.5-15.5-15.5h-98.4c-8.6,0-15.5,6.9-15.5,15.5 V165L161.1,134.1z"/> </g> <g> <circle class="st0" cx="194.3" cy="87.6" r="3.1"/> <circle class="st0" cx="166.4" cy="87.6" r="3.1"/> <circle class="st0" cx="222.2" cy="87.6" r="3.1"/> </g> </g> <g> <path class="st0" d="M156.4,202.7l-6.8,11.5h-51l-6.8-11.5H9.6v20.7c0,4.7,3.8,8.6,8.6,8.6h206.7c4.7,0,8.6-3.8,8.6-8.6v-20.7 H156.4z"/> <path class="st0" d="M110.6,63.4H28.5c-4.7,0-8.6,3.8-8.6,8.6V189"/> <line class="st0" x1="223.2" y1="202.3" x2="223.2" y2="149.1"/> </g> <path class="st0" d="M105.9,189v-9.3c0-17.9-14.5-32.4-32.4-32.4l0,0c-17.9,0-32.4,14.5-32.4,32.4v9.3"/> <path class="st0" d="M74.6,147.2L74.6,147.2c-10.9,0-19.7-8.8-19.7-19.7v-6.6c0-10.9,8.8-19.7,19.7-19.7h0 c10.9,0,19.7,8.8,19.7,19.7v6.6C94.4,138.3,85.5,147.2,74.6,147.2z"/> </g> </svg>
										</div>
									</div>
									<div class="small-block-content">
										<div class="block-header block-header-default p-0">
											<h3 class="block-title">Lead Tracking</h3>
										</div>
										<div class="block-content-details">
											<p>View leads</p>
										</div>
									</div>
								</div>
							</a>
						</div>
		    			<div class="block block-rounded color_c">
		    				<a href="<?php echo admin_url();?>admin.php?page=cybermark_support">
								<div class="block-content p-0 text-center">
									<div class="block-content-icon">
										<div>
											<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 269 264" style="enable-background:new 0 0 269 264;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:#000;stroke-width:10;stroke-miterlimit:10}</style><g> <path class="st0" d="M253.3,169l-24.3,3.5v-80l24.3,3.5c6.2,0.9,10.7,6.2,10.7,12.4v48.3C264,162.9,259.4,168.2,253.3,169z"/> <path class="st0" d="M14.7,96L39,92.5v80L14.7,169C8.6,168.2,4,162.9,4,156.7v-48.3C4,102.1,8.6,96.8,14.7,96z"/> <path class="st0" d="M150.4,252.5h-32.7c-9,0-16.4-7.3-16.4-16.4l0,0c0-9,7.3-16.4,16.4-16.4h32.7c9,0,16.4,7.3,16.4,16.4l0,0 C166.7,245.2,159.4,252.5,150.4,252.5z"/> <path class="st0" d="M39,171.1V99.8l0,0c0-48.2,39.1-87.3,87.3-87.3h15.5c48.2,0,87.3,39.1,87.3,87.3v72.7c0,44.2-35.8,80-80,80 l0,0"/> <g> <path class="st0" d="M84.8,136.8l-11.5,0v-21.6l11.5,0c3.7,0,6.9-2.2,8.4-5.6l0,0c1.4-3.4,0.6-7.3-2-9.9l-8.2-8.2l15.3-15.3 l8.2,8.2c2.6,2.6,6.5,3.4,9.9,2l0,0c3.4-1.4,5.6-4.7,5.6-8.4V66.5h21.6V78c0,3.7,2.2,7,5.6,8.4l0,0c3.4,1.4,7.3,0.6,9.9-2l8.2-8.2 l15.3,15.3l-8.2,8.2c-2.6,2.6-3.4,6.5-2,9.9l0,0c1.4,3.4,4.7,5.6,8.4,5.6l11.5,0v21.6l-11.5,0c-3.7,0-7,2.2-8.4,5.6l0,0 c-1.4,3.4-0.6,7.3,2,9.9l8.1,8.1l-15.3,15.3l-8.2-8.2c-2.6-2.6-6.5-3.4-9.9-2l0,0c-3.4,1.4-5.6,4.7-5.6,8.4v11.5H122v-11.5 c0-3.7-2.2-6.9-5.6-8.4l0,0c-3.4-1.4-7.3-0.6-9.9,2l-8.2,8.2l-15.3-15.3l8.1-8.1c2.6-2.6,3.4-6.5,2-9.9l0,0 C91.8,139,88.5,136.8,84.8,136.8z"/> <circle class="st0" cx="132.8" cy="126" r="20"/> </g> </g> </svg>
										</div>
									</div>
									<div class="small-block-content">
										<div class="block-header block-header-default p-0">
											<h3 class="block-title">Customer Support</h3>
										</div>
										<div class="block-content-details">
											<p>Our team of experts are here for you!</p>
										</div>
									</div>
								</div>
							</a>
						</div>
		    			<div class="block block-rounded color_d">
		    				<a href="https://support.cybermark.com/support/solutions" target="_blank">
								<div class="block-content p-0 text-center">
									<div class="block-content-icon">
										<div>
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 269 264" style="enable-background:new 0 0 269 264;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:#000;stroke-width:10;stroke-miterlimit:10}</style><g> <g> <line class="st0" x1="25.2" y1="48" x2="35.2" y2="48"/> <line class="st0" x1="45.2" y1="48" x2="55.2" y2="48"/> <line class="st0" x1="65.2" y1="48" x2="75.2" y2="48"/> <polyline class="st0" points="53.7,211.4 5.2,211.4 5.2,29.5 262.8,29.5 262.8,68 25.2,68 		"/> </g> <polyline class="st0" points="262.8,70.5 262.8,211.4 215.9,211.4 	"/> <g> <path class="st0" d="M115.9,154.1v-3c0-9.8,8-17.8,17.8-17.8l0,0c9.8,0,17.8,8,17.8,17.8v0.1c0,7.1-4.2,13.5-10.8,16.3l0,0 c-6,2.6-10,8.5-10,15.1v6.9"/> <line class="st0" x1="130.8" y1="198.6" x2="130.8" y2="209.6"/> </g> <circle class="st0" cx="132.8" cy="168" r="67.5"/> </g> </svg>
										</div>
									</div>
									<div class="small-block-content">
										<div class="block-header block-header-default p-0">
											<h3 class="block-title">FAQ's</h3>
										</div>
										<div class="block-content-details">
											<p> Common questions and answers. </p>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
	    		</div>
    			<div class="col-xl-6">
	    			<?php include 'inc/what-converts-recent.php';?>
	    		</div>
    		</div>
    	</div>
    </div>   
</div>




