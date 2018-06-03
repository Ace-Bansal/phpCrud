<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add</title>
  </head>
  <body>
    <?php

      include_once("config.php");

      if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];

        // var_dump($email);
        $sql = "INSERT INTO crudtrial1(name, email) VALUES(:name, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["name" => $name, "email" => $email]);

        echo "POST ADDED";
      }
     ?>

     <form action="add.php" method="post">
       <!-- <input type="text" name="id" placeholder="id"> -->
       <input type="text" name="name" placeholder="name">
       <input type="text" name="email" placeholder="email">
       <input type="submit" name="submit" value="Add">
     </form>

  </body>
</html>
