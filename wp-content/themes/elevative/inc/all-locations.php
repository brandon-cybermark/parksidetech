<?php //include 'header-inc.php';
global $wpdb;
/*
$options ="'options_hours_monday','options_hours_tuesday','options_hours_wednesday','options_hours_thursday','options_hours_friday','options_hours_saturday','options_hours_sunday'";

$query ="SELECT `option_name`,`option_value` FROM `franchise_options` ";
			$query.="WHERE `option_name` = (".$options.") ";
			$results=$wpdb->get_results($query,OBJECT);

			echo $results->option_value;*/
?>

<?php
// BOR TOOL V:1.0 START
//Systematically pull all data from the wordpress multisite blog
//More data
	 // $blogs = $wpdb->get_results( $wpdb->prepare("SELECT blog_id, domain, path FROM $wpdb->blogs WHERE site_id = %d AND public = '1' AND archived = '0' AND mature = '0' AND spam = '0' AND deleted = '0' ORDER BY registered DESC", $wpdb->siteid), ARRAY_A );

	 // $blogs = $wpdb->get_results( $wpdb->prepare("SELECT blog_id FROM $wpdb->franchise_blogs WHERE site_id = %d AND public = '1' AND archived = '0' AND mature = '0' AND spam = '0' AND deleted = '0' ORDER BY registered DESC", $wpdb->siteid), ARRAY_A );

$blogs = json_decode(json_encode(get_sites($args = array("number"=>99999))), true);
	 // put it in array
