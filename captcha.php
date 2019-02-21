<!DOCTYPE html>

<html>
  <head>
    <title>Captcha</title>

  </head>

  <body>
    <?php
    //First part:
    $array = [1, 1, 1, 1];
    $arra2 = [1, 1, 1, 1];
    $arra3 = [1, 2, 3, 4];
    $arra4 = [9, 1, 2, 1, 2, 1, 2, 9];
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
    echo "</br>";

    //Second part:
    $array =  [1, 2, 1, 2];
    $array2 = [1, 2, 2, 1];
    $array3 = [1, 2, 3, 4, 2, 5];
    $array4 = [1, 2, 3, 1, 2, 3];
    $array5 = [1, 2, 1, 3, 1, 4, 1, 5];
    getSumHalfway($array5);

    function getSumHalfway($array){
      $arrayLength = count($array);
      if($arrayLength % 2 == 0){
        $sum = 0;
        $jumps = $arrayLength / 2;
        for($i = 0; $i < $arrayLength; $i++){
          if($i >= $jumps){
            if($array[$i] == $array[$i % $jumps]){
              $sum += $array[$i];
            }
          }else if($array[$i] == $array[$i + $jumps]){
            $sum += $array[$i];
          }
        }
        echo "The sum is: " .$sum;
      }else{
        echo "It is not possible to divide this array into two";
      }
    }
    ?>
  </body>
</html>
