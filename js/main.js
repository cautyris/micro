$(document).ready(function() {
  var slideShow = $('#page').scrollplugin({
    slide: 'section',
    fadeTime: 700,
    fadeOutTime: 400,
    scrollDelta: 900
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
    $(prev).find('.animated.fadeInLeft').removeClass('fadeOutLeft');
    $(prev).find('.animated.fadeInDown').removeClass('fadeOutUp');
    $(prev).find('.animated.fadeInUp').removeClass('fadeOutDown');
  }, 'CLOSED');

  slideShow.subscr(function(prev, cur) {
    console.log('2 second')
  }, 2);
  slideShow.subscr(function(prev, cur) {
    google.maps.event.trigger(map, 'resize');
  }, 12);

  slideShow.end(function() {
    console.log('ITS END!!')
  });

  $('#prev').click(slideShow.prev);
  $('#next').click(slideShow.next);


///touch events
  $('#page').hammer().on('swipedown', function(event) {
    console.log('next');
    slideShow.next();
  });
  $('#page').hammer().on('swipeup', function(event) {
    console.log('prev');
    slideShow.prev();
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
      min: 0,
      max: 2000
    }
  });



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