foreach ( (array) $blogs as $details ) {
 $blog_list[ $details['blog_id'] ] = $details;}
 unset( $blogs );
 $blogs = $blog_list;

 $loc_data = array(
     "Alabama" => array(),
     "Alaska" => array(),
     "Arizona" => array(),
     "Arkansas" => array(),
     "California" => array(),
     "Colorado" => array(),
     "Connecticut" => array(),
     "Delaware" => array(),
     "Florida" => array(),
     "Georgia" => array(),
     "Hawaii" => array(),
     "Idaho" => array(),
     "Illinois" => array(),
     "Indiana" => array(),
     "Iowa" => array(),
     "Kansas" => array(),
     "Kentucky" => array(),
     "Louisiana" => array(),
     "Maine" => array(),
     "Maryland" => array(),
     "Massachusetts" => array(),
     "Michigan" => array(),
     "Minnesota" => array(),
     "Mississippi" => array(),
     "Missouri" => array(),
     "Montana" => array(),
     "Nebraska" => array(),
     "Nevada" => array(),
     "New-Hampshire" => array(),
     "New-Jersey" => array(),
     "New-Mexico" => array(),
     "New-York" => array(),
     "North-Carolina" => array(),
     "North-Dakota" => array(),
     "Ohio" => array(),
     "Oklahoma" => array(),
     "Oregon" => array(),
     "Pennsylvania" => array(),
     "Rhode-Island" => array(),
     "South-Carolina" => array(),
     "South-Dakota" => array(),
     "Tennessee" => array(),
     "Texas" => array(),
     "Utah" => array(),
     "Vermont" => array(),
     "Virginia" => array(),
     "Washington" => array(),
     "West-Virginia" => array(),
     "Wisconsin" => array(),
     "Wyoming" => array()
 );						$temp_id = null;
 foreach ($blogs as $key => $value) {
     $temp_id = $blogs[$key]['blog_id'];
		 //SW404 1 == Main corp site, while 104 is the default site id
		 //Future plan to make a perm id #2 for default site id.
		 // echo '<p>'.$temp_id.'</p><br>';
     switch_to_blog($temp_id);

     if($temp_id == 1 || $temp_id == 2) {
     }else{
			 //Location General Info
        $loc_name = get_field('business_name','options');
        $loc_state = get_field('state','options');
				 //Block for State Org
        if($loc_state == 'AL'){$loc_state ="Alabama";}
        elseif($loc_state == 'AK'){$loc_state ="Alaska";}
        elseif($loc_state == 'AZ'){$loc_state ="Arizona";}
        elseif($loc_state == 'AR'){$loc_state ="Arkansas";}
        elseif($loc_state == 'CA'){$loc_state ="California";}
        elseif($loc_state == 'CO'){$loc_state ="Colorado";}
        elseif($loc_state == 'CT'){$loc_state ="Connecticut";}
        elseif($loc_state == 'DE'){$loc_state ="Delaware";}
        elseif($loc_state == 'FL'){$loc_state ="Florida";}
        elseif($loc_state == 'GA'){$loc_state ="Georgia";}
        elseif($loc_state == 'HI'){$loc_state ="Hawaii";}
        elseif($loc_state == 'ID'){$loc_state ="Idaho";}
        elseif($loc_state == 'IL'){$loc_state ="Illinois";}
        elseif($loc_state == 'IN'){$loc_state ="Indiana";}
        elseif($loc_state == 'IA'){$loc_state ="Iowa";}
        elseif($loc_state == 'KS'){$loc_state ="Kansas";}
        elseif($loc_state == 'KY'){$loc_state ="Kentucky";}
        elseif($loc_state == 'LA'){$loc_state ="Louisiana";}
        elseif($loc_state == 'ME'){$loc_state ="Maine";}
        elseif($loc_state == 'MD'){$loc_state ="Maryland";}
        elseif($loc_state == 'MA'){$loc_state ="Massachusetts";}
        elseif($loc_state == 'MI'){$loc_state ="Michigan";}
        elseif($loc_state == 'MN'){$loc_state ="Minnesota";}
        elseif($loc_state == 'MS'){$loc_state ="Mississippi";}
        elseif($loc_state == 'MO'){$loc_state ="Missouri";}
        elseif($loc_state == 'MT'){$loc_state ="Montana";}
        elseif($loc_state == 'NE'){$loc_state ="Nebraska";}
        elseif($loc_state == 'NV'){$loc_state ="Nevada";}
        elseif($loc_state == 'NH'){$loc_state ="New-Hampshire";}
        elseif($loc_state == 'NJ'){$loc_state ="New-Jersey";}
        elseif($loc_state == 'NM'){$loc_state ="New-Mexico";}
        elseif($loc_state == 'NY'){$loc_state ="New-York";}
        elseif($loc_state == 'NC'){$loc_state ="North-Carolina";}
        elseif($loc_state == 'ND'){$loc_state ="North-Dakota";}
        elseif($loc_state == 'OH'){$loc_state ="Ohio";}
        elseif($loc_state == 'OK'){$loc_state ="Oklahoma";}
        elseif($loc_state == 'OR'){$loc_state ="Oregon";}
        elseif($loc_state == 'PA'){$loc_state ="Pennsylvania";}
        elseif($loc_state == 'RI'){$loc_state ="Rhode-Island";}
        elseif($loc_state == 'SC'){$loc_state ="South-Carolina";}
        elseif($loc_state == 'SD'){$loc_state ="South-Dakota";}
        elseif($loc_state == 'TN'){$loc_state ="Tennessee";}
        elseif($loc_state == 'TX'){$loc_state ="Texas";}
        elseif($loc_state == 'UT'){$loc_state ="Utah";}
        elseif($loc_state == 'VT'){$loc_state ="Vermont";}
        elseif($loc_state == 'VA'){$loc_state ="Virginia";}
        elseif($loc_state == 'WA'){$loc_state ="Washington";}
        elseif($loc_state == 'WV'){$loc_state ="West-Virginia";}
        elseif($loc_state == 'WI'){$loc_state ="Wisconsin";}
        elseif($loc_state == 'WY'){$loc_state ="Wyoming";}
        else{
					 $loc_state = 'error';//Use this to debug if needed
                   }
                   $holding_ar = array(
                       'loc_name' => $loc_name,
                       'loc_url'=> site_url(),
                       'loc_id' =>  $temp_id,

                       'loc_phone'=> get_field('phone_number','options'),
                       'loc_address' => get_field('address','options'),
                       'loc_city'=> get_field('city','options'),
                       'loc_zip'=> get_field('zip_code','options'),
                       'loc_long_state' => $loc_state,
                       'loc_ab_state' => get_field('state','options'),
                       'loc_lat'=> get_field('latitude','options'),
                       'loc_lon'=> get_field('longitude','options'),

                       'loc_facebook'=> get_field('facebook_url','options'),
                       'loc_instagram'=> get_field('instagram_url','options'),
                       'loc_pinterest'=> get_field('pinterest_url','options'),
                       'loc_twitter'=> get_field('twitter_url','options'),
                       'loc_yelp'=> get_field('yelp_url','options'),
                       'loc_youtube'=> get_field('youtube_url','options'),

                       'email'=> get_field('contact_form_email','options'),

                       'loc_mon'=> get_field('hours_monday','options'),
                       'loc_tue'=> get_field('hours_tuesday','options'),
                       'loc_wed'=> get_field('hours_wednesday','options'),
                       'loc_thu'=> get_field('hours_thursday','options'),
                       'loc_fri'=> get_field('hours_friday','options'),
                       'loc_sat'=> get_field('hours_saturday','options'),
                       'loc_sun'=> get_field('hours_sunday','options')
                   );
                   $loc_data[$loc_state][$loc_name] = $holding_ar;
               }
           }
           $temp_id == "null";

           restore_current_blog();
	 //Sort

	 // sort($loc_data['Colorado']);

           foreach ($loc_data as $key => $value) {
             sort($loc_data[$key]);
         }
	 //Debug Error column, This removes it from the main array
         unset($loc_data['error']);

	 // // Debug Array
	 // echo '<pre>';
	 // print_r($loc_data);
	 // echo '<pre>';

	 // Drop states with no results from the array.
         $loc_data = array_map('array_filter', $loc_data);
         $loc_data = array_filter($loc_data);

	 // BOR TOOL V:1.0 END









