<h3>Release Transaction</h3>
<div id="receive-details" class="receive-details-table">
  <table>
    <tr>
      <td><label for="recdate">Release Date: </label></td>
      <td class="info-text"><?php echo $release->get_release_date($id);?></td>
      <td><label for="purfrom">| Delivered To: </label></td>
      <td class="info-text"><?php echo $release->get_release_branch($id);?></td>
    </tr>
    <tr>
      <td><label for="recstatus">| Status: </label></td>
      <td class="info-text">
        <?php if($release->get_release_save($id) == 0){
            echo "In Process";
          }else{
            echo "Completed Transaction";
          }
          ?>
      
      </td>
    </tr>
  </table>
</div>

<div class="btn-box">
  <?php
    if($release->get_release_save($id) == 0){
  ?>
<a class="btn-jsactive-addprod" onclick="document.getElementById('id01').style.display='block'">Add Product</a> | 
<a class="btn-jsactive-recstat" onclick="document.getElementById('id02').style.display='block'">Save</a>
      <?php
    }
    ?>
</div>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Product</th>
        <th>Quantity</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($release->list_release_items($id) != false){
foreach($release->list_release_items($id) as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $product->get_prod_name($prod_id);?></td>
        <td><?php echo $rel_qty;?></td>
      </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>
<div id="id01" class="modal">
  <div #id="form-update" class="modal-content">
    <div class="container-transac">
   
      <h2>Select Product</h2>

      <form method="POST" id="itemForm" action="processes/process.release.php?action=additem">
      <input type="hidden" id="relid" name="relid" value="<?php echo $id;?>"/>
        <label for="prodid" class="input-text-transac">Product</label>
            <select name="prodid" id="prodid">
            <?php
            $productList = $product->list_product();
              if($productList != false){
                foreach($productList as $value){
                  $prod_id = $value['prod_id'];
                  $prod_name = $value['prod_name'];
                  echo "<option value='$prod_id'>$prod_name</option>";
                }
              }
            ?>
            </select>
            <label for="qty" class="input-text-transac">Released Quantity</label>
            <input type="number" id="qty" class="input" name="qty" placeholder="Quantity..">
       </form> 
      <div class="clearfix">
      <button class="submitbtn" onclick="itemSubmit()">Add</button>
        <button class="cancelbtn" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
        
      </div>
      </div>
    </div>
  </div>
</div>
<div id="id02" class="modal">
<form method="POST" id="itemSave" action="processes/process.release.php?action=saveitem">
      <input type="hidden" id="relid" name="relid" value="<?php echo $id;?>"/>
      </form>
      <div #id="form-update" class="modal-content">
    <div class="container">
      <h2>Save Transaction</h2>
      <p>Are you sure you want to save this transaction?</p>
      <div class="clearfix">
        <button class="confirmbtn" onclick="saveSubmit()">Confirm</button>
        <button class="cancelbtn" onclick="document.getElementById('id02').style.display='none'">Cancel</button>
      </div>
    </div>
    </div>
       
</div>
<script>
var modal = document.getElementById('id01');
var modal_save = document.getElementById('id02');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }else if(event.target == modal_save){
    modal_save.style.display = "none";
  }
}
function saveSubmit() {
    document.getElementById("itemSave").submit();
  }

function itemSubmit() {
  document.getElementById("itemForm").submit();
}
</script>