$.fn.scrollplugin = function(params) {
  var events = [];
  var page = $(this);
  var slides = $(params.slide);
  var currentSlideIndex = 1;
  var canMove = true;

  var scrollDelta = (params.scrollDelta == undefined)? 800 : params.scrollDelta;
  var fadeTime    = (params.fadeTime == undefined)? 100 : params.fadeTime;
  var fadeOutTime = (params.fadeOutTime == undefined)? 100 : params.fadeOutTime;

///scroll
  if (document.addEventListener) {
      document.addEventListener("mousewheel", MouseWheelHandler(), false);
      // document.addEventListener("DOMMouseScroll", MouseWheelHandler(), false);
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
          window.location.hash = $(slides[currentSlideIndex - 1])[0].id;
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
          window.location.hash = $(slides[currentSlideIndex - 1])[0].id;
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

  function goToSlide(slideId) {
    if (typeof slideId == 'string') {
      slides.map(function(id, slide) {
        if ($(slide)[0].id == slideId) {
          window.location.hash = slideId;
          slideId = ++id;
        }
      });
    }
    canMove = false;
    var prevSlideIndex = currentSlideIndex - 1;
    $(slides[prevSlideIndex]).fadeOut(fadeOutTime);
    $(slides[prevSlideIndex]).removeClass('active');
    $(slides[prevSlideIndex]).addClass('closing');
    publish('CLOSING', slides[prevSlideIndex], slides[prevSlideIndex - 1]);

    setTimeout(function() {
      $(slides[prevSlideIndex]).removeClass('closing');
      publish('CLOSED', slides[prevSlideIndex], slides[prevSlideIndex - 1], prevSlideIndex, prevSlideIndex - 1);
      currentSlideIndex = slideId;
      $(slides[currentSlideIndex - 1]).fadeIn(fadeTime);
      $(slides[currentSlideIndex - 1]).addClass('active');
      publish(currentSlideIndex, slides[currentSlideIndex], slides[currentSlideIndex - 1]);
    }, fadeOutTime);
    setTimeout(function() {
      canMove = true;
    }, scrollDelta);
  }

  function subscrEnd(callback) {
    subscr(callback, 'END');
  }

  function subscrStart(callback) {
    subscr(callback, 'START');
  }
  if (window.location.hash) {
    goToSlide(window.location.hash.substr(1));
  } else {
    $(slides[0]).fadeIn();
    $(slides[0]).addClass('active');
  }

  function setMovement(state) {
    canMove = state;
  }

  console.log('Scrollplugin v.0.1.3');
  return {
    setMovement: setMovement,
    subscr: subscr,
    next: next,
    prev: prev,
    end: subscrEnd,
    goToSlide: goToSlide,
  };
}
