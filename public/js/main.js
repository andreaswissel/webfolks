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

function aBoxRM() {
  $('body .alertBox').fadeOut(250);
  setTimeout(function () {
    $('body .alertBox').remove();
  }, 300);
}

function scrollTo(element) {
  var scroll = $(element).offset().top;
  $('html, body').animate({
    scrollTop: scroll
  }, 'slow');
}

function ajaxFormProcess(elem) {
  var form = $(elem);
  var referringTo = $(form).attr('refTo');
  var request = $(form).attr('req');
  var confirmable = $(form).attr('confirmable');
  var ref = $(form).attr('ref');

  var isFormValid = true;

  $(".required").each(function (index, value) {
    if ($.trim($(value).val()).length === 0) {
      $(value).parent().parent().addClass("has-error");
      isFormValid = false;
    } else {
      $(value).parent().removeClass("error");
      isFormValid = true;
    }
  });

  console.log('ajaxFormProcess()');

  if (isFormValid) {
    // Initialize @var temp
    var temp = '';
    // Serialize the form
    temp = $(form).serializeArray();

    console.log('trying to transfer ajax data');
    console.log(temp);

    $(form).fadeOut(250);

    $.ajax({
      type: "POST",
      url: "index.php?page=" + referringTo + "&request=" + request,
      data: temp
    }).done(function (data) {
      var data = JSON.parse(data);
      //Debugging
      //$('body').append(data);
      if (data === "1") {
        console.log('no errors, going on');
        console.log('confirmable: ' + confirmable);
        if (confirmable === 'true') {
          console.log('form is confirmable');
          new AlertBox('Erfolgreich', 'Das Formular wurde übermittelt.', true).spawn();
          $('#form-confirm').click(function () {
            window.location.href = '?page=' + ref;
          });
        } else {
          new AlertBox('Erfolgreich', 'Das Formular wurde übermittelt.', true).spawn();
          if (ref === 'self') {
            console.log('referencing self');
            setTimeout(function () {
              window.location.reload();
            }, 500);
          } else {
            setTimeout(function () {
              window.location.href = './';
            }, 500);
          }
        }
      } else {
        if(data.success) {
          setTimeout(function () {
            new AlertBox('Erfolgreich', 'Das Formular wurde übermittelt.', true).spawn();
            if(data.url !== 'self') {
             window.location.href = data.url;
            } else {
             window.location.reload();
            }
          }, 500);
        } else {
          console.log('error');
          new AlertBox('Fehler', 'Meldung: ' + data, 'true').spawn();
          $(form).fadeIn(250);
        }
      }
    }).fail(function () {
      new AlertBox('Fehler', 'Das Formular konnte nicht übermittelt werden.');
    });
  } else {
    new AlertBox("Woops.", "Das hat nicht ganz gepasst. Bitte fülle die rot markierten Felder aus.");
  }
}

function toggleAnswer(e) {
  e.preventDefault();
  $('.answer').fadeToggle(500);
  scrollTo($('.answer'));

  $('.answer-anchor').fadeToggle();
  $('#answer').focus();
}

$(document).ready(function () {
  $('.answer-anchor').on('click', function () {
    $('.answer').fadeIn(500);
    scrollTo($('.answer'));

    $('.answer-anchor').fadeOut();
  });

  $('.ajaxForm').on('submit', function (e) {
    e.preventDefault();
    ajaxFormProcess($(this));
  });

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