<?php
/**
Template Name: Landing Page 4
Template Post Type: landing-pages
 */

get_header(); ?>

<div class="page_banner page_banner_4 " style="background-image: url(<?php if(get_field('banner_image')):?><?php the_field('banner_image');?><?php else:?><?php echo get_template_directory_uri(); ?>/images/banner.jpg<?php endif;?>); background-size:cover; background-position: center center; background-attachment: fixed">
	<div class="container">
        <div class="row align-items-center">

		    <div class="col-lg-6 col-md-6 col-sm-12 splitBackground1" >
                <div class="">
                <h1 class=""><?php echo do_shortcode(get_field('banner_h1'));?></h1>              
                <p><?php echo do_shortcode(get_field('supporting_statement_header'));?></p>
                </div>
            </div>
            <div id="3" class="col-md-6 col-sm-12 splitBackground2" >
                <div class="template4_form ">
                    <div class="get-in-touch">
                    <h5 class="form_4_title">Lets get in touch</h5>
                    <h5 class=""><a href="tel: 1-555-555-5555">(555)-555-5555</a></h5>
                    </div>
                        <?php gravity_form( 3, $display_title = false, $display_description = false );?> 
                        
                    
                    
                </div>
            </div>
        </div>
	</div>
</div>


<div class="section__wrapper">
    <h2 class="text-center pb-5">Your Value Proposition</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center proposition">
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
            <h5 >ARCHITECTURAL DESIGN</h5>
            <p>Add a description of your offer and key benefits. What it is and how it helps your customer. </p>
            </div>
            <div class="col-md-4 text-center proposition">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="60" ><g id="Paint_roller-paint-tool-construction" data-name="Paint roller-paint-tool-construction"><path d="M62,10H60V8a1,1,0,0,0-1-1H56V4a1,1,0,0,0-1-1H7A1,1,0,0,0,6,4V7H3A1,1,0,0,0,2,8v6a1,1,0,0,0,1,1H6v3a1,1,0,0,0,1,1H55a1,1,0,0,0,1-1V15h3a1,1,0,0,0,1-1V12h1V26H30a1,1,0,0,0-1,1V38H26a1,1,0,0,0-1,1V57a5,5,0,0,0,10,0V39a1,1,0,0,0-1-1H31V28H62a1,1,0,0,0,1-1V11A1,1,0,0,0,62,10ZM54,5v8H52a1,1,0,0,1-1-1V10a1,1,0,0,0-1-1H46a1,1,0,0,0-1,1v1a1,1,0,0,1-2,0V9a1,1,0,0,0-1-1H32a1,1,0,0,0-1,1v3a1,1,0,0,1-2,0V11a1,1,0,0,0-1-1H25a1,1,0,0,0-1,1v2a1,1,0,0,1-2,0V9a1,1,0,0,0-1-1H16a1,1,0,0,0-1,1v2a1,1,0,0,1-2,0V8a1,1,0,0,0-1-1H8V5ZM4,13V9H6v4Zm4,4V9h3v2a3,3,0,0,0,6,0V10h3v3a3,3,0,0,0,6,0V12h1a3,3,0,0,0,6,0V10h8v1a3,3,0,0,0,6,0h2v1a3,3,0,0,0,3,3h2v2Zm50-4H56V9h2ZM30,60a3,3,0,0,1-3-3V44.005h1v4h2V44l3,0V57A3,3,0,0,1,30,60Zm3-18-6,0V40h6Z"/><rect x="28" y="50" width="2" height="2"/></g></svg>
            <br>
            <h5>RECONSTRUCTION SERVICES</h5>
            <p>Add a description of your offer and key benefits. What it is and how it helps your customer. </p>
            </div>
            <div class="col-md-4 text-center proposition3">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 496 496" style="enable-background:new 0 0 496 496;" xml:space="preserve">
                <g>
                    <g>
                        <rect x="272" y="432" width="16" height="16"/>
                    </g>
                </g>
                <g>
                    <g>
                        <rect x="80" y="432" width="176" height="16"/>
                    </g>
                </g>
                <g>
                    <g>
                        <rect x="48" y="432" width="16" height="16"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M438.616,0l-224,80H64v48h37.248l-19.2,64H24c-13.232,0-24,10.768-24,24v128c0,13.232,10.768,24,24,24h43.056l-8,16H56    c-30.88,0-56,25.12-56,56s25.12,56,56,56h224c30.88,0,56-25.12,56-56s-25.12-56-56-56h-3.056l-8-16H280c13.232,0,24-10.768,24-24    V243.632l61.656-53.976L432,123.312V152l22.784,197.904L416,388.688v53.768l-64,24V496h74.128l61.552-35.168L496,344V0H438.616z     M416,480h-48v-2.456l48-18V480z M432,19.352v15.104L310.544,80h-48.352L432,19.352z M272,400v16h16v-15.192    c5.096,1.04,9.832,3.072,14.024,5.856l-10.712,10.712l11.312,11.312l10.712-10.712c2.784,4.192,4.816,8.928,5.856,14.024H304v16    h15.192c-1.04,5.096-3.072,9.832-5.856,14.024l-10.712-10.712l-11.312,11.312l10.712,10.712    c-4.192,2.784-8.928,4.816-14.024,5.856V464h-16v16h-16v-16h-16v16h-16v-16h-16v16h-16v-16h-16v16h-16v-16h-16v16h-16v-16h-16v16    H96v-16H80v16H64v-16H48v15.192c-5.096-1.04-9.832-3.072-14.024-5.856l10.712-10.712l-11.312-11.312l-10.712,10.712    c-2.784-4.192-4.816-8.928-5.856-14.024H32v-16H16.808c1.04-5.096,3.072-9.832,5.856-14.024l10.712,10.712l11.312-11.312    l-10.712-10.712c4.192-2.784,8.928-4.816,14.024-5.856V416h16v-16h16v16h16v-16h16v16h16v-16h16v16h16v-16h16v16h16v-16h16v16h16    v-16h16v16h16v-16H272z M76.944,384l8-16h166.112l8,16H76.944z M288,344c0,4.408-3.592,8-8,8h-19.056H75.056H24    c-4.408,0-8-3.592-8-8v-24h272V344z M256,240v64H120v-64H256z M122.912,224l17.336-58.296c1.016-3.408,4.096-5.704,7.656-5.704    H248c4.408,0,8,3.592,8,8v56H122.912z M288,304h-16V168c0-13.232-10.768-24-24-24H147.904c-10.68,0-19.92,6.872-22.992,17.104    l-20.592,69.304L104.032,304H16v-24h32v-16H16v-16h32v-16H16v-16c0-4.408,3.592-8,8-8h69.952l24-80H288V304z M80,112V96h224v16H80    z M354.728,177.984L304,222.368v-48.952l34.976-13.992l80.856-58.528c1.544,2.4,3.512,4.472,5.784,6.184L354.728,177.984z     M416.448,83.6l-84.344,61.336L304,156.184V128h16V93.544l112-42v13.928C424.048,68.304,418.024,75.144,416.448,83.6z M440,96    c-4.408,0-8-3.592-8-8s3.592-8,8-8c4.408,0,8,3.592,8,8S444.408,96,440,96z M472.32,451.168L432,474.216v-78.904L467.312,360    h11.52L472.32,451.168z M479.976,344h-9.768L448,151.536v-41.008c9.288-3.312,16-12.112,16-22.528s-6.712-19.216-16-22.528V16h32    l0.016,327.432L479.976,344z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <rect x="208" y="256" width="32" height="16"/>
                    </g>
                </g>

            </svg>
            <br>
            <h5>COMPLEX CONSTRUCTION</h5>
            <p>Add a description of your offer and key benefits. What it is and how it helps your customer. </p>
            </div>
        </div>
    </div>
