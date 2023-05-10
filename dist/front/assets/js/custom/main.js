// STSRT:: WIZARD FORM

var currentTab = 0;
document.addEventListener("DOMContentLoaded", function (event) {
  showTab(currentTab);
});

$(".card-broadcast .text-card > a").click(function () {
  $("#simp").toggleClass("show_audio");
});

function showTab(n) {
  var x = document.getElementsByClassName("tab");
  if (x.length != 0) {
    x[n].style.display = "block";
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == x.length - 1) {
      document.getElementById("nextBtn").innerHTML = "التالي";
    } else {
      document.getElementById("nextBtn").innerHTML = "التالي";
    }

    fixStepIndicator(n);
  }
  if (x.length == 3) {
    if (n > 1) {
      document.getElementById("prevBtn").style.display = "none";
      document.getElementById("nextBtn").style.display = "none";
    }
  } else if (x.length == 2) {
    if (n > 0) {
      document.getElementById("nextBtn").style.display = "none";
      document.getElementById("pub").style.display = "block";
    } else {
      document.getElementById("prevBtn").style.display = "none";
      document.getElementById("pub").style.display = "none";
      document.getElementById("nextBtn").style.display = "block";
    }
    // document.getElementById("prevBtn").style.display = "none";
  }
}

function nextPrev(n) {
  var x = document.getElementsByClassName("tab");
  x[currentTab].style.display = "none";
  currentTab = currentTab + n;
  if (currentTab >= x.length) {
    document.getElementById("nextprevious").style.display = "none";
    document.getElementById("all-steps").style.display = "none";
  }
  showTab(currentTab);
}

// START:: DATA TABLE

// $(document).ready(function () {
var dataTable = $("#dataTable");
if (dataTable.length) {
  dataTable.DataTable({
    language: {
      lengthMenu: "_MENU_",
      search: "بحث",
      paginate: {
        previous: `<i class="far fa-arrow-right"></i>`,
        next: `<i class="far fa-arrow-left"></i>`,
      },
      url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/ar.json",
    },
  });
}
// });


function fixStepIndicator(n) {
  var i,
    x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  x[n].className += " active";
}
// END:: WIZARD FORM

// SHARE
$(document).ready(function () {
  var titleElement = document.getElementsByTagName("title")[0];
  SocialShareKit.init({
    // url: 'http://socialsharekit.com',
    url: `${window.location.href}`,
    twitter: {
      title: `${titleElement.innerHTML}`,
      via: "SelselaTech",
    },
  });
});
// SHARE

// START:: IMAGE PREVIEW
function preview() {
  frame.src = URL.createObjectURL(event.target.files[0]);
  // console.log(frame.src);
  var upload_file = document.getElementById("upload_file");
  var remove_image = document.getElementById("remove_image");
  var dNoneImage = document.getElementById("frame");
  if (frame.src != null) {
    if (upload_file) {
      upload_file.style.display = "none";
    }
    if (remove_image) {
      remove_image.style.display = "block";
    }
    dNoneImage.style.display = "block";
  }
}
function clearImage() {
  document.getElementById("formFile").value = null;
  frame.src = "";
  var upload_file = document.getElementById("upload_file");
  var remove_image = document.getElementById("remove_image");
  var dNoneImage = document.getElementById("frame");
  if (frame.src != null) {
    if (upload_file) {
      upload_file.style.display = "block";
    }
    if (remove_image) {
      remove_image.style.display = "none";
    }
    if (dNoneImage) {
      dNoneImage.style.display = "none";
    }
  }
}

// END:: IMAGE PREVIEW

// file upload

$(document).on("change", ".file-upload", function () {
  var i = $(this).prev("label").clone();
  var file = this.files[0].name;
  $(this).prev("label").text(file);
});

// START:: LOADER
window.addEventListener("load", function () {
  var preloadpage = document.getElementById("page_loader");
  if (preloadpage) {
    preloadpage.style.display = "none";
  }
});
// END:: LOADER

