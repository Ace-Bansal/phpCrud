<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRUD</title>
  </head>
  <body>
    <?php
      include_once("config.php");

      $sql = "SELECT * FROM crudtrial1";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $users = $stmt->fetchAll();

      foreach ($users as $user) {
        echo "$user->name"."<br>";
        echo "$user->email"."<br>";
        // echo "$user->id"."<br>";
        echo "<a href = 'update.php?id={$user->id}'>Update</a>"."<br>";
        echo "<a href = 'delete.php?id={$user->id}'>Delete</a>";
        echo "<br><br><br>";
      }

      echo "<a href = 'add.php'>Add</a>"
    ?>
  </body>
</html>
