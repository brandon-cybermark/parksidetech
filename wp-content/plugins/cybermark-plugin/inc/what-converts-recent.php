<?php
require('http://'.DOMAIN_CURRENT_SITE.PATH_CURRENT_SITE.'wp-load.php');
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
	$newDate = date("m/d/Y", strtotime($ninetydaysago));
	$todaysDate = date("m/d/Y", strtotime($today));
	$timeFrame = $newDate . ' - ' . $todaysDate;
	$count_phone = 0;
	foreach ($leads['leads'] as $key => $value){
        $phone_call = $leads['leads'][$key]['lead_type'];

        if($phone_call == "Phone Call"){
        ++$count_phone;
        }
	}
	$count_form = 0;
    foreach ($leads['leads'] as $key => $value){
      $web_form = $leads['leads'][$key]['lead_type'];
      if($web_form == "Web Form"){
      ++$count_form;
      }
    }
    $count_unique = 0;
    $count_repeat = 0;
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
<div class="block block-rounded" style="width: 100%">
		<div class="block-header block-header-default p-0" style="margin-bottom: 2em">
			<h3 class="block-title" style="color: #494949">Recent Conversions</h3>
			<a href="<?php echo admin_url();?>admin.php?page=lead_tracking" class="btn block-btn">View All</a>
		</div>
		<div class="block-content p-0 text-center">
			<table class="table responsive-table">
				<thead>
					<tr>
						<th>Title</th>
						<th>Date Range</th>
						<th># Leads</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Phone Calls</td>
						<td><?php echo $timeFrame;?></td>
						<td><strong><?php echo $count_phone;?></strong></td>
					</tr>
					<tr>
						<td>Form Submissions</td>
						<td><?php echo $timeFrame;?></td>
						<td><strong><?php echo $count_form;?></strong></td>
					</tr>
					<tr>
						<td>Repeat Leads</td>
						<td><?php echo $timeFrame;?></td>
						<td><strong><?php echo $count_repeat;?></strong></td>
					</tr>
					<tr>
						<td>Unique Leads</td>
						<td><?php echo $timeFrame;?></td>
						<td><strong><?php echo $count_unique;?></strong></td>
					</tr>
				</tbody>
			</table>
		</div>
</div>