?>


<div class="elevative-dashboard__wrapper">
  	<div class="container-fluid">
    	<div class="elevative-dashboard__inner">
     	 <h2>All Locations</h2>
       <script
         src="https://code.jquery.com/jquery-1.12.4.js"
         integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
         crossorigin="anonymous"></script>


         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
         <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>


       <table id="example" class="display" cellspacing="0" width="100%">
               <thead>
                   <tr>
                     <th>Location Name</th>
                     <th>Site URL</th>
                     <th>Phone Number</th>
                     <th>Address</th>
                     <th>Social Media Links</th>
                     <th>Hours of Operation</th>
                   </tr>
               </thead>



               <tfoot>
                   <tr>
                     <th>Location Name</th>
                     <th>Site URL</th>
                     <th>Phone Number</th>
                     <th>Address</th>
                     <th>Social Media Links</th>
                     <th>Hours of Operation</th>
                   </tr>
               </tfoot>

               <tbody>
                 <?php
                 foreach ($loc_data as $key => $value) {
                    foreach ($loc_data[$key] as $key2 => $value) {


                      $serv_string = 'test';
                      echo '<tr>';
                      echo '<td>'.$loc_data[$key][$key2]['loc_name'].'</td>';
                      echo '<td>'.$loc_data[$key][$key2]['loc_url'].'</td>';
                      echo '<td>'.$loc_data[$key][$key2]['loc_phone'].'</td>';
                      echo '<td>'.$loc_data[$key][$key2]['loc_address'].
                      '<br>'.$loc_data[$key][$key2]['loc_city'].
                      '<br>'.$loc_data[$key][$key2]['loc_ab_state'].
                      '<br>'.$loc_data[$key][$key2]['loc_zip'].'</td>';
                      echo '<td>
                      Facebook Link: <a target="_blank" href="'.$loc_data[$key][$key2]['loc_facebook'].'">'.$loc_data[$key][$key2]['loc_facebook'].'<br></a>
                      Instagram Link: <a target="_blank" href="'.$loc_data[$key][$key2]['loc_instagram'].'">'.$loc_data[$key][$key2]['loc_instagram'].'<br></a>
                      Pinterest Link: <a target="_blank" href="'.$loc_data[$key][$key2]['loc_pinterest'].'">'.$loc_data[$key][$key2]['loc_pinterest'].'<br></a>
                      Twitter Link: <a target="_blank" href="'.$loc_data[$key][$key2]['loc_twitter'].'">'.$loc_data[$key][$key2]['loc_twitter'].'<br></a>
                      Yelp Link: <a target="_blank" href="'.$loc_data[$key][$key2]['loc_yelp'].'">'.$loc_data[$key][$key2]['loc_yelp'].'<br></a>
                      YouTube Link: <a target="_blank" href="'.$loc_data[$key][$key2]['loc_youtube'].'">'.$loc_data[$key][$key2]['loc_youtube'].'</a>
                      </td>';
                      echo '<td>MON: '.$loc_data[$key][$key2]['loc_mon'].'
                      <br>TUE: '.$loc_data[$key][$key2]['loc_tue'].'
                      <br>WED: '.$loc_data[$key][$key2]['loc_wed'].'
                      <br>THU: '.$loc_data[$key][$key2]['loc_thu'].'
                      <br>FRI: '.$loc_data[$key][$key2]['loc_fri'].'
                      <br>SAT: '.$loc_data[$key][$key2]['loc_sat'].'
                      <br>SUN: '.$loc_data[$key][$key2]['loc_sun'].'
                      </td>';

                      echo '</tr>';
                    }
                  }

                 ?>

               </tbody>
           </table>

       <script>
       $(document).ready(function() {
           $('#example').DataTable( {
               responsive: true
           } );
       } );
       </script>

		</div>
	</div>
</div>
