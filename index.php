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
    <form class="uk-form-stacked js-index">
      <div class ="uk-section uk-container">
        <div class="uk-margin">
          <label class="uk-form-label uk-text-large" for="form-stacked-text">Leuk dat je er bent! Wat is je naam?</label>
          <div class="uk-form-controls">
            <input class="uk-input" id="name" type="text" placeholder="Je naam">
          </div>
        </div>
        <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>
        <div class="uk-margin">
          <button class="uk-button uk-button-primary" type = "submit" name="name" id ="name" >Naar de quiz!</button>
        </div>
      </div>
    </form>
    <?php require_once "inc/footer.php"; ?>
    <script src="/js/index.js"></script>
  </body>
</html>
