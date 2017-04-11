$(document).ready(function() {
  var slideShow = $('#page').scrollplugin({
    slide: 'section',
    fadeTime: 700,
    fadeOutTime: 400,
    scrollDelta: 1000
  });

  slideShow.subscr(function(prev, cur) {
    $('.header').removeClass('top');
    $('.footer').removeClass('bottom');
  }, 1);

  slideShow.subscr(function(prev, cur) {
    $('.header').addClass('top');
    $('.footer').addClass('bottom');
  }, 2);

  slideShow.subscr(function(prev, cur) {
    $(prev).find('.animated.fadeInLeft').addClass('fadeOutLeft');
    $(prev).find('.animated.fadeInDown').addClass('fadeOutUp');
    $(prev).find('.animated.fadeInUp').addClass('fadeOutDown');
  }, 'CLOSING');

  slideShow.subscr(function(prev, cur, prevIndex, curIndex) {
    console.log(curIndex);
    if (curIndex != 0) {
      $('.header').addClass('top');
      $('.footer').addClass('bottom');
    }
    $(prev).find('.animated.fadeInLeft').removeClass('fadeOutLeft');
    $(prev).find('.animated.fadeInDown').removeClass('fadeOutUp');
    $(prev).find('.animated.fadeInUp').removeClass('fadeOutDown');
    $('.tooltiper').tooltip({
      position: { my: "right center", at: "left center", of: '#awesomeId' }
    });
  }, 'CLOSED');

  ///Лочим или нет, скролл когда открывается модаалка
  $('.modal').on('show.bs.modal', function (e) {
    slideShow.setMovement(false);
  });

  $('.modal').on('hide.bs.modal', function (e) {
    slideShow.setMovement(true);
  });

  slideShow.subscr(function(prev, cur) {
    google.maps.event.trigger(map, 'resize');
  }, 16);//подпись пока только по номеру слайда.!!!

  slideShow.end(function() {
    console.log('ITS END!!')
  });

  $('#prev').click(slideShow.prev);
  $('#next').click(slideShow.next);
  $('#js__slide-1-button').click(slideShow.next);
  $('#contacts-link').click(function() {
    slideShow.goToSlide('contacts');////указываем id слайда..
  });

///touch events
var hammertime = new Hammer(document.body);
hammertime.get('swipe').set({ direction: Hammer.DIRECTION_ALL });

  $(document).hammer().on('swipedown', function(event) {
    console.log('prev');
    slideShow.prev();
  });
  $(document).hammer().on('swipeup', function(event) {
    console.log('next');
    slideShow.next();
  });


/////liyers

  var curLayer = $('.parts__list').find('input:checked').data('target');
  $(curLayer).fadeIn();

  $('.parts__list').find('input').change(function() {
    $(curLayer).fadeOut();
    curLayer = $(this).data('target');
    $(curLayer).fadeIn();
  });

////slider
  $('#slider').slider({
    classes: {
      "ui-slider": "slider",
      "ui-slider-handle": "slider__handle",
    },
    min: 0,
    max: 100000,
    step: 1000,
    change: calcPrice,
  });

  $('#js__calculator').change(calcPrice);

  function calcPrice() {
    var peopleCount = $('input[name="people-count"]:checked')[0].value;
    var microscop = $('input[name="microscop"]:checked')[0].value;
    var microscopName = $('input[name="microscop"]:checked + label').text();
    $('#js__microscop-name').val(microscopName);
    var price = $('#slider').slider('value');
    $('input[name="price"]')[0].value = price;
    var baseProfit = peopleCount * 21 * price; ///21 рабочий день
    var profitWithMicro = baseProfit * 1.5; //Прибыль возрастает в полтора раза
    var clearProfit = profitWithMicro - baseProfit;
    var payback = microscop / clearProfit;
    $('#js__payback').text(Math.floor(payback));
    $('#js__profit').text(Math.floor(clearProfit));

    $('#js__payback-input').val(Math.floor(payback));
    $('#js__profit-input').val(Math.floor(clearProfit));

    $('.slider__handle').html('<span class="slider__price">'+price+'</price>');
    console.log(peopleCount);
    console.log(microscop);
    console.log(price);
  }
  /////parallax
  $('#scene').parallax();

  $('.modal__content').perfectScrollbar();
});


/////map
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 55.73868745, lng: 37.6203391},
    scrollwheel: false,
    zoom: 17
  });

  var myLatLng = {lat: 55.73868745, lng: 37.6203391};///Отметка на карте

  // Create a marker and set its position.
  var marker = new google.maps.Marker({
    map: map,
    position: myLatLng,
    title: 'Мы тут!'
  });
}
