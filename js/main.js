$(document).ready(function() {
  var slideShow = $('#page').scrollplugin({
    slide: 'section',
    fadeTime: 700
  });
  slideShow.subscr(function() {
    $('.header').addClass('top');
    $('.footer').addClass('bottom');
  }, 2);
  slideShow.subscr(function() {
    $('.header').removeClass('top');
    $('.footer').removeClass('bottom');
  }, 1);
  slideShow.subscr(function() {
    console.log('2 second')
  }, 2);
  slideShow.subscr(function() {
    console.log('3')
  }, 3);

  slideShow.end(function() {
    console.log('ITS END!!')
  });

  $('#prev').click(slideShow.prev);
  $('#next').click(slideShow.next);
});
