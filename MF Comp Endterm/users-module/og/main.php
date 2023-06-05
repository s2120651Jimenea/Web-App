<!DOCTYPE html>
<html>
  <script>
    function showResults(searchValue) {
  var table = document.getElementById("data-list-users");
  var rows = table.getElementsByTagName("tr");
  
  for (var i = 1; i < rows.length; i++) {
    var row = rows[i];
    var nameColumn = row.getElementsByTagName("td")[2];
    var name = nameColumn.textContent || nameColumn.innerText;

    if (name.toLowerCase().indexOf(searchValue.toLowerCase()) > -1) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  }
}
  </script>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Example Template</title>
  <!-- CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet">
  <link href="css/datatables-bootstrap3.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
</head>
<body>
  <h3>System Users</h3>
  <div id="subcontent-users">
    <table id="data-list-users">
      <tr>
        <th></th>
        <th>Name</th>
        <th>Access Level</th>
        <th>Email</th>
        <th></th>
      </tr>
      <?php
      $count = 1;
      if ($user->list_users() != false) {
        foreach ($user->list_users() as $value) {
          extract($value);

          if ($user_access_level == 'Manager' || $user_access_level == 'Supervisor') {
      ?>
            <tr id="user-<?php echo $user_id; ?>">
              <td><?php echo $count; ?></td>
              <td><a href="index.php?page=settings&subpage=users&action=profile&id=<?php echo $user_id; ?>"><?php echo $user_lname . ', ' . $user_fname; ?></a></td>
              <td><?php echo $user_access; ?></td>
              <td><?php echo $user_email; ?></td>
              <td><button class="del" id="<?php echo $user_id; ?>"><i class='glyphicon glyphicon-trash'></i></button></td>
            </tr>
      <?php
            $count++;
          } else if ($user_id == $user_id_login) {
      ?>
            <tr id="user-<?php echo $user_id; ?>">
              <td><?php echo $count; ?></td>
              <td><a href="index.php?page=settings&subpage=users&action=profile&id=<?php echo $user_id; ?>"><?php echo $user_lname . ', ' . $user_fname; ?></a></td>
              <td><?php echo $user_access; ?></td>
              <td><?php echo $user_email; ?></td>
              <td><button class="del" id="<?php echo $user_id; ?>"><i class='glyphicon glyphicon-trash'></i></button></td>
            </tr>
      <?php
            $count++;
          }
        }
      } else {
        echo "<tr><td colspan='5'>No Record Found.</td></tr>";
      }
      ?>
    </table>
  </div>

  <!-- JavaScript -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/datatables.js"></script>
  <script>
    // Delete button click event handler
    $('#data-list-users').on('click', '.del', function() {
      var url = 'ajax_files/deleteUser.php';
      var getID = $(this).attr("id");
      var me = $(this);
      $.post(url, { akoSiID: getID }, function(response) {
        me.parent().parent().fadeOut();

        // Handle the response after the user is deleted
        if (response === "success") {
          // User deleted successfully, you can update the table or perform any necessary actions
          console.log("User deleted successfully");
          // For example, you can remove the deleted row from the table
          var row = me.closest("tr");
          row.remove();
        } else {
          // Failed to delete the user, handle the error
          console.log("Failed to delete user");
        }
      });
    });
  </script>
</body>
</html>
