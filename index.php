<?php
  include("header.php");
?>

    <div class="ui container">

    <?php
      include_once("config.php");

      $sql = "SELECT * FROM crudtrial1";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $users = $stmt->fetchAll();
      ?>
      <table class="ui celled table">
        <thead>
          <tr><th>Name</th>
          <th>E-mail</th>
          <th>Action</th>
        </tr></thead>
        <tbody>

<?php
      foreach ($users as $user) {
        echo "<tr>";
        echo "<td>$user->name</td>";
        echo "<td>$user->email</td>";
        echo "<td><a href = 'update.php?id={$user->id}'><button class='ui small button'>Update</button></a><a href = 'delete.php?id={$user->id}'><button class='ui small red button'>Delete</button></a></td>";
        echo "</tr>";
      }

?>
  </tbody>
  <tfoot>
    <tr><th colspan="3">
    </th>
  </tr></tfoot>
</table>

<a href = 'add.php'><button class="ui button basic green">Add</button></a>
</div>


<!-- <table class="ui celled table">
  <thead>
    <tr><th>Name</th>
    <th>E-mail</th>
    <th>Action</th>
  </tr></thead>
  <tbody>
    <tr>
      <td>name1</td>
      <td>email1</td>
      <td>action1</td>
    </tr>
  </tbody>
  <tfoot>
    <tr><th colspan="3">
    </th>
  </tr></tfoot>
</table> -->
<?php
  include("footer.php");
?>
