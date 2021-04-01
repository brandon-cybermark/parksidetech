<?php
/**
Template Name: Landing Page 3
Template Post Type: landing-pages
 */

get_header(); ?>

<div class="page_banner"  style="background-image: url(<?php if(get_field('banner_image')):?><?php the_field('banner_image');?><?php else:?><?php echo get_template_directory_uri(); ?>/images/banner.jpg<?php endif;?>);">
	<div class="container">
        <div class="row align-items-center">
		    <div class="col-md-6 banner3">
			    <h1><?php echo do_shortcode(get_field('banner_h1'));?></h1>
                <h2><?php if(get_field('banner_h2')):?><?php echo do_shortcode(get_field('banner_h2'));?><?php else:?>Subheading<?php endif;?></h2>
                <hr class="banner_hr">
                <p><?php echo do_shortcode(get_field('supporting_statement_header'));?></p>
            </div>
            <div class="col-md-6 p-3 template3_col" id="2">
                <div class="template3_form ">
                    <h2 class="text-center">Lets get in touch</h2>
                    <div class="headShotInfo">
                    <img src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_1491969905.jpg" alt="">
                        <div class="mt-3">
                            <h5>John Doe</h5>
                            <p>555-555-5555</p>
                            <p>Your Real Estate Agent</p>
                        </div>
                    </div>
                    <?php gravity_form( 2, $display_title = false, $display_description = false );?>
                </div>
            </div>
        </div>
	</div>
</div>


