<?php
if( ! isset($_GET['name']) || strlen($_GET['name']) <1 ){
  die('Name parameter missing');
}

if ( isset($_POST['logout'])){
  header('Location: index.php');
  return;
}
$hero = array('Rock','Paper','Scissors');
$human = isset($_POST["human"])? $_POST["human"]+0 : -1;
$comp_input = rand(0,2);

function rps($comp_input,$human){
  if ($human == $comp_input) {
    return "Tie";
  }elseif ($human == 1 && $comp_input == 0) {
    return "You Win";
  }elseif ($human == 2 && $comp_input == 1) {
    return "You Win";
  }elseif ($human == 0 && $comp_input == 2) {
    return "You Win";
  }elseif ($human == 2 && $comp_input == 0) {
    return "You Lose";
  }elseif ($human == 1 && $comp_input == 2) {
    return "You Lose";
  }elseif ($human == 0 && $comp_input == 1) {
    return "You Lose";
  }
  return false;
}
$result = rps($comp_input,$human);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>GAME</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://kit.fontawesome.com/503e4cbae3.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <form method="post">
    <select name="human">
    <option value="-1">SELECT</option>
    <option value="0">Rock</option>
    <option value="1">Paper</option>
    <option value="2">Scissors</option>
    <option value="3">Test</option>
    </select>
    <input type="submit" value="Play">
    <input type="submit" name="logout" value="Logout">
    </form>
    <pre>
      <?php
        if ($human == -1) {
          print "Please select a strategy and press Play. \n";
        }elseif ($human == 3) {
          for($c=0;$c<3;$c++){
            for ($i=0; $i<3 ; $i++) {
              $r = rps($c,$i);
              print "Human=$hero[$i] Computer = $hero[$c] Result = $r \n";
            }
          }
        }else{
          print "You=$hero[$human]   Computer=$hero[$comp_input]   Result=$result\n";
        }

       ?>


    </pre>
  </body>
</html>
