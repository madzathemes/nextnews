jQuery(document).ready(function() {
  'use strict';

  var bar_close = localStorage["bar_close"];
  if (bar_close==="1") { jQuery(".mtc-wrap, .mtc-fix").addClass("active"); }
  jQuery('.mtc-close').on("click", function() {
    jQuery(".mtc-wrap, .mtc-fix").addClass("active");
    jQuery(".mtc-d").addClass(".mt-d-a");
      localStorage.setItem('bar_close', 1);
      return false;
  });
  jQuery('.mtc-d-o').on("click", function() {
    jQuery(".mtc-wrap, .mtc-fix").removeClass("active");
    jQuery(".mtc-d").removeClass(".mt-d-a");
      localStorage.setItem('bar_close', 2);
      return false;
  });

  jQuery('.mtc-d').addClass('mtc-d-a');


  var bar_d_close = localStorage["bar_d_close"];
  if (bar_d_close==="1") {
    jQuery(".mtc-d").removeClass("mt-d-on");
    jQuery(".mtc-d").addClass("mt-d-off");

  }
  jQuery('.mtc-d-close').on("click", function() {
    jQuery(".mtc-d").removeClass("mt-d-on");
    jQuery(".mtc-d").addClass("mt-d-off");
      localStorage.setItem('bar_d_close', 1);
      return false;
  });
  jQuery('.mtc-d-open').on("click", function() {
    jQuery(".mtc-d").addClass("mt-d-on");
    jQuery(".mtc-d").removeClass("mt-d-off");
      localStorage.setItem('bar_d_close', 2);
      return false;
  });


});
