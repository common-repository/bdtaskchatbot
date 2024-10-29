(function ($) {
    'use strict'

    // This template is mobile first so active menu in navbar
    // has submenu displayed by default but not in desktop
    // so the code below will hide the active menu if it's in desktop
    if (window.matchMedia('(min-width: 992px)').matches) {
        jQuery('.bd-navbar .active').removeClass('show');
    }


    // this will hide dropdown menu from open in mobile
    jQuery('.dropdown-menu .bd-header-arrow').on('click', function (e) {
        e.preventDefault();
        jQuery(this).closest('.dropdown').removeClass('show');
    });

    // this will show navbar in left for mobile only
    jQuery('#azNavShow, #azNavbarShow').on('click', function (e) {
        e.preventDefault();
        jQuery('body').addClass('bd-navbar-show');
    });

    // this will hide currently open content of page
    // only works for mobile
    jQuery('#azContentLeftShow').on('click touch', function (e) {
        e.preventDefault();
        jQuery('body').addClass('bd-content-left-show');
    });

    // This will hide left content from showing up in mobile only
    jQuery('#azContentLeftHide').on('click touch', function (e) {
        e.preventDefault();
        jQuery('body').removeClass('bd-content-left-show');
    });

    // this will hide content body from showing up in mobile only
    jQuery('#azContentBodyHide').on('click touch', function (e) {
        e.preventDefault();
        jQuery('body').removeClass('bd-content-body-show');
    })



})( jQuery );