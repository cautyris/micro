$.fn.scrollplugin = function(params) {
  var events = [];
  var page = $(this);
  var slides = $(params.slide);
  var currentSlide = 1;

  var fadeTime = 100;
  if (params.fadeTime) {
    fadeTime = params.fadeTime;
  }
  

  $(slides[0]).fadeIn();
  $(slides[0]).addClass('active');

  function subscr(callback, slideNumber) {
    if (!events[slideNumber]) {
      events[slideNumber] = [];
    }

    var index = events[slideNumber].push(callback) - 1;
    console.log(events);
    return function() { delete events[slideNumber].queue[index]; }
  }

  function publish(slideNumber) {
    if (events[slideNumber]) {
      events[slideNumber].map(function(callback, key) {
        callback();
      });
    }
  }

  function next() {
    if (slides.length == currentSlide) {
      publish('END');
    } else {
      $(slides[currentSlide - 1]).hide();
      $(slides[currentSlide - 1]).removeClass('active');
      currentSlide++;
      $(slides[currentSlide - 1]).fadeIn(fadeTime);
      $(slides[currentSlide - 1]).addClass('active');
      publish(currentSlide);
    }
  }

  function prev() {
    if (currentSlide > 1) {
      $(slides[currentSlide - 1]).hide();
      $(slides[currentSlide - 1]).removeClass('active');
      currentSlide--;
      $(slides[currentSlide - 1]).fadeIn(fadeTime);
      $(slides[currentSlide - 1]).addClass('active');
      publish(currentSlide);
    }
  }

  function subscrEnd(callback) {
    subscr(callback, 'END');
  }

  function subscrStart(callback) {
    subscr(callback, 'START');
  }

  console.log('Scrollplugin v.0.0.1');
  return {
    subscr: subscr,
    next: next,
    prev: prev,
    end: subscrEnd,
  };
}
