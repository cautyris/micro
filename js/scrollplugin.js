$.fn.scrollplugin = function(params) {
  var events = [];
  var page = $(this);
  var slides = $(params.slide);
  var currentSlideIndex = 1;
  var canMove = true;

  var scrollDelta = 800;
  if (params.scrollDelta) {
    scrollDelta = params.scrollDelta;
  }
  var fadeTime = 100;
  if (params.fadeTime) {
    fadeTime = params.fadeTime;
  }
  var fadeOutTime = 100;
  if (params.fadeOutTime) {
    fadeOutTime = params.fadeOutTime;
  }

  if (document.addEventListener) {
      document.addEventListener("mousewheel", MouseWheelHandler(), false);
      document.addEventListener("DOMMouseScroll", MouseWheelHandler(), false);
  } else {
      sq.attachEvent("onmousewheel", MouseWheelHandler());
  }

  function MouseWheelHandler() {
    return function (e) {
        // cross-browser wheel delta
        var e = window.event || e;
        var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));

        if (canMove) {
          if (delta < 0) {
            next();
          } else {
            prev();
          }
          canMove = false;
          setTimeout(function() {
            canMove = true;
          }, scrollDelta);
        }
        return false;
    }
  }

  function subscr(callback, slideNumber) {
    if (!events[slideNumber]) {
      events[slideNumber] = [];
    }

    var index = events[slideNumber].push(callback) - 1;
    return function() { delete events[slideNumber].queue[index]; }
  }

  function publish(slideNumber, prevSlide, curSlide, prevSlideIndex, curSlideIndex) {
    if (events[slideNumber]) {
      events[slideNumber].map(function(callback, key) {
        callback(prevSlide, curSlide, prevSlideIndex, curSlideIndex);
      });
    }
  }

  function next() {
    if (canMove) {
      if (slides.length == currentSlideIndex) {
        publish('END');
      } else {
        var prevSlideIndex = currentSlideIndex - 1;
        $(slides[prevSlideIndex]).fadeOut(fadeOutTime);
        $(slides[prevSlideIndex]).removeClass('active');
        $(slides[prevSlideIndex]).addClass('closing');
        publish('CLOSING', slides[prevSlideIndex], slides[currentSlideIndex]);

        setTimeout(function() {
          $(slides[prevSlideIndex]).removeClass('closing');
          publish('CLOSED', slides[prevSlideIndex], slides[currentSlideIndex], prevSlideIndex, currentSlideIndex);
          currentSlideIndex++;
          $(slides[currentSlideIndex - 1]).fadeIn(fadeTime);
          $(slides[currentSlideIndex - 1]).addClass('active');
          publish(currentSlideIndex, slides[currentSlideIndex - 2], slides[currentSlideIndex - 1]);
        }, fadeOutTime)
      }
      canMove = false;
      setTimeout(function() {
        canMove = true;
      }, scrollDelta);
    }
  }

  function prev() {
    if (canMove) {
      if (currentSlideIndex > 1) {
        var prevSlideIndex = currentSlideIndex - 1;
        $(slides[prevSlideIndex]).fadeOut(fadeOutTime);
        $(slides[prevSlideIndex]).removeClass('active');
        $(slides[prevSlideIndex]).addClass('closing');
        publish('CLOSING', slides[prevSlideIndex], slides[prevSlideIndex - 1]);

        setTimeout(function() {
          $(slides[prevSlideIndex]).removeClass('closing');
          publish('CLOSED', slides[prevSlideIndex], slides[prevSlideIndex - 1], prevSlideIndex, prevSlideIndex - 1);
          currentSlideIndex--;
          $(slides[currentSlideIndex - 1]).fadeIn(fadeTime);
          $(slides[currentSlideIndex - 1]).addClass('active');
          publish(currentSlideIndex, slides[currentSlideIndex], slides[currentSlideIndex - 1]);
        }, fadeOutTime)
      }
      canMove = false;
      setTimeout(function() {
        canMove = true;
      }, scrollDelta);
    }
  }

  function subscrEnd(callback) {
    subscr(callback, 'END');
  }

  function subscrStart(callback) {
    subscr(callback, 'START');
  }

  $(slides[0]).fadeIn();
  $(slides[0]).addClass('active');

  console.log('Scrollplugin v.0.0.1');
  return {
    subscr: subscr,
    next: next,
    prev: prev,
    end: subscrEnd,
  };
}