</div>


<div class="section__wrapper" style="background-image:url(http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_625774088.jpg); background-size:cover; ">
    <div class="container about_us">
        <div class="row">
            <div class="col-md-6 ">
                <h2>About Us?</h2>
                <br>
                <p >Add a description of your offer and key benefits. What it is and how it helps your customer.</p>
                <p>How will this help solve the customer's issues in the future.</p>
                <ul class="aboutUs">
                    <li>Encourage customer to complete your CTA.</li>
                    <li>Rhetorical question to reinforce your headline.</li>
                    <li>Encourage your customer.</li>
                </ul>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
</div>

<div class="section__wrapper">
    <div class="container">
        <div class="row text-center pt-5" id="counter">
            <div class="col-md-4 boxs">
                <div class="box text-center">
                <div id="shiva"><span class="count" data-count="42">0</span>
                <p class="pl-2 text-white">People In Our Team</p>
            </div>
                
                
                </div>
                
            </div>
            <div class="col-md-4 boxs">
            <div class="box text-center">
            <div id="shiva"><span class="count" data-count="231">0</span>
            <p class="pl-2 text-white">Value Proposition</p>
        </div>
                </div>
                
            </div>
            <div class="col-md-4">
            <div class="box text-center">
            <div id="shiva"><span class="count" data-count="138">0</span>
            <p class="pl-2 text-white">Houses We Built</p>
        </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="section__wrapper">
    <div class="container text-center what-we-do">
        <h2>What We Do</h2>
        <p>Encourage customer to complete your CTA</p>
        <div class="row align-items-center">
            <div class="col-md-4 boxs">
                <div class="card " >
                    <div class="card-body text-center">
                        <h3 class="card-title">Private</h3>
                        <h6 class="card-subtitle mb-2 text-muted">Service name</h6>
                        <img class="card-image-middle" src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/office_buildings_and_sky.width-1440.jpg" alt="">
                        <br>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 boxs middle_box">
            <div class="card" >
                    <div class="card-body text-center">
                        <h3 class="card-title">Business</h3>
                        <h6 class="card-subtitle mb-2 text-muted">Service name</h6>
                        <img src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/office_buildings_and_sky.width-1440.jpg" alt="">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card" >
                    <div class="card-body text-center">
                        <h3 class="card-title">Private</h3>
                        <h6 class="card-subtitle mb-2 text-muted">Service name</h6>
                        <img src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/office_buildings_and_sky.width-1440.jpg" alt="">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="#3" class="btn secondary mt-5">Contact Us</a>
    </div>
