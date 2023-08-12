<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    class Pipeline {
      function make(...$functions) {
        return function($arg) use ($functions) {
          $result = $arg;
          foreach ($functions as $function) {
            $result = $function($result);
          }

          return $result;
        };
      }
    }

    $pipeline = new Pipeline();
    $make = $pipeline->make(function($var) { return $var * 3; }, function($var) { return $var + 1; },
    function($var) { return $var / 2; });
    echo $make(3);
  ?>
</body>
</html>