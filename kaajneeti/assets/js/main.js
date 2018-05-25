(function($) {
    "use strict";
    // window scroll function

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    // scroll top click function
    $('.scrollup').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    // left  sidebar close function
    $('.library-menu').on('click', function(e) {
        $(this).toggleClass("active");
        $('body').toggleClass('page-sidebar-closed');
        e.preventDefault();
    });

    // left sidebar togal
    $('.nav-link').on('click', function() {
        if ($(this).parent("li").hasClass('open')) {
            $(this).parent("li").removeClass('open');
        } else {
            $('.nav-item').removeClass('open');
            $(this).parents("li").addClass('open');
        }
    });

    

    $('.menu-toggler.sidebar-toggler').on('click', function() {
        $('body').toggleClass('page-sidebar-closed');
    });

    // apply slimScroll 
    var scrollH = $(window).height();
    $('#right-sidebar .tab-content').slimScroll({
        height: scrollH - 45
    });

    $('.page-sidebar-fixed .page-sidebar-menu').slimScroll({
        height: scrollH - 45
    });

    // sidebar search click
    $('.sidebar-search .submit, .sidebar-search .remove').on('click', function() {
        if ($('body').hasClass('page-sidebar-closed')) {
            $('.sidebar-search').toggleClass('open');
        }
    });

    // ibox tools close button 
    $('.ibox-tools .close-link').on('click', function() {
        $(this).parents(".ibox").hide();
    });

    // apply tooltip
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    // header expanded on click
    $(".search-form .input-group .form-control").focus(function() {
            $(".page-header.navbar .search-form.search-form-expanded").addClass("open");
        })
        .focusout(function() {
            $(".page-header.navbar .search-form.search-form-expanded").removeClass("open");
        });

})(jQuery);

// window resize
$(window).resize(function() {
    var scrollH = $(window).height();

    $('#right-sidebar .tab-content').slimScroll({
        height: scrollH - 45
    });
    $('.page-sidebar-fixed .page-sidebar-menu').slimScroll({
        height: scrollH - 45
    });

});