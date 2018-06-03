<?php
  include("header.php");
?>
<div class="ui container">



    <?php
      include_once("config.php");
      $id = $_GET['id'];
      if(isset($_POST['update'])){
        $id = $_GET['id'];
        // var_dump($_GET);
        $name = $_POST["name"];
        $email = $_POST["email"];

        $sql = "UPDATE crudtrial1 SET name = :name, email = :email WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["name" => $name, "email" => $email, "id" => $id]);

        // echo "POST UPDATED";
        echo '<script>window.location.href = "index.php";</script>';
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



  <form class="ui form" action="update.php?id=<?php echo $id ?>" method="post">
    <div class="field">
      <label>First Name</label>
      <input type="text" name="name" value="<?php echo $name ?>">
    </div>
    <div class="field">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email ?>">
    </div>

    <button class="ui button" type="submit" name="update" value="Update">Submit</button>
  </form>

</div>
<?php
  include("footer.php");
?>
