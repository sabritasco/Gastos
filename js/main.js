(function ($) {
  "use strict"; // Start of use strict


  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on("click", function (e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");

    //Reajustar tablas responsive cuando se abra la barra de navegacion lateral ... Revisar su funcionalidad con calma
    if ($.fn.DataTable) {
      $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    }

    if ($(".sidebar").hasClass("toggled")) {
      $(".sidebar .collapse").collapse("hide");

      //Reajustar tablas responsive cuando se abra la barra de navegacion lateral ... Revisar su funcionalidad con calma
      if ($.fn.DataTable) {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
      }

    }
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function () {
    if ($(window).width() < 768) {
      $(".sidebar .collapse").collapse("hide");
    }
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $(".sidebar .collapse").collapse("hide");
    }
  });

  if ($(window).width() < 480) {
    $("body").addClass("sidebar-toggled");
    $(".sidebar").addClass("toggled");
    $(".sidebar .collapse").collapse("hide");
  }


  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel", function (
    e
  ) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on("scroll", function () {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $(".scroll-to-top").fadeIn();
    } else {
      $(".scroll-to-top").fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on("click", "a.scroll-to-top", function (e) {
    var $anchor = $(this);
    $("html, body")
      .stop()
      .animate({
          scrollTop: $($anchor.attr("href")).offset().top,
        },
        1000,
        "easeInOutExpo"
      );
    e.preventDefault();
  });

  // Add active state 
  var path = window.location.href.split("?")[0]; // because the 'href' property of the DOM element is the absolute path
  if ($(window).width() > 768) {
    $("#accordionSidebar a").each(function () {
      if (this.href === path) {
        $(this).closest(".nav-item").addClass("active");
        $(this).closest(".collapse-item").addClass("active");
        $(this).closest(".collapse").addClass("show");
        $(this).closest("li").find("a.nav-link").removeClass("collapsed");
      }
    });
  } else {
    $("#accordionSidebar a").each(function () {
      if (this.href === path) {
        $(this).closest(".nav-item").addClass("active");
        $(this).closest(".collapse-item").addClass("active");
      }
    });
  }

  $('a[title]').tooltip();





})(jQuery); // End of use strict