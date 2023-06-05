<h3>Provide Product Information</h3>
<div id="form-block-create-product">
    <form method="POST" action="processes/process.product.php?action=newproduct">
        <div id="form-block-center-prod">
            <label for="fname" class="input-text-prod">Product Name</label>
            <input type="text" id="pname" class="input" name="pname" placeholder="Product name.." required>

            <label for="price" class="input-text-prod">Product Price</label>
            <input type="text" id="price" class="input" name="price" placeholder="Product price.." required>
        </div>
        <div id="form-block-right-prod">  
            <label for="desc" class="input-text-prod">Description</label>
            <textarea id="desc" class="input" name="desc" placeholder="Description.."></textarea>

            <label for="ptype" class="input-text-prod">Type</label>
            <select id="ptype" name="ptype" required>
        </div>
              <?php
              if($product->list_types() != false){
                foreach($product->list_types() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $type_id;?>"><?php echo $type_name;?></option>
              <?php
                }
              }
              ?>
        </select>
              </div>
        <div id="button-block">
        <input type="submit" value="Save Product">
        </div>
  </form>
</div>