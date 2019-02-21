<!DOCTYPE html>

<html>
  <head>
    <title>Captcha</title>

  </head>

  <body>
    <?php
    $array = [9, 1, 2,1,2,1,2,9];
    getSum($array);
    function getSum($array){
      $length = count($array);
      $sum = 0;
      for($i = 0; $i < $length; $i++){
        if($i == $length-1){
          if($array[$i] == $array[0]){
            $sum += $array[$i];
          }
        }else if($array[$i] == $array[$i + 1]){
          $sum += $array[$i];
        }
      }
      echo "The sum is: " .$sum;
    }
    ?>
  </body>
</html>
