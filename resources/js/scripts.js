/*!
* Start Bootstrap - One Page Wonder v6.0.4 (https://startbootstrap.com/theme/one-page-wonder)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-one-page-wonder/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

// $(window).scroll(function () {
//     if ($("#nav1").offset().top > 500) {
//         $("#nav1").css("background-color","rgba(255, 102, 102,1)");
//     } else {
//         $("#nav1").css("background-color","rgba(0, 0, 0,0.8)");
//     }
// });
$('document').ready(function(){
    let height = $(window).height();
    height = height - 311.59;
    let top = height/2;
    let bottom = height/2;
    $('.masthead').css({'padding-top':top,'padding-bottom':bottom});
});
