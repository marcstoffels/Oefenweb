<?php
//Allow the config
define("__CONFIG__", true);
//require the config
require_once "inc/config.php";
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Webquiz</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />
  </head>
  <body>
    <div class ="uk-section uk-container">
      <div class ="uk-grid uk-child-width-1-3-@s uk-child-width-1-1">
        <form class="uk-form-stacked js-webquiz">
          <div class="uk-margin">
              <label class="uk-form-label" for="form-stacked-text " id="progress"></label>
          </div>
          <div></div>
          <h1 class = "uk-text-center">Vermenigvuldigen</h1>
          <div class="uk-margin">
              <label class="uk-form-label uk-text-center uk-text-large" for="form-stacked-text" id="quest1"></label>
          </div>
          <div class="uk-margin">
              <label class="uk-form-label uk-text-large uk-text-center" for="form-stacked-text" id="question" data-progress = "0"></label>
          </div>
          <div class="uk-margin uk-align-center uk-text-center">
              <button class="uk-button uk-button-primary uk-text-center" type = "button" name="answer" id ="A" data-clicked="0"></button>
              <button class="uk-button uk-button-primary uk-text-center" type = "button" name="answer" id ="B" data-clicked="0"></button>
              <button class="uk-button uk-button-primary uk-text-center" type = "button" name="answer" id ="C" data-clicked="0"></button>
              <button class="uk-button uk-button-primary uk-text-center" type = "button" name="answer" id ="D" data-clicked="0"></button>
          </div>
          <div class="uk-margin uk-alert" id="score" style='display: none;'></div>
          <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>
          <div class="uk-margin">
            <button class="uk-button uk-align-center" name="submit" type = "button" id ="submit">Volgende vraag</button>
          </div>
        </form>
      </div>
    </div>
    <?php require_once "inc/footer.php"; ?>
    <script src="/js/main.js"></script>
  </body>
</html>
