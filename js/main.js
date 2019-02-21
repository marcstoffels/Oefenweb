$(document).ready(function(){
  var isClicked = false;
  var buttonA = $('#A');
  var buttonB = $('#B');
  var buttonC = $('#C');
  var buttonD = $('#D');
  var allButtons = [buttonA,buttonB,buttonC,buttonD];
  var labelQuestion = $('#question');
  getAssignment();

  buttonA.click(function(){
    onClick($(this), allButtons);
  });
  buttonB.click(function(){
      onClick($(this), allButtons);
  });
  buttonC.click(function(){
      onClick($(this), allButtons);
  });
  buttonD.click(function(){
      onClick($(this), allButtons);
  });
  function onClick(button, allButtons){
    $('.js-error').hide();
    var clicked = button.data('clicked');
    if(!clicked){
      button.addClass('uk-button-default');
      button.removeClass('uk-button-primary');
      button.data('clicked', 1);
      isClicked = true;
      answer = button.html();
      for(var i = 0; i< allButtons.length; i++){
        if(button.attr('id') != allButtons[i].attr('id')){
          allButtons[i].addClass('uk-button-primary');
          allButtons[i].removeClass('uk-button-default');
          allButtons[i].data('clicked', 0);
        }
      }
    }
  }
  $('#submit').click(function(){
    if(isClicked){
      $('.js-error').hide();
      progressCount = $('#question').attr('data-progress');
      dataObj = {
        progress : progressCount,
        answer : answer
      }
      $.ajax({
        type: 'POST',
        url: '/ajax/webquiz.php',
        data: dataObj,
        dataType: 'json',
        async: true,
      })
      .done(function ajaxDone(data) {
        //If you reached the end of the quiz
        if(data.end !== undefined){
          $('#submit').attr('disabled', 'disabled');
          $('#score').append('Je hebt er ' + data.score + ' van de 10 goed!').show();;
          $('.js-error').html(data.end).show();
          disableButtons(allButtons);
        }else{
          resetButtons(allButtons);
          isClicked = false;
          getAssignment();
        }
      })
      .fail(function ajaxFailed(e) {
        // This failed
        console.log('failed' + e)
      })
    }else{
      $('.js-error').text('Oh oh! Je hebt geen antwoord gegeven!').show();
    }
  });

  function disableButtons(allButtons){
    for(var i = 0; i< allButtons.length; i++){
      allButtons[i].attr('disabled', 'disabled');
    }
  }
  function resetButtons(allButtons){
    for(var i = 0; i< allButtons.length; i++){
      allButtons[i].addClass('uk-button-primary');
      allButtons[i].removeClass('uk-button-default');
      allButtons[i].data('clicked', 0);
    }
  }
  function getAssignment() {
    var form = $('.js-webquiz');
    var buttonA = $('#A');
    var buttonB = $('#B');
    var buttonC = $('#C');
    var buttonD = $('#D');
    var allButtons = [buttonA, buttonB, buttonC, buttonD];
    var labelQuestion = $('#question');
    var labelProgress = $('#progress');
    var progressCount = $('#question').attr('data-progress');
    var labelName = $('#quest1');
    var dataObj = {
      progress: progressCount
    }

    $.ajax({
      type: 'GET',
      url: '/ajax/webquiz.php',
      data: dataObj,
      dataType: 'json',
      async: true,
    })
    .done(function ajaxDone(data) {
      labelQuestion.html(data.question);
      labelProgress.html('Vraag ' + data.progress + ' van 10');
      labelName.html('Hoi ' + data.name + ', wat is de uitkomst van: ');
      //Set the content the answer buttons
      for(var i = 0; i< allButtons.length; i++){
        allButtons[i].html(data.answers[i]);
      }
      labelQuestion.attr('data-progress', data.progress);
    })
    .fail(function ajaxFailed(e) {
      // This failed
      console.log('failed' + e);
    })
  }
});
