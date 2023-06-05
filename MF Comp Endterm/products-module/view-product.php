<h3>Product Details</h3> 
<br/>
<div id="form-block-details">
    <form method="POST" action="processes/process.product.php?action=updateproduct">
          <div id="form-block-half-details">
            <label for="fname" class="input-text-prod">Product Name</label>
            <input type="text" id="pname" class="input" name="pname" value="<?php echo $product->get_prod_name($id);?>" placeholder="Product name..">

            <label for="price" class="input-text-prod">Product Price</label>
            <input type="text" id="price" class="input" name="price" value="<?php echo $product->get_prod_price($id);?>" placeholder="Product price..">
          </div>  

          <div id="form-block-half-details">
            <input type="hidden" id="prodid" name="prodid" value="<?php echo $id;?>"/>
            <label for="ptype" class="input-text-prod">Type</label>
            <select id="ptype" name="ptype">
            <?php
              if($product->list_types() != false){
                foreach($product->list_types() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $type_id;?>" <?php if($product->get_prod_type($id) == $type_id){ echo "selected";};?>><?php echo $type_name;?></option>
              <?php
                }
              }
              ?>
            </select>

            <label for="desc" class="input-text-prod">Description</label>
            <textarea id="desc" class="input" name="desc" placeholder="Description.."><?php echo $product->get_prod_desc($id);?></textarea>
          </div>  
          
          <div id="button-block">
            <input type="submit" value="Save">
          </div>
        </div>    
</div>