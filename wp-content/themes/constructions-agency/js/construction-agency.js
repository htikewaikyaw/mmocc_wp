jQuery(document).ready(function($) { 

    /**
     * Add RTL Class in Body
    */
    var brtl = false;
    if ($("body").hasClass('rtl')) { brtl = true; }
    
    $('.cons_light_portfolio-posts').magnificPopup({
        delegate: 'a.cons_light_portfolio-image', // child items selector, by clicking on it popup will open
        type: 'image',
        gallery:{enabled:true}
    });

    $(window).on('scroll', function () {

        if ($(this).scrollTop() > 50) {
            $('header.cons-agency .nav-classic').css("background-color",'#f0f0f0');
            $('.box-header-nav .main-menu > .menu-item > a').css("color","#000");
            $('.box-header-nav .main-menu > .menu-item.current-menu-item > a').css("color","#F8931F");

        }
        else if($(this).scrollTop() < 50){
            $('header.cons-agency .nav-classic').css("background-color",'transparent');
            $('.box-header-nav .main-menu > .menu-item > a').css("color","#fff");
            $('.box-header-nav .main-menu > .menu-item.current-menu-item > a').css("color","#F8931F");
        }
    });
});