// START:: HEADER FIXED
$(function () {
  var pageScroll = 100;
  $(window).scroll(function () {
    var scroll = getCurrentScroll();
    if (scroll >= pageScroll) {
      $("header .center_header").addClass("scroll-effect");
      $(".mobile_header").addClass("scroll-effect");
      $(".footer_mobile").addClass("scroll-effect-footer");
    } else {
      $("header .center_header").removeClass("scroll-effect");
      $(".mobile_header").removeClass("scroll-effect");
      $(".footer_mobile").removeClass("scroll-effect-footer");
    }
  });

  function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
  }
});
// END:: HEADER FIXED

// START:: SIDE MENU
$(".mobile_header .btn_menu .toggleClassBtn").click(function () {
  $(".side_menu_mobile.main_menu").toggleClass("showSideMenu");
  $(".overLay_side_menu").addClass("showSideMenuOverLay");
  $("body").css("overflow", "hidden");
});
$(".overLay_side_menu").click(function () {
  $(this).removeClass("showSideMenuOverLay");
  $(".side_menu_mobile.main_menu").removeClass("showSideMenu");
  $("body").css("overflow-y", "scroll");
});

$(".sideMenuBtn").click(function () {
  $(".search_side_bar").toggleClass("show_search_side_bar");
  $(".overLay_search_side_menu").toggleClass("show_overLay_search_side_menu");
  $("body").toggleClass("overflow-hidden");
});

$(".overLay_search_side_menu").click(function () {
  $(this).removeClass("show_overLay_search_side_menu");
  $(".search_side_bar").removeClass("show_search_side_bar");
  $("body").removeClass("overflow-hidden");
});

$(".footer_mobile ul li button").click(function () {
  $(this).addClass("active");
  $(".search_area").addClass("showSearch");
  $(".searchOverLay").addClass("showSearchOverLay");
  $("body").css("overflow", "hidden");
});
$(".footer_mobile ul li button.active").click(function () {
  $("body").css("overflow-y", "scroll");
});
$(".search_btn").click(function () {
  $(".search_area").toggleClass("showSearchArea");
});

// END:: SIDE MENU
$(".filter-btn").click(function () {
  $(
    ".custom-side-message .side_messages_types, .services_section .row  .side_bar_cons, .consulting_section .row  .side_bar_cons"
  ).addClass("show_side_filter");
  $("body").css("overflow-y", "hidden");
  $(".overLay_side_filter").addClass("show_overLay_side_filter");
});
$(".overLay_side_filter").click(function () {
  $("body").css("overflow-y", "scroll");
  $(
    ".custom-side-message .side_messages_types, .services_section .row  .side_bar_cons, .consulting_section .row  .side_bar_cons"
  ).removeClass("show_side_filter");
  $(this).removeClass("show_overLay_side_filter");
  // console.log("fasfasfas");
});

// START:: CHAT BOX
// $("#chat_1").click(function () {
//   $(".chat_details").addClass("show_chat_details");
// });
$(".head_chat button").click(function () {
  $(".chat_details").removeClass("show_chat_details");
});

// $(".textarea_post .emojiPicker").innerHTML("");
// $(".emojiPickerIcon").click(function () {
// });

$(document).ready(function () {
  $("#text-message").emojiPicker({
    // position: 'left'
  });
  $("#text-send").emojiPicker({
    // position: 'left'
  });
});

// $(function () {
//   const el = document.querySelector(".body_chat .conversation ");
//   el.scrollTop = el.scrollHeight;
//   $("#chat__form").on("submit", function (e) {
//     e.preventDefault();
//     var message = $("#text-message").val();

