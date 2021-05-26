jQuery(document).ready(function( $ ) {

$('#adminmenu > li.wp-has-submenu.wp-not-current-submenu').on('click', function() {
    if (!$(this).hasClass('active')) {
        $(this).children('.wp-submenu').slideDown(100);
        $('#adminmenu > li.wp-has-submenu.wp-not-current-submenu').toggleClass('active');
        $(this).addClass('active');
    }
      else{
        $('#adminmenu > li.wp-has-submenu.wp-not-current-submenu .wp-submenu').slideUp(100);
        $('#adminmenu > li.wp-has-submenu.wp-not-current-submenu').toggleClass('active');
      }
  });
$('#adminmenu li.wp-has-submenu.wp-not-current-submenu > a').on('click', function(e) {
	e.preventDefault();
});
$('.cybermark_profile_menu__nav > .cybermark_profile_menu__nav-item > a').on('click', function(e) {
	e.preventDefault();
    if (!$(this).hasClass('active')) {
        $(this).children('.cybermark_profile_menu__sub-nav').slideDown(100);
        $('.cybermark_profile_menu__nav-item').toggleClass('active');
        $(this).addClass('active');
    }
      else{
        $('.cybermark_profile_menu__sub-nav').slideUp(100);
        $('.cybermark_profile_menu__nav-item').toggleClass('active');
      }
  });

});