<div class="section__wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4 strongPoint">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g>
                    <g>
                        <g>
                            <path d="M366.933,477.867H128c-4.71,0-8.533,3.823-8.533,8.533v17.067c0,4.71,3.823,8.533,8.533,8.533s8.533-3.823,8.533-8.533     v-8.533h230.4c4.71,0,8.533-3.823,8.533-8.533S371.644,477.867,366.933,477.867z"/>
                            <path d="M187.733,213.333c0,4.71,3.823,8.533,8.533,8.533H230.4c4.71,0,8.533-3.823,8.533-8.533v-51.2     c0-4.71-3.823-8.533-8.533-8.533h-34.133c-4.71,0-8.533,3.823-8.533,8.533V213.333z M204.8,170.667h17.067V204.8H204.8V170.667z"/>
                            <path d="M110.933,102.4H8.533c-4.71,0-8.533,3.823-8.533,8.533V281.6c0,4.71,3.823,8.533,8.533,8.533s8.533-3.823,8.533-8.533     V119.467h93.867c4.71,0,8.533-3.823,8.533-8.533S115.644,102.4,110.933,102.4z"/>
                            <path d="M409.6,418.133c0,4.71,3.823,8.533,8.533,8.533h34.133c4.71,0,8.533-3.823,8.533-8.533v-51.2     c0-4.71-3.823-8.533-8.533-8.533h-34.133c-4.71,0-8.533,3.823-8.533,8.533V418.133z M426.667,375.467h17.067V409.6h-17.067     V375.467z"/>
                            <path d="M42.667,307.2C0.486,307.2,0,417.024,0,418.133c0,20.608,14.686,37.837,34.133,41.805v43.529     c0,4.71,3.823,8.533,8.533,8.533c4.71,0,8.533-3.823,8.533-8.533v-43.529c19.447-3.968,34.133-21.197,34.133-41.805     C85.333,417.024,84.847,307.2,42.667,307.2z M42.667,443.733c-14.114,0-25.6-11.486-25.6-25.6     c0-42.513,11.418-93.867,25.6-93.867c14.182,0,25.6,51.354,25.6,93.867C68.267,432.247,56.781,443.733,42.667,443.733z"/>
                            <path d="M93.867,256H59.733c-4.71,0-8.533,3.823-8.533,8.533V281.6c0,4.71,3.823,8.533,8.533,8.533s8.533-3.823,8.533-8.533     v-8.533h17.067v42.667c0,4.71,3.823,8.533,8.533,8.533c4.71,0,8.533-3.823,8.533-8.533v-51.2     C102.4,259.823,98.577,256,93.867,256z"/>
                            <path d="M418.133,221.867h34.133c4.71,0,8.533-3.823,8.533-8.533v-51.2c0-4.71-3.823-8.533-8.533-8.533h-34.133     c-4.71,0-8.533,3.823-8.533,8.533v51.2C409.6,218.044,413.423,221.867,418.133,221.867z M426.667,170.667h17.067V204.8h-17.067     V170.667z"/>
                            <path d="M93.867,153.6H59.733c-4.71,0-8.533,3.823-8.533,8.533v51.2c0,4.71,3.823,8.533,8.533,8.533h34.133     c4.71,0,8.533-3.823,8.533-8.533v-51.2C102.4,157.423,98.577,153.6,93.867,153.6z M85.333,204.8H68.267v-34.133h17.067V204.8z"/>
                            <path d="M273.067,213.333c0,4.71,3.823,8.533,8.533,8.533h34.133c4.71,0,8.533-3.823,8.533-8.533v-51.2     c0-4.71-3.823-8.533-8.533-8.533H281.6c-4.71,0-8.533,3.823-8.533,8.533V213.333z M290.133,170.667H307.2V204.8h-17.067V170.667z     "/>
                            <path d="M503.467,102.4h-102.4c-4.71,0-8.533,3.823-8.533,8.533s3.823,8.533,8.533,8.533h93.867V462.37     c-2.679-0.956-5.521-1.57-8.533-1.57c-1.476,0-2.944,0.128-4.386,0.384c-5.888-10.607-17.092-17.451-29.747-17.451     c-12.655,0-23.859,6.844-29.747,17.451c-1.442-0.256-2.91-0.384-4.386-0.384c-14.114,0-25.6,11.486-25.6,25.6     s11.486,25.6,25.6,25.6H486.4c14.114,0,25.6-11.486,25.6-25.6V110.933C512,106.223,508.177,102.4,503.467,102.4z M486.4,494.933     h-68.267c-4.702,0-8.533-3.831-8.533-8.533s3.831-8.533,8.533-8.533c1.638,0,3.191,0.469,4.625,1.391     c2.338,1.502,5.257,1.775,7.834,0.734c2.577-1.041,4.48-3.277,5.103-5.982c1.801-7.774,8.619-13.21,16.572-13.21     c7.953,0,14.771,5.436,16.572,13.21c0.623,2.705,2.526,4.941,5.103,5.982c2.569,1.041,5.495,0.768,7.834-0.734     c5.555-3.584,13.158,0.802,13.158,7.142C494.933,491.102,491.102,494.933,486.4,494.933z"/>
                            <path d="M281.6,119.467h34.133c4.71,0,8.533-3.823,8.533-8.533v-51.2c0-4.71-3.823-8.533-8.533-8.533H281.6     c-4.71,0-8.533,3.823-8.533,8.533v51.2C273.067,115.644,276.89,119.467,281.6,119.467z M290.133,68.267H307.2V102.4h-17.067     V68.267z"/>
                            <path d="M273.067,315.733c0,4.71,3.823,8.533,8.533,8.533h34.133c4.71,0,8.533-3.823,8.533-8.533v-51.2     c0-4.71-3.823-8.533-8.533-8.533H281.6c-4.71,0-8.533,3.823-8.533,8.533V315.733z M290.133,273.067H307.2V307.2h-17.067V273.067z     "/>
                            <path d="M196.267,119.467H230.4c4.71,0,8.533-3.823,8.533-8.533v-51.2c0-4.71-3.823-8.533-8.533-8.533h-34.133     c-4.71,0-8.533,3.823-8.533,8.533v51.2C187.733,115.644,191.556,119.467,196.267,119.467z M204.8,68.267h17.067V102.4H204.8     V68.267z"/>
                            <path d="M249.941,412.075c-1.536,1.621-2.475,3.84-2.475,6.059c0,2.219,0.939,4.437,2.475,6.059     c1.621,1.536,3.84,2.475,6.059,2.475c2.219,0,4.437-0.939,6.059-2.475c1.536-1.621,2.475-3.84,2.475-6.059     c0-2.219-0.939-4.437-2.475-6.059C258.816,408.917,253.184,408.917,249.941,412.075z"/>
                            <path d="M187.733,315.733c0,4.71,3.823,8.533,8.533,8.533H230.4c4.71,0,8.533-3.823,8.533-8.533v-51.2     c0-4.71-3.823-8.533-8.533-8.533h-34.133c-4.71,0-8.533,3.823-8.533,8.533V315.733z M204.8,273.067h17.067V307.2H204.8V273.067z"/>
                            <path d="M170.667,366.933c0,4.71,3.823,8.533,8.533,8.533h25.6v76.8c0,4.71,3.823,8.533,8.533,8.533     c4.71,0,8.533-3.823,8.533-8.533v-76.8h68.267v76.8c0,4.71,3.823,8.533,8.533,8.533s8.533-3.823,8.533-8.533v-76.8h25.6     c4.71,0,8.533-3.823,8.533-8.533s-3.823-8.533-8.533-8.533H179.2C174.49,358.4,170.667,362.223,170.667,366.933z"/>
                            <path d="M409.6,315.733c0,4.71,3.823,8.533,8.533,8.533h34.133c4.71,0,8.533-3.823,8.533-8.533v-51.2     c0-4.71-3.823-8.533-8.533-8.533h-34.133c-4.71,0-8.533,3.823-8.533,8.533V315.733z M426.667,273.067h17.067V307.2h-17.067     V273.067z"/>
                            <path d="M366.933,0H145.067c-4.71,0-8.533,3.823-8.533,8.533v443.733c0,4.71,3.823,8.533,8.533,8.533     c4.71,0,8.533-3.823,8.533-8.533v-435.2h204.8v435.2c0,4.71,3.823,8.533,8.533,8.533s8.533-3.823,8.533-8.533V8.533     C375.467,3.823,371.644,0,366.933,0z"/>
                        </g>
                    </g>
                </g>
            </svg>
            <br>
            <strong class="pb-3" >Your Strong Point</strong>
            <p class="pt-3">Add a description of your offer and key benefits. What it is and how it helps your customer. Add a description of your offer and key benefits. What it is and how it helps your customer</p>
            </div>
            <div class="col-md-4 strongPoint">
            <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 512 512"  viewBox="0 0 512 512" width="60"><g><g><path d="m494.398 167.687h-4.887l-45.821-123.365c-4.012-10.801-14.448-18.058-25.97-18.058h-323.441c-11.521 0-21.958 7.257-25.97 18.058l-45.82 123.365h-4.887c-9.706 0-17.602 7.896-17.602 17.602v14.142c0 9.706 7.896 17.602 17.602 17.602h2.602v164.39c0 4.142 3.357 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-164.39h117.76c6.59 0 12.786-2.566 17.447-7.227l85.589-85.591 85.591 85.591c4.66 4.66 10.856 7.226 17.446 7.226h117.76v19.884c0 4.142 3.357 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-19.884h2.602c9.705 0 17.602-7.896 17.602-17.602v-14.142c-.001-9.705-7.897-17.601-17.603-17.601zm-412.028-118.143c1.84-4.953 6.626-8.28 11.909-8.28h323.441c5.283 0 10.069 3.328 11.909 8.28l43.881 118.143h-104.253l-95.811-95.81c-4.66-4.66-10.855-7.227-17.446-7.227s-12.786 2.566-17.446 7.227l-95.811 95.81h-104.254zm414.63 149.887c0 1.435-1.167 2.602-2.602 2.602h-135.361c-2.584 0-5.014-1.006-6.84-2.833l-90.894-90.894c-1.407-1.407-3.314-2.197-5.304-2.197s-3.896.79-5.304 2.197l-90.893 90.894c-1.827 1.827-4.257 2.833-6.841 2.833h-135.359c-1.435 0-2.602-1.167-2.602-2.602v-14.142c0-1.435 1.167-2.602 2.602-2.602h128.248c1.989 0 3.896-.79 5.304-2.197l98.008-98.007c1.826-1.827 4.255-2.833 6.839-2.833s5.013 1.006 6.839 2.833l98.008 98.007c1.407 1.407 3.314 2.197 5.304 2.197h128.248c1.435 0 2.602 1.167 2.602 2.602v14.142z"/><path d="m450.962 425.126c4.143 0 7.5-3.358 7.5-7.5v-133.341c0-4.142-3.357-7.5-7.5-7.5h-101.017c-4.143 0-7.5 3.358-7.5 7.5v133.341c0 4.142 3.357 7.5 7.5 7.5zm-7.5-47.325h-35.509v-35.508h35.509zm-50.509 0h-35.508v-35.508h35.508zm50.509 32.325h-86.017v-17.325h86.017zm0-82.834h-35.509v-35.508h35.509zm-50.509-35.507v35.508h-35.508v-35.508z"/><path d="m162.055 425.126c4.143 0 7.5-3.358 7.5-7.5v-133.341c0-4.142-3.357-7.5-7.5-7.5h-101.017c-4.143 0-7.5 3.358-7.5 7.5v133.341c0 4.142 3.357 7.5 7.5 7.5zm-7.5-47.325h-35.508v-35.508h35.508zm-50.508 0h-35.509v-35.508h35.509zm50.508 32.325h-86.017v-17.325h86.017zm0-82.834h-35.508v-35.508h35.508zm-50.508-35.507v35.508h-35.509v-35.508z"/><path d="m280.244 309.11h-48.488c-4.143 0-7.5 3.358-7.5 7.5v32.325c0 4.142 3.357 7.5 7.5 7.5h48.488c4.143 0 7.5-3.358 7.5-7.5v-32.325c0-4.142-3.357-7.5-7.5-7.5zm-7.5 32.325h-33.488v-17.325h33.488z"/><path d="m295.825 214.583c0-21.959-17.865-39.825-39.825-39.825s-39.825 17.866-39.825 39.825 17.865 39.826 39.825 39.826 39.825-17.866 39.825-39.826zm-64.65 0c0-13.688 11.137-24.825 24.825-24.825s24.825 11.137 24.825 24.825-11.137 24.826-24.825 24.826-24.825-11.137-24.825-24.826z"/><path d="m504.5 436.39h-12.703v-164.39c0-4.142-3.357-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v164.39h-156.728v-152.105c0-4.142-3.357-7.5-7.5-7.5h-113.138c-4.143 0-7.5 3.358-7.5 7.5v152.105h-156.728v-19.884c0-4.142-3.357-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v19.884h-12.703c-4.143 0-7.5 3.358-7.5 7.5v34.346c0 4.142 3.357 7.5 7.5 7.5h497c4.143 0 7.5-3.358 7.5-7.5v-34.346c0-4.142-3.357-7.5-7.5-7.5zm-297.569-54.701h10.684c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-10.684v-74.904h98.139v144.605h-98.139zm290.069 89.047h-482v-19.346h482z"/></g></g></svg>
            <br>
            <strong class="pb-3">Your Strong Point</strong>
            <p class="pt-3">Add a description of your offer and key benefits. What it is and how it helps your customer. Add a description of your offer and key benefits. What it is and how it helps your customer</p>
            </div>
            <div class="col-md-4 strongPoint strongPoint3">
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="-16 0 480 480" width="60"><path d="m104 240h32v104c0 4.417969 3.582031 8 8 8h224c4.417969 0 8-3.582031 8-8v-104h32c3.234375 0 6.152344-1.949219 7.390625-4.9375s.550781-6.429688-1.734375-8.71875l-152-152c-3.125-3.121094-8.1875-3.121094-11.3125 0l-58.34375 58.34375v-20.6875h8c4.417969 0 8-3.582031 8-8v-32c0-4.417969-3.582031-8-8-8h-80c-4.417969 0-8 3.582031-8 8v32c0 4.417969 3.582031 8 8 8h8v84.6875l-29.65625 29.65625c-2.285156 2.289062-2.972656 5.730469-1.734375 8.71875s4.15625 4.9375 7.390625 4.9375zm176 96v-40c0-13.253906 10.746094-24 24-24s24 10.746094 24 24v40zm80 0h-16v-40c0-22.089844-17.910156-40-40-40s-40 17.910156-40 40v40h-112v-96h208zm-232-256h64v16h-64zm16 32h32v36.6875l-32 32zm112-20.6875 132.6875 132.6875h-265.375zm0 0"/><path d="m232 208h48c4.417969 0 8-3.582031 8-8v-40c0-17.671875-14.328125-32-32-32s-32 14.328125-32 32v40c0 4.417969 3.582031 8 8 8zm8-48c0-8.835938 7.164062-16 16-16s16 7.164062 16 16v32h-32zm0 0"/><path d="m368 368h-224c-4.417969 0-8 3.582031-8 8s3.582031 8 8 8h224c4.417969 0 8-3.582031 8-8s-3.582031-8-8-8zm0 0"/><path d="m368 400h-224c-4.417969 0-8 3.582031-8 8s3.582031 8 8 8h224c4.417969 0 8-3.582031 8-8s-3.582031-8-8-8zm0 0"/><path d="m400 80h16v-48h-96v16h80zm0 0"/><path d="m400 96h16v32h-16zm0 0"/><path d="m40 480h400c4.417969 0 8-3.582031 8-8v-464c0-4.417969-3.582031-8-8-8h-400c-4.417969 0-8 3.582031-8 8v40h-24c-4.417969 0-8 3.582031-8 8v32c0 4.417969 3.582031 8 8 8h24v120h-24c-4.417969 0-8 3.582031-8 8v32c0 4.417969 3.582031 8 8 8h24v120h-24c-4.417969 0-8 3.582031-8 8v32c0 4.417969 3.582031 8 8 8h24v40c0 4.417969 3.582031 8 8 8zm-24-416h48v16h-48zm0 168h48v16h-48zm32 32h24c4.417969 0 8-3.582031 8-8v-32c0-4.417969-3.582031-8-8-8h-24v-120h24c4.417969 0 8-3.582031 8-8v-32c0-4.417969-3.582031-8-8-8h-24v-32h384v448h-384v-32h24c4.417969 0 8-3.582031 8-8v-32c0-4.417969-3.582031-8-8-8h-24zm-32 136h48v16h-48zm0 0"/></svg>
            <br>
            <strong >Your Strong Point</strong>
            <p class="pt-3">Add a description of your offer and key benefits. What it is and how it helps your customer. Add a description of your offer and key benefits. What it is and how it helps your customer</p>
            </div>
        </div>
    </div>