//     $("#text-message").val("");
//     var date = new Date().toLocaleTimeString();
//     if (message != "") {
//       $(".body_chat .conversation ul")
//         .append(
//           '<li> <div class="item">' +
//             message +
//             "<small>" +
//             date +
//             "</small> </div> </li>"
//         )
//         .show("slow");
//     }
//     el.scrollTop = el.scrollHeight;
//   });
// });

// END:: CHAT BOX
{
  /* <li> <div class="item"> +message+<small>+date+</small> </div> </li> */
}
// START:: SHOW AND HIDE PASSWORD
function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}

function password_show_hide_confirm() {
  var x = document.getElementById("confirm_password");
  var show_eye = document.getElementById("show_eye2");
  var hide_eye = document.getElementById("hide_eye2");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
// END:: SHOW AND HIDE PASSWORD

// START:: SLIDERS
var owlSer = $("#serviceSlider");
var owlSer2 = $("#serviceSlider2");
var owlFie = $("#fieldsServiceSlider");
var owlBlo = $("#blogSlider");
var owlVid = $("#videosSlider");
var owlMar = $("#marketersSlider");
var owlbod = $("#broadcastSlider");
var owlSerPage = $("#owlSerPage");

if (
  owlSer.length ||
  owlSer2.length ||
  owlFie.length ||
  owlSerPage.length ||
  owlBlo.length ||
  owlVid.length ||
  owlMar.length ||
  owlbod.length
) {
  owlSer.owlCarousel({
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    lazyLoad: true,
    autoplay: true,
    autoplayTimeout: 8000,
    loop: true,
    margin: 20,
    rtl: true,
    items: 3,
    dots: true,
    nav: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 3,
      },
    },
  });
  owlSer2.owlCarousel({
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    lazyLoad: true,
    autoplay: true,
    autoplayTimeout: 8000,
    loop: true,
    margin: 20,
    rtl: true,
    items: 3,
    dots: true,
    nav: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 3,
      },
    },
  });
  owlSerPage.owlCarousel({
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    lazyLoad: true,
    autoplay: true,
    autoplayTimeout: 8000,
    loop: true,
    margin: 0,
    rtl: true,
    items: 1,
    dots: false,
    navs: true,
    navText: [
      "<i class='fas fa-chevron-right'></i>",
      "<i class='fas fa-chevron-left'></i>",
    ],
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });
  owlFie.owlCarousel({
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    lazyLoad: true,
    autoplay: true,
    autoplayTimeout: 8000,
    loop: true,
    margin: 15,
    rtl: true,
    items: 6,
    dots: false,
    navs: true,
    navText: [
      "<i class='fas fa-chevron-right'></i>",
      "<i class='fas fa-chevron-left'></i>",
    ],
    responsive: {
      0: {
        items: 2,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 6,
      },
    },
  });

  owlBlo.owlCarousel({
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    lazyLoad: true,
    autoplay: true,
    autoplayTimeout: 8000,
    loop: true,
    margin: 20,
    rtl: true,
    items: 2,
    dots: false,
    navs: true,
    navText: [
      "<i class='fas fa-chevron-right'></i>",
      "<i class='fas fa-chevron-left'></i>",
    ],
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 2,
      },
    },
  });

  owlVid.owlCarousel({
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    lazyLoad: true,
    autoplay: true,
    autoplayTimeout: 8000,
    loop: true,
    margin: 20,
    rtl: true,
    items: 3,
    dots: true,
    navs: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 3,
      },
    },
  });

  owlMar.owlCarousel({
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    lazyLoad: true,
    autoplay: false,
    autoplayTimeout: 8000,
    loop: true,
    margin: 25,
    rtl: true,
    items: 5,
    dots: false,
    navs: true,
    navText: [
      "<i class='fas fa-chevron-right'></i>",
      "<i class='fas fa-chevron-left'></i>",
    ],
    center: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 5,
      },
    },
  });

  owlbod.slick({
    arrows: true,
    dots: false,
    vertical: true,
    verticalSwiping: true,
    centerMode: true,
    slidesToShow: 3,
    slidesPerRow: 0,
    slidesToScroll: 3,
    autoplay: false,
    autoplaySpeed: 2000,
    focusOnSelect: true,
    prevArrow:
      '<button type="button" class="slick-prev"><i class="fas fa-chevron-up"></i></button>',
    nextArrow:
      '<button type="button" class="slick-next"><i class="fas fa-chevron-down"></i></button>',
    centerPadding: "15px",
  });
}
// END:: SLIDERS

