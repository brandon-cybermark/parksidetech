<?php
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
global $wpdb;
global $blog_id; 
	$today = date('Y-m-d');
	$ninetydaysago = date('Y-m-d', strtotime('-30 days'));

	switch_to_blog(1);
	$api_token = get_field('api_token', 'option');
	$api_secret = get_field('api_secret', 'option');
	$account_id = get_field('account_id', 'option');
	restore_current_blog();
	$profile_id = get_field('profile_id', 'option');
	$colon = ":";

	$auth = $api_token . $colon . $api_secret;
	$base_url = 'https://app.whatconverts.com/api/v1/';
	$id = '&account_id='.$account_id.'';
	$id2 = '&profile_id='.$profile_id.'';
	$par2 = 'leads?leads_per_page=250';
	$timeframe = '&start_date='. $ninetydaysago .'&end_date='.$today;

	// $par = 'leads';
	// $uri = $base_url . $par;
	if ($profile_id != null){
	    $uri = $base_url . $par2.$timeframe.$id.$id2;
	}else {
	$uri = $base_url . $par2.$timeframe.$id;
	}
	$res = curl_init();
	curl_setopt($res,CURLOPT_URL,$uri);
	curl_setopt($res,CURLOPT_USERPWD,$auth);
	curl_setopt($res,CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($res);
	$leads = json_decode($result, true);
?>
<div class="block block-rounded">
	<div class="block-header block-header-default">
		<h3 class="block-title">Recent Conversions</h3>
		<a href="<?php echo admin_url();?>admin.php?page=lead_tracking" class="btn block-btn">View All</a>
	</div>
	<div class="block-content p-0 text-center">
		<div class="block-date"><?php $newDate = date("m-d-Y", strtotime($ninetydaysago)); echo $newDate;?> - <?php $todaysDate = date("m-d-Y", strtotime($today)); echo $todaysDate;?></div>
		<div id="chartContainer" style="height: 370px; width: 100%;"></div>
		<?php
				                	$count_unique = 0;
				                	foreach ($leads['leads'] as $key => $value){

			                            $unique = $leads['leads'][$key]['lead_status'];

			                            if($unique == "Unique"){
			                            ++$count_unique;
			                            }
			                            $repeat = $leads['leads'][$key]['lead_status'];

			                            if($repeat == "Repeat"){
			                            ++$count_repeat;
			                            }
				                	}

				                	?> 
			<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
			<script>
				window.onload = function () {
					CanvasJS.addColorSet("cybermarkColors",
		                [//colorSet Array

		                "#4273b8",
		                "#46bdae",
		                "#85b050",
		                "#85b050",
		                "#ef5b25"                
		                ]);
					var chart = new CanvasJS.Chart("chartContainer",
						{
						colorSet: "cybermarkColors",
							title:{
								text: ""
							},
							legend: {
								maxWidth: 350,
								itemWidth: 120
							},
							showInLegend: true,
							legendText: "{indexLabel}",
							data: [
							{
								type: "pie",
								showInLegend: true,
								legendText: "{indexLabel}",
								dataPoints: [
									/*{ y: <?php echo $count_repeat;?>, indexLabel: "Repeat Leads" },
									{ y: <?php echo $count_unique;?>, indexLabel: "Unique Leads" },*/
									{ y: 25, indexLabel: "Repeat Leads" },
									{ y: 20, indexLabel: "Unique Leads" },
								]
							}
							]
						});
						chart.render();

					}
			</script>
	</div>
	<div class="block-content">
		<div class="row">
			<div class="col-lg-6">
				<div class="block-icon">
					<span class="dashicons dashicons-phone"></span>
				</div>
				<div class="block-data">
					<span class="value">
						<?php

	                	$count_phone = 0;
	                	foreach ($leads['leads'] as $key => $value){
                            $phone_call = $leads['leads'][$key]['lead_type'];

                            if($phone_call == "Phone Call"){
                            ++$count_phone;
                            }
	                	}

	                	echo $count_phone;
	                	?> 
					</span>
					<span>Phone Calls</span>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="block-icon">
					<span class="dashicons dashicons-text-page"></span>
				</div>
				<div class="block-data">
					<span class="value">
	                <?php

	                	$count_form = 0;

	                        foreach ($leads['leads'] as $key => $value){
	                          $web_form = $leads['leads'][$key]['lead_type'];
	                          if($web_form == "Web Form"){
	                          ++$count_form;
	                          }
	                        }


	                	echo $count_form;
	                	?> 			                		
				    </span>
					<span>Form Submissions</span>
				</div>
			</div>
		</div>
	</div>
</div>

