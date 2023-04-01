<div class="main">
    <div class="submenu-content-prod">
        <a href="index.php?page=settings&subpage=products" class="submenu-button">Products</a> | 
        <a href="index.php?page=settings&subpage=products&action=types" class="submenu-button">Product Types</a> 
</div>
    <div id="content-settings">
    <?php
      switch($action){
                case 'create':
                    require_once 'products-module/create-product.php';
                break; 
                case 'modify':
                    require_once 'products-module/modify-product.php';
                break; 
                case 'profile':
                    require_once 'products-module/view-product.php';
                break;
                case 'types':
                    require_once 'products-module/list-product-types.php';
                break;
                default:
                    require_once 'products-module/main.php';
                break; 
            }
    ?>
</div>