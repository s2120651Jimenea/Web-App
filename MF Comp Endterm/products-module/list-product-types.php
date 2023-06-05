<script>
function showResults(searchTerm) {
  var table = document.getElementById('data-list-prod-type');
  var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
  searchTerm = searchTerm.toLowerCase();

  for (var i = 0; i < rows.length; i++) {
    var type_id = rows[i].getElementsByTagName('td')[0].textContent.toLowerCase();
    var type_name = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();

    if (type_id.includes(searchTerm) || type_name.includes(searchTerm)) {
      rows[i].style.display = '';
    } else {
      rows[i].style.display = 'none';
    }
  }
}
</script>
<h3>Product Types</h3>
  <a class="btn-jsactive" onclick="document.getElementById('id01').style.display='block'">New Product Type</a>
  <input class="search-box-prod-type" placeholder="Search.." id="search" name="search" onkeyup="showResults(this.value)">
  <button type="submit"><i class="fa fa-search"></i></button>

<table id="data-list-prod-type">
  <thead>
    <tr>
      <th>Code</th>
      <th>Product Type Name</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count = 1;
    if ($product->list_product_type() != false) {
      foreach ($product->list_product_type() as $value) {
        extract($value);
        ?>
        <tr>
          <td><?php echo $type_id; ?></td>
          <td><?php echo $type_name; ?></td>
        </tr>
        <?php
        $count++;
      }
    } else {
      echo "<tr><td colspan='2'>No Record Found.</td></tr>";
    }
    ?>
  </tbody>
</table>

  
<div id="id01" class="modal">
  <div #id="form-update" class="modal-content">
    <div class="container">
   
      <h2>New Product Type</h2>

      <form method="POST" id="newForm" action="processes/process.product.php?action=newtype">
        <label for="fname" class="input-text-prod-newtype">New Product Type Name</label>
            <input type="text" id="tname" class="input" name="tname" placeholder="Product Type Name">            
      
    </form>

      <div class="clearfix">
        <button class="cancelbtn" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
        <button class="submitbtn" onclick="enableSubmit()">Confirm</button>
        
      </div>
      </div>
    </div>
          </div>
</div>
<script>
var modal = document.getElementById('id01');

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function enableSubmit() {
    document.getElementById("newForm").submit();
}
</script>