</div>


<div class="section__wrapper template3_CTA" style= " background-image:url(http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_704907307-2.jpg); background-size:cover; background-position:center;">
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                    <div class="sideCard">
                        <h2>Clear value for your customer</h2>
                        <p>How will this help solve the customer's issues in the future. How will your product change your customer's life</p>
                        <a href="#2" class="btn primary sideCard">Find Out More</a>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="section__wrapper">
    <div class="container">
        <h2>Our Listings</h2>
        <hr class="section_hr">
        <div class="row">
            <div class="col-md-4 listings">
            <div class="card">
                
                <img src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/920x920.jpg" class="card-img-top" alt="...">
                
                <div class="card-body ">
                        <strong>Peter Cooper Village</strong>
                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        <div class="pricing_section">
                        <p class="pricing_info">255 m2</p>
                        <h4 class="pricing" >$350,000</h4>
                        </div>
                </div>
            </div>
            </div>
            <div class="col-md-4 listings">
            <div class="card">
                
                <img src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/920x920.jpg" class="card-img-top" alt="...">
                
                <div class="card-body ">
                        <strong>Peter Cooper Village</strong>
                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        <div class="pricing_section">
                        <p class="pricing_info">255 m2</p>
                        <h4 class="pricing" >$350,000</h4>
                        </div>
                </div>
            </div>
            </div>
            <div class="col-md-4 listings listing3">
            <div class="card">
                
                <img src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/920x920.jpg" class="card-img-top" alt="...">
                
                <div class="card-body ">
                        <strong>Peter Cooper Village</strong>
                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="pricing_section">
                        <p class="pricing_info">255 m2</p>
                        <h4 class="pricing" >$350,000</h4>
                        </div>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>

<div class="section__wrapper unique" style="background-image:url('http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_1717414708.jpg'); background-position:center;">
    <div class="container text-center">
    <i class="fas fa-building fa-5x mb-5"></i>

    <h2 class="text-white">Your Unique Selling Proposition</h2>
    <br>
    <a href="#2" class="btn primary">Find Out More</a>
    </div>
</div>

<div class="section__wrapper">
    <div class="container">
    <h2>What Clients Say</h2>
    <hr class="section_hr">
    <?php 
      
      get_template_part('template-parts/testimonials');
  ?>
    </div>
</div>


<?php
get_footer();