// START:: COUNTER
var a = 0;

$(window).scroll(function () {
  var counterCheck = $("#counter");
  if (counterCheck.length) {
    var contentCounter = counterCheck.offset().top - window.innerHeight;
    if (a == 0 && $(window).scrollTop() > contentCounter) {
      $(".counter-value").each(function () {
        var $this = $(this),
          countTo = $this.attr("data-count");
        $({
          countNum: $this.text(),
        }).animate(
          {
            countNum: countTo,
          },

          {
            duration: 3500,
            easing: "swing",
            step: function () {
              $this.text(Math.floor(this.countNum));
            },
            complete: function () {
              $this.text(this.countNum);
              //alert('finished');
            },
          }
        );
      });
      a = 1;
    }
  }
});
// END:: COUNTER

// START:: WOW ANIMATION
new WOW().init();
// END:: WOW ANIMATION

// START:: TOOLTIP
var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});
// END:: TOOLTIP

// START:: SEARCH BAR

var searchBar = document.querySelector("#searchInput");
if (searchBar) {
  searchBar.addEventListener("keyup", function (e) {
    // UI Element
    let namesLI = document.getElementsByClassName("title_search");

    // Get Search Query
    let searchQuery = searchInput.value.toLowerCase();

    // Search Compare & Display
    for (let index = 0; index < namesLI.length; index++) {
      const name = namesLI[index].textContent.toLowerCase();

      if (name.includes(searchQuery)) {
        namesLI[index].style.display = "block";
      } else {
        namesLI[index].style.display = "none";
      }
    }
  });
}

// END:: SEARCH BAR

// START:: CK EDITOR
$(document).ready(function () {
  initSample();

  // END:: CK EDITOR

  // START:: FORM REPEATER
  $("#kt_docs_repeater_basic").repeater({
    initEmpty: false,

    defaultValues: {
      "text-input": "foo",
    },

    show: function () {
      $(this).slideDown();
    },

    hide: function (deleteElement) {
      $(this).slideUp(deleteElement);
    },
  });
  // END:: FORM REPEATER
});

// START:: COPY LINK
// (function () {
//   var copyButton = document.querySelector(".copy_link_box button");
//   var copyInput = document.querySelector(".copy_link_box input");
//   // if (copyButton) {
//   copyButton.addEventListener("click", function (e) {
//     e.preventDefault();
//     var text = copyInput.select();
//     var copy = document.execCommand("copy");
//     if (copy) {
//       var changeIcon = document.querySelector(".copy_link_box button i");
//       changeIcon.classList.remove("fa-copy");
//       changeIcon.classList.add("fa-check");
//       setTimeout(() => {
//         changeIcon.classList.remove("fa-check");
//         changeIcon.classList.add("fa-copy");
//       }, 1500);
//     }
//   });

//   copyInput.addEventListener("click", function () {
//     this.select();
//   });
//   // }
// })();

// Select on pressing COPY
var els_copy = document.querySelectorAll("[data-copy]");
for (var i = 0; i < els_copy.length; i++) {
  var el = els_copy[i];
  el.addEventListener("submit", function (e) {
    e.preventDefault();

    var text = e.target.querySelector('input[type="text"]').select();
    var copy = document.execCommand("copy");

    console.log();
    if (copy) {
      var changeIcon = e.submitter.children[0];

      changeIcon.classList.remove("fa-copy");
      changeIcon.classList.add("fa-check");
      e.srcElement[1].innerHTML = `<i class='fas fa-check'></i> تم نسخ الرابط!`;
      setTimeout(() => {
        changeIcon.classList.remove("fa-check");
        changeIcon.classList.add("fa-copy");
        e.srcElement[1].innerHTML = `<i class='fas fa-copy'></i>   نسخ الرابط`;
      }, 1500);
    }
  });
}

