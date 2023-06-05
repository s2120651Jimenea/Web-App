<!DOCTYPE html>
  <html>
    <script>
      function showResults(searchValue) {
    var table = document.getElementById("data-list");
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
  $(document).ready( function() {
    
    $("#sabaw").dataTable();
    
    $('#data-list').on('click','.del', function() {
      var url = 'ajax_files/deleteProduct.php';
      var getID = $(this).attr("ID");
      var me = $(this);
      $.post(url,{ akoSiID: getID },function(response) {
        me.parent().parent().fadeOut();
      });
    });
    
  });
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
<h3>Product Details</h3>
<a href="index.php?page=settings&subpage=products&action=create" class="addprodbtn">New Product</a>
<input class="search-box-prod" placeholder="Search.." id="search" name="search" onkeyup="showResults(this.value)">
<button type="submit"><i class="fa fa-search"></i></button>
<table id="data-list">
  <tr>
    <th>Product ID</th>
    <th>Type</th>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th></th>
  </tr>
  <?php
  $count = 1;
  if ($product->list_products() != false) {
    foreach ($product->list_products() as $value) {
      extract($value);
  ?>
      <tr id="product-<?php echo $prod_id; ?>">
        <td><?php echo $prod_id; ?></td>
        <td><?php echo $product->get_prod_type_name($product->get_prod_type($prod_id)); ?></td>
        <td><a href="index.php?page=settings&subpage=products&action=profile&id=<?php echo $prod_id; ?>"><?php echo $prod_name; ?></a></td>
        <td><?php echo $prod_desc; ?></td>
        <td><?php echo $prod_price; ?></td>
        <td><button class="del" id="<?php echo $prod_id; ?>"><i class='glyphicon glyphicon-trash'></i></button></td>
      </tr>
  <?php
      $count++;
    }
  } else {
    echo "No Record Found.";
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
      $('#data-list').on('click', '.del', function() {
        var url = 'ajax_files/deleteProduct.php';
        var getID = $(this).attr("id");
        var me = $(this);
        $.post(url, { akoSiID: getID }, function(response) {
          me.parent().parent().fadeOut();

          // Handle the response after the product is deleted
          if (response === "success") {
            // User deleted successfully, you can update the table or perform any necessary actions
            console.log("User deleted successfully");
            // For example, you can remove the deleted row from the table
            var row = me.closest("tr");
            row.remove();
          } else {
            // Failed to delete the user, handle the error
            console.log("Failed to delete product");
          }
        });
      });
    </script>
  </body>
</html>