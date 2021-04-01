<?php
/**
Template Name: Landing Page 2
Template Post Type: landing-pages
 */

get_header(); ?>

<div style="background-image: url('http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_1404205535-1-scaled.jpg'); background-size:contain;">
<div class="section__wrapper" >
	<div class="container">
		<div class="landing2-banner text-center">
            <h1><?php echo do_shortcode(get_field('banner_h1'));?></h1>
            <div class="subtext">
			<h5><?php if(get_field('supporting_statement_header')):?><?php echo do_shortcode(get_field('supporting_statement_header'));?><?php else:?>Subheading<?php endif;?></h5>
            </div>
            <br>
            <div>
            <div class="row form__row">
                <div class="col-6 headshot__col" id="1">
                <img class="headShot"  src="http://staging.cybermark.com/mktpltfrm/wp-content/uploads/2020/09/shutterstock_490411276-3-min.png" alt="">
                <div class="image__banner">
                    <h5>John Doe</h5>
                    <p>42 y.o, Personal Agent</p>
                 </div>
                </div>
                <div class="col-6 text-center form__col">
                    <h2>Get Insurance For <strong>Free!</strong></h2>
                    <h5>*Fill In The Form To Get The Benefits</h5>
                <?php gravity_form( 1, $display_title = false, $display_description = false );?>
                </div>
            </div>
            </div>
		</div>
	</div>
</div>



<div class="insurance_benefits">
    <div class="container">
    <div class="row text-center align-items-center">
            <div class="col-6 text-left">
                <h2 class="pt-2">Insurance Benefits</h2>
            </div>
            <div class="col-6 text-right">
                <a href="#1" class="btn secondary contact">Join Us </a>
            </div>
    </div>
    </div>
    </div>