// Select all text when pressing inside text field
var els_selectAll = document.querySelectorAll("[data-click-select-all]");
for (var i = 0; i < els_selectAll.length; i++) {
  var el = els_selectAll[i];
  el.addEventListener("click", function (e) {
    e.target.select();
  });
}

// END:: COPY LINK

// DARAG AND DROP
$(function () {
  var sortTable = $("#sortable");
  if (sortTable.length) {
    sortTable
      .sortable({
        cursor: "move",
        placeholder: "sortable-placeholder",
        helper: function (e, tr) {
          var $originals = tr.children();
          var $helper = tr.clone();
          $helper.children().each(function (index) {
            $(this).width($originals.eq(index).width());
          });
          return $helper;
        },
      })
      .disableSelection();
  }
});
// DARAG AND DROP

// START:: INPUT READONLY

$(document).ready(function () {
  $(".is_edit, .is_save").on("click", function () {
    var $form = $(this).closest(".single_row_social .link");
    $form.toggleClass("is-readonly is-editing");
    var isReadonly = $form.hasClass("is-readonly");
    $form.find("input").prop("readonly", isReadonly);
  });
});

$(".show_more_social button").click(function () {
  $("#sortable").toggleClass("hieght_auto_Sort");
});
// END:: INPUT READONLY

// START:: MULTI SELECT
function formatText(src) {
  return $(
    '<span class="awady-select-2-image"><img src="' +
      $(src.element).data("src") +
      '" /> ' +
      src.text +
      "</span>"
  );
}

var today = new Date();
var minDate = today.setDate(today.getDate() + 1);

// $(".datePicker").datetimepicker({
//   useCurrent: false,
//   format: "MM/DD/YYYY",
//   minDate: minDate,
//   // inline: true,
// });



// $(".day").addClass("disabled")
// var firstOpen = true;
// var time;

// $(".timePicker")
//   .datetimepicker({
//     useCurrent: false,
//     format: "hh:mm A",
//     // inline: true,
//   })
//   .on("dp.show", function () {
//     if (firstOpen) {
//       time = moment().startOf("day");
//       firstOpen = false;
//     } else {
//       time = "00:00 PM";
//     }

//     $(this).data("DateTimePicker").date(time);
//   });
// var arrowDown = document.querySelectorAll(
//   ".bootstrap-datetimepicker-widget a[data-action]"
// );

$("#basic-usage").select2({
  theme: "bootstrap-5",
  width: $(this).data("width")
    ? $(this).data("width")
    : $(this).hasClass("w-100")
    ? "100%"
    : "style",
  placeholder: $(this).data("placeholder"),
  rtl: true,
  templateSelection: formatText,
  templateResult: formatText,
});

$("#payment-type").select2({
  theme: "bootstrap-5",
  width: $(this).data("width")
    ? $(this).data("width")
    : $(this).hasClass("w-100")
    ? "100%"
    : "style",
  placeholder: $(this).data("placeholder"),
  rtl: true,
  templateSelection: formatText,
  templateResult: formatText,
});

$("#multiple-select-field").select2({
  theme: "bootstrap-5",
  width: $(this).data("width")
    ? $(this).data("width")
    : $(this).hasClass("w-100")
    ? "100%"
    : "style",
  placeholder: $(this).data("placeholder"),
  closeOnSelect: false,
  tags: true,
});
// END:: MULTI SELECT

// })(jQuery);

function str_limit(text, count) {
  return text.slice(0, count) + (text.length > count ? "..." : "");
}
