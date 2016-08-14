jQuery(function(){

    /*
     |  Menu navigation
     */
    jQuery(window).scroll(function(event){
        var scroll = jQuery(this).scrollTop();
        if (scroll > 20) {
            jQuery('#ais-navbar').addClass('scrolled');
            jQuery('content').addClass('scrolled');
        } else {
            jQuery('#ais-navbar').removeClass('scrolled');
            jQuery('content').addClass('scrolled');
        }
    });

    /*
     |  URL #target link
     */
    jQuery('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = jQuery(this.hash);
            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                jQuery('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

    /*
     |  jQuery align
     */
    jQuery('.entry-content p:has(img.aligncenter)').css('text-align', 'center');
    jQuery('.entry-content p:has(img.alignright)').css('text-align', 'right');

    /*
     |  jQuery schedules tables
     */
    jQuery('.schedules-arrival').click(function(){
        if ( jQuery(this).find('.active').length ) {

        } else {
            jQuery('.schedules-arrival').addClass('active');
            jQuery('.schedules-departure').removeClass('active');
            jQuery('.table-arrival').removeClass('close');
            jQuery('.table-departure').addClass('close');
        }
    });

    jQuery('.schedules-departure').click(function(){
        if ( jQuery(this).find('.active').length ) {

        } else {
            jQuery('.schedules-departure').addClass('active');
            jQuery('.schedules-arrival').removeClass('active');
            jQuery('.table-departure').removeClass('close');
            jQuery('.table-arrival').addClass('close');
        }
    });

    /*
     |  jQuery stats tables
     */
    jQuery('.stats-arrival').click(function(){
        if ( jQuery(this).find('.active').length ) {

        } else {
            jQuery('.stats-arrival').addClass('active');
            jQuery('.stats-departure').removeClass('active');
            jQuery('.table-arrival-stats').removeClass('close');
            jQuery('.table-departure-stats').addClass('close');
        }
    });

    jQuery('.stats-departure').click(function(){
        if ( jQuery(this).find('.active').length ) {

        } else {
            jQuery('.stats-departure').addClass('active');
            jQuery('.stats-arrival').removeClass('active');
            jQuery('.table-departure-stats').removeClass('close');
            jQuery('.table-arrival-stats').addClass('close');
        }
    });

    /*
     |  jQuery input keyword focus
     */
    jQuery('#searchform').on( 'focus', '.form-keyword', function(){
        jQuery('.form-select').css({ 'display' : 'table-cell' });
    });

});