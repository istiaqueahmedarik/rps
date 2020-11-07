<?php

if( isset($_POST['cancel'] ) ) {
  header("Location: index.php");
  return;
}

$con = 'XyZzy12*_';
$main = '1a52e17fa899cf40fb04cfc42e6352f1';
$wrong = false;

if(isset($_POST['id']) && isset($_POST['pass'])){
  if (strlen($_POST['id'])<1 || strlen($_POST['pass'])<1) {
    $wrong = "User name and password are required";

  }else{
    $check = hash('md5',$con.$_POST['pass']);
    if($check == $main){
      header("Location: game.php?name=".urlencode($_POST['id']));
      return;
    }else{
      $wrong = "Incorrect password";
    }
  }


}

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Istiaque Ahmed Arik:login</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="css/style1.css">
   </head>
   <body>
     <section id="main">
       <h2>Please Log In</h2>
         <?php

    if ( $wrong !== false ) {
        echo('<p style="color: red;">'.htmlentities($wrong)."</p>\n");
    }
    ?>
       <form class="form"  method="POST">
         <div class="name">
           <label for="name">User Name:</label>
           <input type="text" name="id" id="name"><br>
         </div>
         <div class="name">
           <label for="pass">Password:</label>
           <input type="text" name="pass" id="pass"><br/>
         </div>
         
           <input type="submit" value="Log In">

         <input type="submit" name="cancel" value="cancel">
       </form>
     </section>
   </body>
 </html>
