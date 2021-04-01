<?php
/*
 * Template Name: State Page
 */
?>
<?php get_header();
  $post_slug = $post->post_name;
  $post_slug = str_replace('-', ' ', $post_slug);
  $post_slug = ucwords($post_slug);

   ?>
<div class="content_area" id="alpha">
<div class="container pt-5 pb-5">
<h2>Give your look a boost with eyelash extensions at The Lash Lounge in <?php echo  $post_slug;?>!</h2>
<p>Offering a full range of eyelash extensions from natural to dramatic to extreme! The Lash Lounge takes pride in creating stunning looks for every guest who walks through our doors. It’s no wonder The Lash Lounge has become <?php echo $post_slug;?>’s go-to destination for gorgeous eyelash extensions, threading and more.</p>
<p>Find a salon near you to schedule your appointment today!</p>
</div>
</div>



<?php



global $wpdb;
global $post;

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
                       'loc_status'=> get_field('template','options'),
                       'loc_id' =>  $temp_id,
                       'loc_phone'=> get_field('phone_number','options'),
				 // 'loc_email'=> get_field('location_email',7),
                       'loc_address' => get_field('address','options'),
                       'loc_city'=> get_field('city','options'),
                       'loc_zip'=> get_field('zip_code','options'),
                       'loc_long_state' => $loc_state,
                       'loc_ab_state' => get_field('state','options'),
                       'loc_lat'=> get_field('latitude','options'),
                       'loc_lon'=> get_field('longitude','options'),
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
<div class="mapbottom" style="width:100%;height:100%;">
    <div class="container">
          <ul id="maplocationsectionbottom" class="subsites maplocationsectionbottom states-page_list">
             <?php
             $post_slug = $post->post_name;
              $post_slug = str_replace('-', ' ', $post_slug);
              $post_slug = ucwords($post_slug);
             $counter = 0;
             $active_states = array();
						 $true_counter = false;
             foreach ($loc_data as $key => $value) {
				// echo '<h2 class="location-state location-state-">'.$key.'</h2>';
                foreach ($loc_data[$key] as $key2 => $value) {
                   if($loc_data[$key][$key2]['loc_status'] == "comingsoon"){
                      $stat = '<p style="font-style: italic;font-size: 20px;line-height: 24px;font-weight: 300;color: #333;">Coming Soon</p>';
                  }else{
                      $stat = '';
                  }
                  $phone_temp = $loc_data[$key][$key2]['loc_phone'];
									if (strtoupper($post_slug) == strtoupper($loc_data[$key][$key2]['loc_long_state'])) {
										$true_counter = true;

										echo '<li id="maplocationsectionbottom-marker-'.$loc_data[$key][$key2]['loc_ab_state'].''.$counter++.'"
										data-lat="'.$loc_data[$key][$key2]['loc_lat'].'"
										data-lon="'.$loc_data[$key][$key2]['loc_lon'].'"
										data-is-close=""
										class="bi-'.$loc_data[$key][$key2]['loc_id'].' location-state location-state-'.$loc_data[$key][$key2]['loc_ab_state'].' locationcols"><a target="_blank" href="'.$loc_data[$key][$key2]['loc_url'].'" class="location-bottom-link">
										<h2 class="nomargin">'.$loc_data[$key][$key2]['loc_name'].'<span class="locationDistance"></span></h2>
										<div itemscope="" itemtype="http://schema.org/LocalBusiness">
										<div class="business-data">
										<div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
										<div class="address nomargin"><span itemprop="streetAddress"><span class="fas fa-map-marker-alt"></span>'.$loc_data[$key][$key2]['loc_address'].'</span><br><span itemprop="addressLocality">'.$loc_data[$key][$key2]['loc_city'].'</span>, <span itemprop="addressRegion">'.$loc_data[$key][$key2]['loc_ab_state'].'</span> <span itemprop="postalCode">'.$loc_data[$key][$key2]['loc_zip'].'</span></div><p class="nomargin"><span class="fas fa-phone"></span> <span itemprop="telephone">'.$phone_temp.'</span></p>
										</div>
										</div>
										</div>
										</a>
										</li>';
										array_push($active_states,$loc_data[$key][$key2]['loc_ab_state']);
									}
              }
          }
          ?>
              <?php
              $active_states = array_filter($active_states);
              $all_states = array("AL" => false,"AK" => false,"AZ" => false,"AR" => false,"CA" => false,"CO" => false,"CT" => false,"DE" => false,
                 "FL" => false,"GA" => false,"HI" => false,"ID" => false,"IL" => false,"IN" => false,"IA" => false,"KS" => false,"KY" => false,"LA" => false,"ME" => false,"MD" => false,
                 "MA" => false,"MI" => false,"MN" => false,"MS" => false,"MC" => false,"MT" => false,"NE" => false,"NV" => false,"NH" => false,"NJ" => false,"NM" => false,"NY" => false,
                 "NC" => false,"ND" => false,"OH" => false,"OK" => false,"OR" => false,"PA" => false,"RI" => false,"SC" => false,"SD" => false,"TN" => false,"TX" => false,"UT" => false,
                 "VT" => false,"VA" => false,"WA" => false,"WV" => false,"WI" => false,"WY" => false);
              $inactive_class_name = "location-state";
              foreach ($active_states as $key => $value) {
                $all_states[$value] = true;
            }
            foreach ($all_states as $key => $value) {
                if($value == false){
                   $inactive_class_name .= " location-state-".$key;
               }
           }
           ?>
           <li style="<?php if ($true_counter === true) { echo 'display:none;';}else{echo 'false';}?>"
						 class="no_results <?php echo $inactive_class_name;?>"><h2 class="nomargin">WE’RE SORRY!</h2><h3>There are currently no Lash Lounge SALONS in <?php echo $post_slug;?>. Please check back because we are opening faster than you can bat your lashes!</h3><p>Would you like to bring The Lash Lounge to your community? If you’re interested in owning your own business, you could be our next franchisee! Learn more about our <a href="https://thelashloungefranchising.com/">franchising opportunities</a>.</p></li>
            </ul>
            </div>
    </div>
    <div style="<?php if ($true_counter === true) { echo 'display:none;';}else{echo 'false';}?>" class="content_area">
      <div class="container pt-5 pb-5">
        <h2>THE LASH LOUNGE IS COMING TO <?php echo $post_slug;?>…HOPEFULLY SOON! </h2>
        <p>There aren’t any Lash Lounge eyelash extensions salons in <?php echo $post_slug;?> quite yet, but we hope to be in your neighborhood soon! </p>
          <p>The Lash Lounge offers a full range of eyelash extensions—from classic to hybrid to volume. We take pride in creating stunning, custom lash looks for every guest who walks through our doors. </p>
          <p>It’s no wonder The Lash Lounge will become <?php echo $post_slug;?>'s go-to, luxury destination for gorgeous eyelash extensions, threading and more!  </p>
        </div>
      </div>
</div>
<script type="text/javascript">
console.log('1.2');
<?php
if ($true_counter === false) {
  echo "var link = document.getElementById('alpha');
link.style.display = 'none';";
}

?>
</script>
<?php get_footer(); ?>
