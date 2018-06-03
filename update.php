<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update</title>
  </head>
  <body>

    <?php
      include_once("config.php");
      $id = $_GET['id'];
      if(isset($_POST['update'])){
        $id = $_GET['id'];
        // var_dump($_GET);
        $name = $_POST["name"];
        $email = $_POST["email"];

        $sql = "UPDATE crudtrial1 SET name = :name WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["name" => $name, "id" => $id]);

        echo "POST UPDATED";
      } else{
        $id = $_GET["id"];
        $sql = "SELECT * FROM crudtrial1 WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["id" => $id]);
        $users = $stmt->fetchAll();

        foreach ($users as $user) {
          $name = $user->name;
          $email = $user->email;
        }
      }

    ?>


  <form action="update.php?id=<?php echo $id ?>" method="post">
    <input type="text" name="name" value="<?php echo $name ?>">
    <input type="text" name="email" value="<?php echo $email ?>">
    <input type="submit" name="update" value="Update">
  </form>




  </body>
</html>
