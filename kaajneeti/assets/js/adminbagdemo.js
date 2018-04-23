$(document).ready(function() {
     $('.theme-config-box .spin-icon').on('click', function(e) {  
     $('.theme-config-box').toggleClass('open');
});

// Enable/disable collapse menu
    $('#collapsemenu').on('click', function() { 
        if ($('#collapsemenu').is(':checked')){
            $("body").addClass('page-sidebar-closed');
            if (localStorageSupport){
                localStorage.setItem("collapse_menu",'on');
            }

        } else{ 
            $("body").removeClass('page-sidebar-closed');
            if (localStorageSupport){
                localStorage.setItem("collapse_menu",'off');
            }
        }
    });


// Enable/disable fixed sidebar
    $('#fixedsidebar').on('click', function() {
        if ($('#fixedsidebar').is(':checked')){
            $("body").addClass('page-sidebar-fixed');
            var scrollH = $(window).height();
            $('.page-sidebar-menu').slimScroll({
                    height: scrollH - 45
                });

            if (localStorageSupport){
                localStorage.setItem("fixedsidebar",'on');
            }
        } else{
            $('.page-sidebar-menu').slimscroll({destroy: true});
            $('.page-sidebar-menu').attr('style', '');
            $("body").removeClass('page-sidebar-fixed');

            if (localStorageSupport){
                localStorage.setItem("fixedsidebar",'off');
            }
        }
    });


// Enable/disable  fixed header
    $('#headerfixed').on('click', function() {
        if ($('#headerfixed').is(':checked')){
            $("body").addClass('page-header-fixed');
            $(".page-header").addClass('navbar-fixed-top');
            $(".page-sidebar-menu").addClass('page-header-fixed');
           
            if (localStorageSupport){
                localStorage.setItem("headerfixed",'on');
            }
        } else{
            
            $("body").removeClass('page-header-fixed');
            $(".page-header").removeClass('navbar-fixed-top');
            $(".page-sidebar-menu").removeClass('page-header-fixed');

            if (localStorageSupport){
                localStorage.setItem("headerfixed",'off');
            }
        }
    });
    

 // Enable/disable boxed layout
    $('#boxedlayout').on('click', function() {
        if ($('#boxedlayout').is(':checked')){
            $(".page-header-inner").addClass('container');
            $(".page-container").addClass('container');

            if (localStorageSupport){
                localStorage.setItem("boxedlayout",'on');
            }
        } else{
            $(".page-header-inner").removeClass('container');
            $(".page-container").removeClass('container');

            if (localStorageSupport){
                localStorage.setItem("boxedlayout",'off');
            }
        }
    });

// Enable/disable fixed footer
    $('#fixedfooter').on('click', function() {
        if ($('#fixedfooter').is(':checked')){           
            $("body").addClass('page-footer-fixed');
            $(".page-content-wrapper").removeClass("animated fadeInRight");         
            if (localStorageSupport){
                localStorage.setItem("fixedfooter",'on');
            }
        } else{
            $("body").removeClass('page-footer-fixed');
            $(".page-content-wrapper").addClass("animated fadeInRight");
            if (localStorageSupport){
                localStorage.setItem("fixedfooter",'off');
            }
        }
    });

 $('.viewAllThemes').on('click', function() {
        $(".request-form").addClass("open");
    });

 $('.closeForm').on('click', function() {
         $(".request-form").removeClass("open");
    });


});