<div class="section__wrapper">
    <div class="container">


        <div class="row">
            <div class="col-lg-3 col-md-6 feature">
            <div class="card card_template2">
                <hr class="card_hr">
                    <div class="card-body text-center">
                        <div class="p-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 512 512"  viewBox="0 0 512 512" width="60"><g><g><path d="m170.652 136.8c-3.335-2.457-8.033-1.743-10.488 1.594l-14.845 20.169-5.076-6.972c-2.438-3.348-7.13-4.088-10.48-1.649-3.349 2.439-4.088 7.132-1.649 10.481l8.757 12.026c1.95 2.677 5.091 4.28 8.402 4.289h.026c3.302 0 6.439-1.585 8.397-4.245l18.552-25.204c2.454-3.337 1.74-8.033-1.596-10.489z"/><path d="m170.652 259.827c-3.335-2.457-8.033-1.743-10.488 1.594l-14.845 20.168-5.076-6.971c-2.439-3.349-7.129-4.089-10.481-1.65-3.349 2.439-4.088 7.131-1.649 10.48l8.757 12.028c1.949 2.676 5.09 4.28 8.401 4.288.009.001.018.001.026.001 3.302 0 6.44-1.586 8.398-4.246l18.552-25.203c2.455-3.337 1.741-8.034-1.595-10.489z"/><path d="m170.652 377.611c-3.335-2.457-8.033-1.743-10.488 1.594l-14.845 20.168-5.076-6.971c-2.439-3.348-7.129-4.089-10.481-1.65-3.349 2.439-4.088 7.131-1.649 10.48l8.757 12.028c1.949 2.676 5.09 4.28 8.401 4.288.009.001.018.001.026.001 3.302 0 6.44-1.586 8.398-4.246l18.552-25.203c2.455-3.336 1.741-8.033-1.595-10.489z"/><path d="m228.027 147.871h92.716c4.143 0 7.502-3.358 7.502-7.502s-3.359-7.502-7.502-7.502h-92.716c-4.143 0-7.502 3.358-7.502 7.502s3.359 7.502 7.502 7.502z"/><path d="m228.027 179.212h46.358c4.143 0 7.502-3.358 7.502-7.502s-3.359-7.502-7.502-7.502h-46.358c-4.143 0-7.502 3.358-7.502 7.502s3.359 7.502 7.502 7.502z"/><path d="m228.027 268.276h62.208c4.143 0 7.502-3.358 7.502-7.502s-3.359-7.502-7.502-7.502h-62.208c-4.143 0-7.502 3.358-7.502 7.502s3.359 7.502 7.502 7.502z"/><path d="m274.385 299.618c4.143 0 7.502-3.358 7.502-7.502s-3.359-7.502-7.502-7.502h-46.358c-4.143 0-7.502 3.358-7.502 7.502s3.359 7.502 7.502 7.502z"/><path d="m179.087 108.047h-57.794c-10.529 0-19.096 8.567-19.096 19.096v57.794c0 10.529 8.567 19.096 19.096 19.096h57.794c10.529 0 19.096-8.567 19.096-19.096v-57.794c0-10.529-8.566-19.096-19.096-19.096zm4.093 76.89c0 2.256-1.836 4.092-4.092 4.092h-57.794c-2.256 0-4.092-1.835-4.092-4.092v-57.794c0-2.256 1.836-4.092 4.092-4.092h57.794c2.256 0 4.092 1.835 4.092 4.092z"/><path d="m179.087 228.453h-57.794c-10.529 0-19.096 8.567-19.096 19.096v57.794c0 10.529 8.567 19.096 19.096 19.096h57.794c10.529 0 19.096-8.567 19.096-19.096v-57.794c0-10.53-8.566-19.096-19.096-19.096zm4.093 76.89c0 2.256-1.836 4.092-4.092 4.092h-57.794c-2.256 0-4.092-1.835-4.092-4.092v-57.794c0-2.256 1.836-4.092 4.092-4.092h57.794c2.256 0 4.092 1.835 4.092 4.092z"/><path d="m179.087 348.857h-57.794c-10.529 0-19.096 8.567-19.096 19.096v57.794c0 10.529 8.567 19.096 19.096 19.096h57.794c10.529 0 19.096-8.567 19.096-19.096v-57.794c0-10.529-8.566-19.096-19.096-19.096zm4.093 76.89c0 2.256-1.836 4.092-4.092 4.092h-57.794c-2.256 0-4.092-1.835-4.092-4.092v-57.794c0-2.256 1.836-4.092 4.092-4.092h57.794c2.256 0 4.092 1.835 4.092 4.092z"/><path d="m465.253 128.318-11.906-7.54c-6.182-3.916-13.52-5.187-20.658-3.584-7.139 1.605-13.226 5.894-17.139 12.077l-10.918 17.252-15.16 23.955-17.144 27.091v-112.608c0-7.755-6.309-14.064-14.064-14.064h-53.756v-15.003h71.966c5.987 0 10.858 4.87 10.858 10.857v64.968c0 4.144 3.359 7.502 7.502 7.502s7.502-3.358 7.502-7.502v-64.968c0-14.259-11.601-25.861-25.861-25.861h-73.518c-3.072-7.417-10.381-12.651-18.895-12.651h-19.38v-7.555c0-11.404-9.279-20.684-20.685-20.684h-51.638c-11.406 0-20.685 9.28-20.685 20.685v7.555h-19.38c-8.514 0-15.823 5.234-18.894 12.651h-73.519c-14.26 0-25.861 11.601-25.861 25.861v419.388c0 14.259 11.601 25.861 25.861 25.861h316.595c14.26 0 25.861-11.602 25.861-25.861v-168.208c0-4.144-3.359-7.502-7.502-7.502s-7.502 3.358-7.502 7.502v168.207c0 5.987-4.871 10.857-10.858 10.857h-316.594c-5.987 0-10.858-4.87-10.858-10.857v-419.388c0-5.987 4.871-10.857 10.858-10.857h71.966v15.004h-53.756c-7.755 0-14.064 6.309-14.064 14.064v382.967c0 7.755 6.309 14.064 14.064 14.064h280.174c7.755 0 14.064-6.309 14.064-14.064v-141.572l75.331-119.037c.001-.002.003-.005.004-.007l15.155-23.947 10.925-17.263c8.073-12.759 4.264-29.709-8.491-37.785zm-29.274 3.515c3.229-.728 6.546-.151 9.341 1.62l11.906 7.541c5.768 3.652 7.49 11.316 3.839 17.085l-6.912 10.922-32.832-20.791 6.908-10.915c1.769-2.797 4.521-4.737 7.75-5.462zm-142.082 290.406c-1.42 2.242-3.01 4.356-4.751 6.335-2.355-3.158-5.031-6.017-7.974-8.537l139.787-220.744 10.013 6.341zm-51.227 44.741c-.052-.018-.117-.053-.142-.053-.005 0-.008.001-.01.005 16.25-67.488 8.339-34.633 10.598-44.015 9.746 1.629 18.807 7.108 24.769 15.685-39.722 32.008-34.651 27.865-35.215 28.378zm170.628-306.092 32.832 20.791-7.136 11.276-32.832-20.791zm-266.448-112.034c.005-.092.011-.184.013-.277.001-.032-.003-.063-.002-.095.108-2.906 2.5-5.24 5.433-5.24h21.491c7.109 0 12.893-5.784 12.893-12.893v-9.665c0-3.133 2.549-5.681 5.682-5.681h51.638c3.133 0 5.682 2.548 5.682 5.681v9.665c0 7.109 5.784 12.893 12.893 12.893h21.491c2.933 0 5.325 2.333 5.433 5.24 0 .032-.003.063-.002.095.002.091.008.183.013.275v22.045h-142.658zm-67.82 37.047h278.295v135.377l-78.516 124.072c-2.216 3.501-1.174 8.136 2.327 10.351 3.486 2.205 8.126 1.189 10.351-2.328l106.651-168.531 10.144 6.423-139.787 220.745c-3.536-1.583-7.264-2.78-11.126-3.558 1.046-2.42 2.276-4.762 3.696-7.006l11.662-18.427c2.216-3.501 1.174-8.135-2.327-10.351-3.502-2.215-8.136-1.173-10.351 2.328l-11.661 18.426c-3.853 6.085-6.661 12.718-8.348 19.716 0 .002-.001.003-.001.005l-12.088 50.151c-.299 1.239-.438 2.478-.435 3.696h-148.486zm278.295 381.088h-90.753l25.747-20.747c5.604-4.516 10.4-9.891 14.254-15.978l50.752-80.198z"/></g></g></svg>
                        </div>
                       <div class="p-2"><h5 class="card-title">Benefit or Feature</h5></div> 
                       <div > <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p></div>

                     </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature">
            <div class="card card_template2">
            <hr class="card_hr">
                    <div class="card-body text-center">
                        <div class="p-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64"  viewBox="0 0 64 64" width="65"><g id="Icons"><g><path d="m58 11.5h-8v1h8c.827 0 1.5.673 1.5 1.5v32c0 .827-.673 1.5-1.5 1.5-10.748 0-41.545 0-52 0-.827 0-1.5-.673-1.5-1.5v-32c0-.827.673-1.5 1.5-1.5h8.01v-1h-8.01c-1.379 0-2.5 1.122-2.5 2.5v32c0 1.378 1.121 2.5 2.5 2.5h20.74l-1.164 7h-3.576c-1.379 0-2.5 1.122-2.5 2.5v1c0 .827.673 1.5 1.5 1.5h22c.827 0 1.5-.673 1.5-1.5v-1c0-1.378-1.121-2.5-2.5-2.5h-3.576l-1.164-7h20.74c1.379 0 2.5-1.122 2.5-2.5v-32c0-1.378-1.121-2.5-2.5-2.5zm-14.5 46.5v1c0 .276-.225.5-.5.5h-22c-.275 0-.5-.224-.5-.5v-1c0-.827.673-1.5 1.5-1.5h20c.827 0 1.5.673 1.5 1.5zm-6.09-2.5h-10.82l1.164-7h8.492z"/><path d="m57.5 15v26c0 .276-.225.5-.5.5h-50c-.275 0-.5-.224-.5-.5v-26c0-.276.225-.5.5-.5h7.01v-1h-7.01c-.827 0-1.5.673-1.5 1.5v26c0 .827.673 1.5 1.5 1.5h50c.827 0 1.5-.673 1.5-1.5v-26c0-.827-.673-1.5-1.5-1.5h-7v1h7c.275 0 .5.224.5.5z"/><path d="m31.366 37.038c.386.17.843.171 1.23.004h.001c8.803-3.815 12.903-9.46 12.903-17.762v-6.525c0-.661-.429-1.248-1.043-1.427-1.985-.58-3.658-2.019-4.592-3.946-.262-.544-.786-.882-1.365-.882h-12.994c-.578 0-1.102.338-1.366.882-.929 1.923-2.603 3.36-4.591 3.942-.612.179-1.04.765-1.042 1.425l-.007 6.531c0 8.356 3.968 13.832 12.866 17.758zm-11.859-24.288c.001-.219.134-.411.323-.466 2.259-.662 4.158-2.29 5.21-4.466.095-.196.273-.318.466-.318h12.994c.192 0 .37.122.465.317 1.057 2.182 2.956 3.812 5.212 4.471.19.056.323.248.323.467v6.525c0 7.854-3.908 13.207-12.3 16.845-.133.058-.297.057-.43-.001-8.486-3.745-12.27-8.939-12.27-16.844z"/><path d="m57 43.5h-4c-.827 0-1.5.673-1.5 1.5s.673 1.5 1.5 1.5h4c.827 0 1.5-.673 1.5-1.5s-.673-1.5-1.5-1.5zm0 2h-4c-.275 0-.5-.224-.5-.5s.225-.5.5-.5h4c.275 0 .5.224.5.5s-.225.5-.5.5z"/><path d="m47.5 45c0 .827.673 1.5 1.5 1.5s1.5-.673 1.5-1.5-.673-1.5-1.5-1.5-1.5.673-1.5 1.5zm2 0c0 .276-.225.5-.5.5s-.5-.224-.5-.5.225-.5.5-.5.5.224.5.5z"/><path d="m30.99 27.646 8.97-8.97c.585-.585.587-1.534 0-2.121l-1.414-1.415c-.588-.586-1.538-.584-2.122 0l-6.494 6.495-2.354-2.354c-.586-.584-1.536-.586-2.122 0l-1.414 1.414c-.585.585-.585 1.536 0 2.121l4.829 4.828c.582.587 1.533.591 2.121.002zm-6.243-6.242 1.414-1.414c.196-.195.511-.196.708 0l2.707 2.707c.188.188.52.188.707 0l6.848-6.849c.195-.194.513-.196.708 0l1.414 1.415c.196.195.195.511 0 .707l-8.97 8.97c-.195.194-.51.197-.707 0l-4.829-4.829c-.195-.195-.195-.512 0-.707z"/><path d="m31.411 40.321c.369.133.774.137 1.134-.006 10.736-4.27 15.955-11.15 15.955-21.035v-9.21c0-.888-.774-1.604-1.633-1.496-2.231.277-4.343-1.425-4.712-3.794-.106-.742-.722-1.28-1.465-1.28h-17.38c-.742 0-1.358.538-1.464 1.273-.37 2.368-2.479 4.071-4.706 3.8-.896-.1-1.63.618-1.63 1.497 0 5.007.004 2.788-.01 9.21 0 9.8 5.198 16.68 15.911 21.041zm-14.901-30.251c0-.287.224-.534.51-.504 2.747.333 5.362-1.745 5.815-4.645.035-.244.234-.421.475-.421h17.38c.24 0 .439.177.476.427.453 2.904 3.073 4.989 5.824 4.639.273-.032.51.226.51.504v9.21c0 9.428-5.013 16.005-15.325 20.106-.123.049-.277.047-.406.001-10.417-4.241-15.269-10.63-15.269-20.106.013-6.452.01-4.236.01-9.211z"/></g></g></svg>
                        </div>
                       <div class="p-2"><h5 class="card-title">Benefit or Feature</h5></div> 
                       <div> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p></div>

                     </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature">
            <div class="card card_template2">
            <hr class="card_hr">
                    <div class="card-body text-center">
                        <div class="p-2 mb-2">
                        <svg width="60" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M157.656,338.248L84.28,264.872c-0.096-0.096-0.184-0.184-0.28-0.28l-28-28v-96.688c0-15.44-12.56-28-28-28    s-28,12.56-28,28v176c0,1.792,0.6,3.52,1.696,4.928L72,410.664v61.24c0,4.424,3.584,8,8,8h72c4.416,0,8-3.576,8-8v-128    C160,341.776,159.16,339.744,157.656,338.248z M144,463.904H88v-56c0-1.792-0.6-3.52-1.696-4.928L16,313.144v-173.24    c0-6.616,5.384-12,12-12s12,5.384,12,12v100c0,2.128,0.84,4.16,2.344,5.656l11.6,11.6C41.272,260.912,32,272.664,32,286.528    c0,8.184,3.184,15.872,8.976,21.656l49.368,49.376l11.312-11.312L52.28,296.872c-2.72-2.728-4.28-6.488-4.28-10.344    c0-8.064,6.56-14.624,14.632-14.624c3.816,0,7.4,1.448,10.144,4.088L144,347.216V463.904z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M452,111.904c-15.44,0-28,12.56-28,28v96.688l-28,28c-0.096,0.096-0.192,0.184-0.288,0.28l-73.368,73.376    c-1.504,1.496-2.344,3.528-2.344,5.656v128c0,4.424,3.584,8,8,8h72c4.416,0,8-3.576,8-8v-61.24l70.304-89.832    c1.096-1.408,1.696-3.136,1.696-4.928v-176C480,124.464,467.44,111.904,452,111.904z M464,313.144l-70.304,89.832    c-1.096,1.408-1.696,3.136-1.696,4.928v56h-56V347.216l71.224-71.224c2.744-2.64,6.336-4.088,10.144-4.088    c8.072,0,14.632,6.56,14.632,14.624c0,3.848-1.56,7.616-4.288,10.344l-49.368,49.376l11.312,11.312l49.368-49.376    C444.816,302.4,448,294.72,448,286.528c0-13.864-9.272-25.616-21.944-29.368l11.6-11.6c1.504-1.496,2.344-3.528,2.344-5.656v-100    c0-6.616,5.384-12,12-12c6.616,0,12,5.384,12,12V313.144z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M217.52,302.168l-2.496,15.8c5.472,0.856,11.08,1.44,16.656,1.736l0.832-15.984    C227.488,303.464,222.44,302.936,217.52,302.168z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M97.792,182.576l-15.808,2.52c0.88,5.512,2.048,11.016,3.488,16.368l15.456-4.144    C99.64,192.504,98.584,187.544,97.792,182.576z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M105.576,211.64l-14.928,5.768c2.008,5.2,4.304,10.344,6.824,15.28l14.248-7.28    C109.456,220.968,107.384,216.336,105.576,211.64z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M161.648,280.768l-8.728,13.408c4.656,3.032,9.536,5.848,14.504,8.384l7.264-14.272    C170.216,286.016,165.832,283.48,161.648,280.768z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M291.648,294.36c-4.648,1.784-9.472,3.344-14.336,4.648l4.144,15.456c5.4-1.448,10.752-3.176,15.92-5.168L291.648,294.36z    "/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M318.448,280.704c-4.208,2.744-8.6,5.272-13.032,7.528l7.256,14.264c4.944-2.52,9.824-5.344,14.504-8.392L318.448,280.704    z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M262.576,302.144c-4.968,0.784-10.008,1.304-14.992,1.56l0.832,15.992c5.528-0.288,11.136-0.872,16.656-1.752    L262.576,302.144z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M97.304,87.44c-2.52,4.968-4.808,10.12-6.784,15.304l14.944,5.704c1.784-4.664,3.84-9.296,6.104-13.776L97.304,87.44z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M138.264,261.816l-11.304,11.312c3.944,3.944,8.128,7.712,12.432,11.2l10.072-12.432    C145.584,268.752,141.816,265.368,138.264,261.816z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M382.296,182.048c-0.768,4.952-1.8,9.912-3.08,14.744l15.472,4.096c1.416-5.368,2.568-10.88,3.424-16.4L382.296,182.048z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M115.504,59.384c-3.496,4.32-6.808,8.872-9.84,13.552l13.424,8.704c2.728-4.2,5.704-8.304,8.848-12.176L115.504,59.384z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M85.376,118.688c-1.424,5.36-2.584,10.872-3.448,16.384l15.808,2.472c0.776-4.952,1.824-9.912,3.104-14.744    L85.376,118.688z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M119.272,238.448l-13.4,8.752c3.032,4.648,6.352,9.192,9.864,13.512l12.416-10.096    C124.992,246.728,122,242.632,119.272,238.448z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M96,159.904c0-2.464,0.064-4.912,0.184-7.384l-15.976-0.816c-0.136,2.736-0.208,5.472-0.208,8.2    c0,2.84,0.072,5.696,0.224,8.544l15.976-0.856C96.064,165.04,96,162.464,96,159.904z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M139.08,35.728c-4.24,3.464-8.352,7.176-12.216,11.04l-0.168,0.168l11.472,11.152c3.496-3.488,7.2-6.832,11.04-9.968    L139.08,35.728z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M198.312,5.4c-5.392,1.456-10.744,3.2-15.912,5.184l5.752,14.936c4.648-1.8,9.472-3.368,14.328-4.672L198.312,5.4z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M361.032,237.984c-2.696,4.168-5.664,8.272-8.832,12.208l12.464,10.032c3.504-4.36,6.808-8.92,9.808-13.552    L361.032,237.984z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M347.816,267.048l-5.992-5.32c-3.56,3.56-7.328,6.96-11.192,10.104l10.08,12.424c4.288-3.496,8.472-7.264,12.52-11.312    L347.816,267.048z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M340.416,35.328L330.36,47.776c3.904,3.16,7.68,6.536,11.208,10.064l11.304-11.328    C348.944,42.6,344.752,38.832,340.416,35.328z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M374.616,211.144c-1.784,4.696-3.824,9.328-6.08,13.776l14.272,7.232c2.512-4.952,4.784-10.096,6.768-15.32    L374.616,211.144z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M394.472,118.096l-15.448,4.16c1.296,4.816,2.352,9.776,3.16,14.744l15.792-2.552    C397.088,128.944,395.912,123.44,394.472,118.096z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M364.104,58.912l-12.4,10.104c3.184,3.904,6.176,7.992,8.904,12.168L374,72.416    C370.968,67.792,367.64,63.248,364.104,58.912z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M382.424,86.888l-14.24,7.312c2.288,4.456,4.352,9.08,6.16,13.744l14.928-5.768    C387.272,96.992,384.96,91.848,382.424,86.888z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M399.76,151.112l-15.976,0.872c0.144,2.648,0.216,5.296,0.216,7.92c0,2.384-0.056,4.768-0.176,7.16l15.976,0.8    c0.136-2.664,0.2-5.312,0.2-7.968C400,156.968,399.92,154.04,399.76,151.112z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M281.104,5.24l-4.096,15.472c4.84,1.28,9.664,2.832,14.336,4.616l5.704-14.952C291.848,8.4,286.488,6.664,281.104,5.24z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M312.352,17.152l-7.232,14.264c4.472,2.272,8.864,4.8,13.048,7.504l8.704-13.416    C322.208,22.48,317.328,19.672,312.352,17.152z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M231.336,0.12c-5.528,0.296-11.136,0.888-16.648,1.776l2.512,15.8c4.968-0.792,10.008-1.328,14.984-1.584L231.336,0.12z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M167.112,17.432c-4.936,2.52-9.816,5.36-14.496,8.416l8.752,13.392c4.208-2.752,8.592-5.296,13.024-7.56L167.112,17.432z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M188.456,294.4l-5.736,14.944c5.192,1.992,10.552,3.728,15.936,5.168l4.12-15.472    C197.936,297.752,193.12,296.192,188.456,294.4z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M248.072,0.096l-0.808,15.984c5.024,0.248,10.072,0.768,14.992,1.536L264.728,1.8    C259.256,0.96,253.656,0.384,248.072,0.096z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M240,159.904c-8.824,0-16-7.176-16-16c0-8.824,7.176-16,16-16c8.824,0,16,7.176,16,16h16c0-14.872-10.24-27.288-24-30.864    v-9.136h-16v9.136c-13.76,3.576-24,15.992-24,30.864c0,17.648,14.352,32,32,32c8.824,0,16,7.176,16,16c0,8.824-7.176,16-16,16    c-8.824,0-16-7.176-16-16h-16c0,14.872,10.24,27.288,24,30.864v9.136h16v-9.136c13.76-3.576,24-15.992,24-30.864    C272,174.256,257.648,159.904,240,159.904z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M325,113.656l-13-10.392v-47.36c0-4.424-3.584-8-8-8h-32c-4.416,0-8,3.576-8,8v8.952l-19-15.2    c-2.92-2.328-7.072-2.328-9.992,0l-80,64c-1.904,1.52-3.008,3.816-3.008,6.248v104c0,22.056,17.944,40,40,40h96    c22.056,0,40-17.944,40-40v-104C328,117.472,326.896,115.176,325,113.656z M312,223.904c0,13.232-10.768,24-24,24h-96    c-13.232,0-24-10.768-24-24v-100.16l72-57.6l27,21.608c2.4,1.92,5.688,2.288,8.464,0.96S280,84.584,280,81.504v-17.6h16v43.2    c0,2.432,1.104,4.728,3,6.248l13,10.392V223.904z"/>
                                </g>
                            </g>

                            </svg>
                        </div>
                       <div class="p-2"><h5 class="card-title">Benefit or Feature</h5></div> 
                       <div > <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p></div>

                     </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature">
            <div class="card card_template2">
            <hr class="card_hr">
                    <div class="card-body text-center">
                        <div class="p-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 128 128" width="65"><title>CAR </title><path d="M113.854,55.4h-8.1a1.75,1.75,0,0,0-1.75,1.75V58.9h-.5a1.753,1.753,0,0,0-1.679,1.254l-.789,2.672-6.395-16.7A8.969,8.969,0,0,0,86.31,40.4H79.521a38.509,38.509,0,0,0,1.627-4.985,50.416,50.416,0,0,0,1.45-13.2,1.751,1.751,0,0,0-1.222-1.631c-7.917-2.505-13.856-4.9-16.692-6.1a1.755,1.755,0,0,0-1.368,0c-2.836,1.2-8.775,3.6-16.692,6.1A1.751,1.751,0,0,0,45.4,22.208a50.412,50.412,0,0,0,1.45,13.2A38.509,38.509,0,0,0,48.479,40.4H41.69a8.969,8.969,0,0,0-8.327,5.729l-6.395,16.7-.789-2.672A1.753,1.753,0,0,0,24.5,58.9H24v-1.75a1.75,1.75,0,0,0-1.75-1.75h-8.1a1.751,1.751,0,0,0-1.75,1.75v6.375a1.75,1.75,0,0,0,1.75,1.75h8.1a1.742,1.742,0,0,0,1.524-.905l1.1,3.708L18.547,79.666c-.007.013-.01.032-.016.045a1.737,1.737,0,0,0-.2.793V96.519a5.184,5.184,0,0,0,4.864,5.159v5.756a6.237,6.237,0,0,0,6.23,6.229h6.885a6.236,6.236,0,0,0,6.229-6.229v-5.723H85.459v5.723a6.236,6.236,0,0,0,6.229,6.229h6.885a6.237,6.237,0,0,0,6.23-6.229v-5.756a5.184,5.184,0,0,0,4.864-5.159V80.5a1.724,1.724,0,0,0-.2-.805.318.318,0,0,0-.009-.033L103.13,68.074l1.1-3.708a1.743,1.743,0,0,0,1.524.905h8.1a1.75,1.75,0,0,0,1.75-1.75V57.146A1.751,1.751,0,0,0,113.854,55.4ZM20.5,61.771H15.9V58.9h4.6ZM98.992,86.307a4.052,4.052,0,1,1-4.053-4.053A4.057,4.057,0,0,1,98.992,86.307ZM23.031,78.754l4.762-8.73h72.414l4.762,8.73Zm54.64,3.5L76.647,85.24H51.353l-1.024-2.986ZM37.112,86.307a4.052,4.052,0,1,1-4.051-4.053A4.056,4.056,0,0,1,37.112,86.307ZM89.979,60.524H38.021L42.092,49.9H54.656a24.965,24.965,0,0,0,8.717,5.579,1.753,1.753,0,0,0,1.254,0A24.965,24.965,0,0,0,73.344,49.9H85.909ZM64,17.986c2.934,1.225,8.23,3.319,15.106,5.54a47.039,47.039,0,0,1-1.35,11.023c-2.2,8.667-6.829,14.52-13.756,17.408-6.927-2.888-11.553-8.741-13.756-17.408a47.028,47.028,0,0,1-1.35-11.023C55.77,21.305,61.066,19.211,64,17.986ZM36.631,47.376A5.451,5.451,0,0,1,41.69,43.9h8.444a27.878,27.878,0,0,0,1.57,2.5H41.69a2.929,2.929,0,0,0-2.723,1.875L33.843,61.648a1.749,1.749,0,0,0,1.634,2.376H92.523a1.749,1.749,0,0,0,1.634-2.376L89.035,48.272A2.935,2.935,0,0,0,86.31,46.4H76.3a27.878,27.878,0,0,0,1.57-2.5H86.31a5.451,5.451,0,0,1,5.059,3.48L98.7,66.524H29.3Zm2.41,60.058a2.733,2.733,0,0,1-2.729,2.729H29.427a2.733,2.733,0,0,1-2.73-2.729v-5.723H39.041Zm59.532,2.729H91.688a2.733,2.733,0,0,1-2.729-2.729v-5.723H101.3v5.723A2.733,2.733,0,0,1,98.573,110.163Zm7.594-13.644a1.694,1.694,0,0,1-1.692,1.692H23.525a1.694,1.694,0,0,1-1.692-1.692V82.254H26.7a7.552,7.552,0,1,0,12.724,0h7.207l1.818,5.3A1.749,1.749,0,0,0,50.1,88.74H77.9a1.749,1.749,0,0,0,1.656-1.183l1.818-5.3h7.207a7.552,7.552,0,1,0,12.724,0h4.865ZM112.1,61.771h-4.6V58.9h4.6Z"/><path d="M60.651,39.163a1.747,1.747,0,0,0,1.251.527h0a1.748,1.748,0,0,0,1.25-.525l8.36-8.537a1.75,1.75,0,1,0-2.5-2.449l-7.108,7.258L58.989,32.45a1.75,1.75,0,1,0-2.5,2.445Z"/></svg>
                        </div>
                       <div class="p-2"><h5 class="card-title">Benefit or Feature</h5></div> 
                       <div > <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p></div>

                     </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section__wrapper" style="background-image:url(https://onlyvectorbackgrounds.com/wp-content/uploads/2018/10/Abstract-Geometric-Background-Dark.jpg); background-size:cover;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 ourCompany">
                <h2 class="text-white">Our Company:</h2>
                <p class="text-white">Add a description of your offer and key benefits.</p>
                <p class="text-white">How will this help solve the customer's issues in the future. A few words about your product/offer.</p>
                <a href="#1" class="btn primary">More Info</a>
            </div>
            <div class="col-md-6">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/9vQK_HbsgKo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<div class="section__wrapper special">
    <div class="container mb-5">
        <h2 class="text-center">Clear Value for Your Target Customer</h2>
        <h5 class="text-center supporting_text">A supporting statement for your value proposition to encourage customers to complete your CTA</h5>
    
        <div class="row ">
        <div class="col-md-4 benefits">
        <div class="card card_template2">
                
                <img src="https://i.pinimg.com/originals/fe/8f/7d/fe8f7df7be0dbfa73add9cfbc1cf8cad.jpg" class="card-img-top" alt="...">
                <hr class="card_hr">
                <div class="card-body text-center">
                        <h2 class="">$199.20</h2>
                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#1" class="btn secondary">Go somewhere</a>
                </div>
            </div>
        
        </div>
        <div class="col-md-4 benefits">
        <div class="card card_template2Special">
        <div class="popular">POPULAR</div>
                <img src="https://i.pinimg.com/originals/fe/8f/7d/fe8f7df7be0dbfa73add9cfbc1cf8cad.jpg" class="card-img-top" alt="...">
                <hr class="card_hr">
                <div class="card-body text-center">
                        <h2 class="card-title">$99.20</h2>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#1" class="btn primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 benefits">
        <div class="card card_template2">
                
                <img src="https://i.pinimg.com/originals/fe/8f/7d/fe8f7df7be0dbfa73add9cfbc1cf8cad.jpg" class="card-img-top" alt="...">
                <hr class="card_hr">
                <div class="card-body text-center">
                        <h2 class="card-title ">$199.20</h2>
                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#1" class="btn secondary">Go somewhere</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<br>


</div>

<?php 
      
    get_template_part('template-parts/testimonials');
?>

<?php
get_footer();