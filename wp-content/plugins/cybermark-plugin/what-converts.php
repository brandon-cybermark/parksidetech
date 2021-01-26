<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="<?php echo plugin_dir_url( dirname( __FILE__ ) );?>cybermark-plugin/js/pagination.min.js"></script>
<script>

jQuery(document).ready(function($) {
let rows = []
$('#basicTable tbody tr').each(function(i, row) {
	return rows.push(row);
});

$('#pagination').pagination({
    dataSource: rows,
    pageSize: 10,
    callback: function(data, pagination) {
        $('tbody').html(data);
    }
})
});
</script>

<?php
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
//require('C:/wamp64/www/franchise/wp-load.php');
global $wpdb;
global $blog_id; 

	$today = date('Y-m-d');
	$ninetydaysago = date('Y-m-d', strtotime('-30 days'));
	//switch_to_blog(1);
	// $api_token = wc_key;
	// $api_secret = wc_secret;
	// $account_id = account_id;
	//restore_current_blog();
	$profile_id = get_field('profile_id', 'option');
	$colon = ":";

	$auth = wc_key . $colon . wc_secret;
	$base_url = 'https://app.whatconverts.com/api/v1/';
	$id = '&account_id='.account_id.'';
	$id2 = '&profile_id='.$profile_id.'';
	$par2 = 'leads?leads_per_page=250';
	$timeframe = '&start_date='. $ninetydaysago .'&end_date='.$today;

	$par = 'leads';
	$uri = $base_url . $par;
	 if ($profile_id != null){
	     $uri = $base_url . $par2.$timeframe.$id.$id2;
	}else {
	$uri = $base_url . $par2.$timeframe.$id;
	}
	//$uri = $base_url . $par2.$timeframe.$id.$id2;
	$res = curl_init();
	curl_setopt($res,CURLOPT_URL,$uri);
	curl_setopt($res,CURLOPT_USERPWD,$auth);
	curl_setopt($res,CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($res);
	$leads = json_decode($result, true);
	//var_dump($leads);
?>
<?php include 'header-inc.php';?>
<div class="cybermark-leads__wrapper cybermark-dashboard__wrapper">
	<div class="container">
		<div class="cybermark-leads__inner">
			<h2>CyberMark Lead Tracking</h2>
			<div class="cybermark-leads__chart">
				<div class="row">
					<div class="col-md-9">
						<div class="panel">
							<div class="panel-body">
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
				                	<div id="chartContainer" style="height: 370px; width: 100%;"></div>
									<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
									<script>
									window.onload = function () {

									var chart = new CanvasJS.Chart("chartContainer", {
										animationEnabled: true,
										theme: "light2", // "light1", "light2", "dark1", "dark2"
										data: [{        
											type: "column",  
											showInLegend: true, 
											legendMarkerColor: "grey",
											legendText: "",
											dataPoints: [      
									/*{ y: <?php echo $count_repeat;?>, indexLabel: "Repeat Leads" },
									{ y: <?php echo $count_unique;?>, indexLabel: "Unique Leads" },*/
									{ y: 25, indexLabel: "Repeat Leads" },
									{ y: 20, indexLabel: "Unique Leads" },
											]
										}]
									});
									chart.render();

									}
									</script>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="callouts">
							<div class="lead_time_frame">
								<div class="lead_frame">Leads During</div>
								<div>
									<?php $newDate = date("m-d-Y", strtotime($ninetydaysago)); echo $newDate;?> - <?php $todaysDate = date("m-d-Y", strtotime($today)); echo $todaysDate;?>
								</div>
							</div>
							
				            <div class="total-leads"><strong><?php echo $leads['total_leads'];?></strong> Leads</div>
				            <div class="lead-type">
				                <div>
				                	<strong>
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

				                	</strong> Calls</div>
				                <div>
				                	<strong>
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

				                	</strong> Forms</div>

				            </div>
						</div>
						<p></p>

					</div>
				</div>
			</div>
			<div class="table-responsive table-dashboard" ng-show="base_table">
            	<table class="table table-bordered table-striped base-table" id="basicTable">
					<thead>
						<th class="header text-center no-wrap">
							<div></div>
						</th>
						<th class="header text-center no-wrap">
							<div>Type</div>
						</th>
						<th class="header text-center no-wrap">
							<div>Time</div>
						</th>
						<th class="header text-center no-wrap">
							<div>Source</div>
						</th>
						<th class="header text-center no-wrap">
							<div>Medium</div>
						</th>
						<th class="header text-center no-wrap">
							<div>Source</div>
						</th>
					</thead>
					<tbody>
						<?php foreach ($leads['leads'] as $key => $value):?>
		              	<?php

		                	$lead_type = $leads['leads'][$key]['lead_type'];
							$lead_status  = $leads['leads'][$key]['lead_status'];
							$date_created = $leads['leads'][$key]['date_created'];
							$t_minutes = substr($date_created, -6, -4);
							$t_hours = substr($date_created, -9, -6);
							$t_month = substr($date_created, -15, -13);
							$t_day = substr($date_created, -12, -10);
							$t_year = substr($date_created, -20, -16);

							$date = $t_month . '/' . $t_day . '/' . $t_year . ' ' . 'at' . ' ' . $t_hours . $t_minutes;

							$lead_source = $leads['leads'][$key]['lead_source'];
							$lead_medium = $leads['leads'][$key]['lead_medium'];
							$lead_source = $leads['leads'][$key]['lead_source'];

							$tracking_number = $leads['leads'][$key]['tracking_number'];
							$destination_number = $leads['leads'][$key]['destination_number'];
							$caller_number = $leads['leads'][$key]['caller_number'];
							$caller_name = $leads['leads'][$key]['caller_name'];
							$caller_city = $leads['leads'][$key]['caller_city'];
							$caller_state = $leads['leads'][$key]['caller_state'];
							$caller_country = $leads['leads'][$key]['caller_country'];
							$answer_status = $leads['leads'][$key]['answer_status'];
							$line_type = $leads['leads'][$key]['line_type'];
							$call_duration = $leads['leads'][$key]['call_duration'];


                			$lead_status = $leads['leads'][$key]['lead_status'];
                			$date_created = $leads['leads'][$key]['date_created'];
                			$form_name = $leads['leads'][$key]['form_name'];
                			$phone_name = $leads['leads'][$key]['phone_name'];
                			$lead_url = $leads['leads'][$key]['lead_url'];
                			$landing_url = $leads['leads'][$key]['landing_url'];
                			$lead_id = $leads['leads'][$key]['lead_id'];
                			$lead_source = $leads['leads'][$key]['lead_source'];
                   			$lead_medium = $leads['leads'][$key]['lead_medium'];
                   			$lead_keyword = $leads['leads'][$key]['lead_keyword'];
                   			$operating_system = $leads['leads'][$key]['operating_system'];
                			$browser = $leads['leads'][$key]['browser'];
                            $device_make = $leads['leads'][$key]['device_make'];
                            $device_type = $leads['leads'][$key]['device_type'];
		              	?>
						<tr>
							<td>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#leadsModal-<?php echo $leads['leads'][$key]['lead_id'];?>">
								  <span class="dashicons dashicons-format-aside"></span>
								</button>
							</td>

							<td class="text-center no-wrap"><?php echo $lead_type;?></td>
							<td class="text-center no-wrap"><?php echo $date;?></td>
							<td class="text-center no-wrap"><?php echo $lead_source;?></td>
							<td class="text-center no-wrap"><?php echo $lead_medium;?></td>
							<td class="text-center no-wrap"><?php echo $lead_source;?></td>
						</tr>

						<div class="modal fade" id="leadsModal-<?php echo $leads['leads'][$key]['lead_id'];?>" tabindex="-1" role="dialog" aria-labelledby="leadsModal" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Lead Details</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<?php
											if ($lead_type == "Phone Call"):?>

											<div class="row">
												<div class="col-md-8">
													<div class="column-responsive" >
                										<div class="column-heading">
                											<div class="column-half">
                												<p><strong>Name</strong></p>
                											</div>
                											<div class="column-half">
                												<p><strong>Value</strong></p>
                											</div>
                										</div>
                										<div class="column-body">
                											<div class="column-half">
                												<p><strong>Tracking Number</strong></p>
                												<p><strong>Destination Number</strong></p>
                												<p><strong>Caller Number</strong></p>
                												<p><strong>Caller Name</strong></p>
                												<p><strong>Caller City</strong></p>
                												<p><strong>Caller State</strong></p>
                												<p><strong>Caller Country</strong></p>
                												<p><strong>Answer Status</strong></p>
                												<p><strong>Line Type</strong></p>
                												<p><strong>Call Duration</strong></p>
                											</div>
                											<div class="column-half">
                												<p><?php echo $tracking_number;?></p>
                												<p><?php echo $destination_number;?></p>
                												<p><?php echo $caller_number;?></p>
                												<p><?php echo $caller_name;?></p>
                												<p><?php echo $caller_city;?></p>
                												<p><?php echo $caller_state;?></p>
                												<p><?php echo $caller_country;?></p>
                												<p><?php echo $answer_status;?></p>
                												<p><?php echo $line_type;?></p>
                												<p><?php echo $call_duration;?></p>
                											</div>
                										</div>
											        </div>
												</div>

												<div class="col-md-4 clear-margins">
                									<div class="lead-details-panel-sub">
                										<h3 class="page-header">Phone Call</h3>
                										<p><strong><?php echo $lead_status;?> lead</strong> at <?php echo $date;?></p>
                										<p>Phone Name: <strong><?php echo $phone_name;?></strong></p>
                										<p>Lead Page: <a href="<?php echo $lead_url;?>" target="_blank"><?php echo $lead_url;?></a></p>
                										<p>Landing Page: <a href="<?php echo $landing_url;?>" target="_blank"><?php echo $landing_url;?></a></p>
                										<p>Lead ID: <strong><?php echo $lead_id;?></strong></p>
                									</div>
                									<div class="lead-details-panel-sub">
                   										<p>Source: <strong><?php echo $lead_source;?></strong></p>
                   										<p>Medium: <strong><?php echo $lead_medium;?></strong></p>
                   										<p>Keyword/Term: <strong><?php echo $lead_keyword;?></strong></p>
                   									</div>
                									<div class="lead-details-panel-sub">
                										<p>Operating System: <strong><?php echo $operating_system;?></strong></p>
                										<p>Browser: <strong><?php echo $browser;?></strong></p>
                										<p>Device Type: <strong><?php echo $device_type;?></strong></p>
                										<p>Device Make: <strong><?php echo $device_make;?></strong></p>
                									</div>
            									</div>
											</div>
										<?php endif;?>

										<?php
											if ($lead_type == "Web Form"):?>

											<div class="row">
												<div class="col-md-8">
													<div class="column-responsive" >
                										<div class="column-heading">
                											<div class="column-half">
                												<p><strong>Name</strong></p>
                											</div>
                											<div class="column-half">
                												<p><strong>Value</strong></p>
                											</div>
                										</div>
                										<div class="column-body">
                												<?php

							                                        $add_f = array();
							                                        $add_f = $leads['leads'][$key]['additional_fields'];
							                                        foreach ($add_f as $key => $value) {
							                                          echo '<div class="column-half"><p> ' . $key . ' </p></div>';
							                                          echo '<div class="column-half"><p> ' . $value . ' </p></div>';
							                                        }


							                                        ?>
                										</div>
											        </div>
												</div>




												<div class="col-md-4 clear-margins">
                									<div class="lead-details-panel-sub">
                										<h3 class="page-header">Web Form</h3>
                										<p><strong><?php echo $lead_status;?> lead</strong> at <?php echo $date;?></p>
                										<p>Form Name: <strong><?php echo $form_name;?></strong></p>
                										<p>Lead Page: <a href="<?php echo $lead_url;?>" target="_blank"><?php echo $lead_url;?></a></p>
                										<p>Landing Page: <a href="<?php echo $landing_url;?>" target="_blank"><?php echo $landing_url;?></a></p>
                										<p>Lead ID: <strong><?php echo $lead_id;?></strong></p>
                									</div>
                									<div class="lead-details-panel-sub">
                   										<p>Source: <strong><?php echo $lead_source;?></strong></p>
                   										<p>Medium: <strong><?php echo $lead_medium;?></strong></p>
                   										<p>Keyword/Term: <strong><?php echo $lead_keyword;?></strong></p>
                   									</div>
                									<div class="lead-details-panel-sub">
                										<p>Operating System: <strong><?php echo $operating_system;?></strong></p>
                										<p>Browser: <strong><?php echo $browser;?></strong></p>
                										<p>Device Type: <strong><?php echo $device_type;?></strong></p>
                										<p>Device Make: <strong><?php echo $device_make;?></strong></p>
                									</div>
            									</div>
											</div>
										<?php endif;?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>

						<script>
							jQuery(document).ready(function($) {
							$('#leadsModal<?php echo $leads['leads'][$key]['lead_id'];?>').on('shown.bs.modal', function () {
							  $('.btn-primary').trigger('focus')
							});
							});
						</script>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
				<div id="pagination"></div>

		</div>
	</div>
</div>
<div class="cybermark-information_wrapper">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="cybermark-information_inner">
					<h3>CyberMark Lead Tracking Portal</h3>
					<p>Looking for more detailed information? View even more information, export your leads or search a larger date range inside your CyberMark Lead Tracking Portal! If you do not have access or need login information, just submit a request to our CyberMark SMART Support and we will help you.</p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="cybermark-btn_inner">
					<a href="https://leads.cybermark.com/" target="_blank" class="btn btn-primary btn-lg">Login to Tracking Portal</a>
					<a href="https://support.cybermark.com/" target="_blank" class="btn btn-outline-primary btn-lg">CyberMark SMART Support</a>

			</div>
		</div>
	</div>
</div>
