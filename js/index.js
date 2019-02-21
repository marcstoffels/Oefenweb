
$(document).on("submit", "form.js-index", function(event) {
  var form = $(this);
  var error = $(".js-error", form);
  var dataObj = {
    name: $("#name").val(),
  }
  if(dataObj.name.length < 1){
    error.text("Oh oh! Je hebt geen naam ingevoerd!").show();
    return false;
  }
  //Start the POSTrequest

  $.ajax({
    type: 'POST',
    url: '/ajax/index.php',
    data: dataObj,
    dataType: 'json',
    async: true
  })
  .done(function ajaxDone(data){
    console.log(data);
    if(data.redirect !== undefined){
      window.location = data.redirect;
    }else if(data.error !== undefined){
      error.text(data.error).show();
    }
  })
  .fail(function ajaxFailed(e){
    console.log(e);
  })
  .always(function ajaxAlwaysDoThis(dataObj){
    console.log("Always");
  })
  return false;
})
