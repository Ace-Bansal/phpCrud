<?php
  include("header.php");
?>
<div class="ui container">

    <?php

      include_once("config.php");

      if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];

        // var_dump($email);
        $sql = "INSERT INTO crudtrial1(name, email) VALUES(:name, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["name" => $name, "email" => $email]);

        // echo "POST ADDED";
        echo '<script>window.location.href = "index.php";</script>';
      }
     ?>

     <form class="ui form" action="add.php" method="post">
       <div class="field">
         <label>First Name</label>
         <input type="text" name="name" placeholder="Name">
       </div>
       <div class="field">
         <label>Email</label>
         <input type="email" name="email" placeholder="Email">
       </div>

       <button class="ui button" type="submit" name="submit" value="Add">Submit</button>
     </form>
   </div>
   <?php
     include("footer.php");
   ?>