</div>

<div class="section__wrapper">
    <div class="container">
        <h2 class="text-center">Our Implementation</h2>
        <p class="text-center">Encourage your customer</p>
        <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 p-2">
                <a href="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_189023420.jpg" class="fancybox"><img src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_189023420.jpg" alt=""></a> 
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 p-2">
                <a href="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_1716849496.jpg" class="fancybox"><img src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_1716849496.jpg" alt=""></a>                 </div>
                <div class="col-sm-12 col-md-6 col-lg-4 p-2">
                <a href="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_361283462.jpg" class="fancybox"><img src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_361283462.jpg" alt=""></a>                 </div>
                <div class="col-sm-12 col-md-6 col-lg-4 p-2">
                <a href="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_539126530.jpg" class="fancybox"><img src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_539126530.jpg" alt=""></a>                 </div>
                <div class="col-sm-12 col-md-6 col-lg-4 p-2">
                <a href="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_1017132592-1.jpg" class="fancybox"><img src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_1017132592-1.jpg" alt=""></a>                 </div>
                <div class="col-sm-12 col-md-6 col-lg-4 p-2">
                <a href="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_225600154.jpg" class="fancybox"><img src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_225600154.jpg" alt=""></a>                 </div>
        </div>
    </div>
</div>

<div class="section__wrapper">
    <div class="container-fluid text-center">
        <h2 class="text-center">What They Say About Us</h2>
        <?php get_template_part('template-parts/testimonials');?>
    </div>
</div>

<script>
var a = 0;
jQuery(document).ready(function($) { 
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.count').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});
});
</script>
<?php
get_footer();