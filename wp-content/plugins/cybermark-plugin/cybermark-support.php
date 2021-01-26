

<?php
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
//require('C:/wamp64/www/franchise/wp-load.php');
global $wpdb;

?>

<?php include 'header-inc.php';?>
<div class="cybermark-support__wrapper cybermark-dashboard__wrapper">
	<div class="container-fluid">
		<div class="cybermark-support__inner">
			<h2>CyberMark SMART Support</h2>
			<div class="cybermark-support__chart">
				<div class="row">
					<div class="col-md-9">
						<div class="panel">
							<div class="panel-body">
								<p>Need help updating your site? Want to make a change to your marketing campaign? Looking to add new services or update your billing methods? Our CyberMark SMART Support team is here to help! Fill out a support request using the form below.</p>
								<script type="text/javascript" src="https://s3.amazonaws.com/assets.freshdesk.com/widget/freshwidget.js"></script>
<style type="text/css" media="screen, projection">
	@import url(https://s3.amazonaws.com/assets.freshdesk.com/widget/freshwidget.css); 
</style> 
<iframe title="Feedback Form" class="freshwidget-embedded-form" id="freshwidget-embedded-form" src="https://cybermark.freshdesk.com/widgets/feedback_widget/new?&widgetType=embedded&formTitle=SMART+Support&submitTitle=Submit+Request&submitThanks=Thank+you+for+contacting+CyberMark+Smart+Support.+A+CyberMark+representative+will+reach+out+to+you+shortly+regarding+your+request.&screenshot=No&searchArea=no" scrolling="no" height="600px" width="100%" frameborder="0" >
</iframe>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="callouts">
							<div class="callout_box leads_box">
								<a href="<?php echo admin_url();?>admin.php?page=lead_tracking">
									<h3>CyberMark Lead Tracking</h3>
									<p>Looking for your leads? We have them conveniently located inside the Website Dashboard. Use this link or the one at the top of the page to view your leads from the past 30 days.</p>
									<span class=" btn btn-lg">My Leads</span>
								</a>
							</div>
						</div>
						<div class="callouts">
							<div class="callout_box support_box">
								<a href="https://support.cybermark.com/support/home" target="_blank">
									<h3>FAQ's</h3>
									<p>

Need to reset your Lead Tracking password? Help reading your most recent report? Our common questions and answers are a click away.
</p>
									<span class=" btn btn-lg">View FAQ's</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

