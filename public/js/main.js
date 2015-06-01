function AlertBox(headline, message, confirmable) {
  this.headline = headline;
  this.message = message;
  this.confirmable = confirmable;
}

AlertBox.prototype.spawn = function() {
  if (this.confirmable === true) {
    this.button = '<button class="btn btn-primary" id="form-confirm" onclick="'+this.discard;
    /*$(this).find('button').on('click', function() {
      this.discard();
    });*/
  } else {
    this.button = '';
  }

  var html = '<div class="alertBox">' +
    '<h1>' + this.headline + '</h1>' +
    '<p>' + this.message + '</p>' +
    this.button +
    '</div>'

  $('body').append(html);
}

AlertBox.prototype.discard = function() {
  $('body .alertBox').fadeOut(250);
  setTimeout(function () {
    $('body .alertBox').remove();
  }, 300);
}

function Form(element) {
  var self = this;
  this.element = element[0];
  this.init();

  this.element.addEventListener('submit', function(event) {
    self.handle(event);
  });
};

Form.prototype.init = function() {
  this.referencing = $(this.element).attr('referencing');
  this.request = $(this.element).attr('request');
  this.confirmable = $(this.element).attr('confirmable');
  this.redirect = $(this.element).attr('redirect');

  this.urlParams = [this.referencing, this.request];
};

Form.prototype.validate = function() {
  var valid = true;

  $(this.element).find('.required').each(function (index, value) {
    if ($.trim($(value).val()).length === 0) {
      $(value).parent().parent().addClass("has-error");
      valid = false;
    } else {
      $(value).parent().removeClass("error");
      valid = true;
    }
  });

  return valid;
};

Form.prototype.serialize = function() {
  return $(this.element).serialize();
};

Form.prototype.handle = function(event) {
  event.preventDefault();

  if(this.validate()) {
    this.triggerRequest();
  } else {
    throw new Error('form not valid')
  }
};

Form.prototype.triggerRequest = function() {
  $.post(this.urlParser(), this.serialize()).done(function(data) {
    var parsedResponse = JSON.parse(data);

    if(parsedResponse.success) {
      window.location.reload();
    }
  });
};

Form.prototype.urlParser = function() {
  return location.protocol + '//' + location.hostname + ':' + location.port + this.urlParams.join('/');
}

function scrollTo(element) {
  var scroll = $(element).offset().top;
  $('html, body').animate({
    scrollTop: scroll
  }, 'slow');
}

function toggleAnswer(e) {
  e.preventDefault();
  $('.answer').fadeToggle(500);
  scrollTo($('.answer'));

  $('.answer-anchor').fadeToggle();
  $('#answer').focus();
}

$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });

  $('.answer-anchor').on('click', function () {
    $('.answer').fadeIn(500);
    scrollTo($('.answer'));

    $('.answer-anchor').fadeOut();
  });

  $('.ajaxForm').each(function() {
    new Form($(this));
  })

  $('.answerbox').on('keypress', function (e) {
    if (e.which === 13 && e.shiftKey) {
      $(this).parent().submit();
      e.preventDefault();
    }
  })

  $('body').on('keydown', function (e) {
    if (e.which === 82 && e.shiftKey) {
      toggleAnswer(e);
    }
  });

  $('button[href]').on('click', function() {
    var url = $(this).attr('href');

    window.location.href = url;
  })
});