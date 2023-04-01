<div class="main">
    <div class="submenu-content-transac">
    <a href="index.php?page=release" class="submenu-button">Releasing Transactions</a> | 
    <a href="index.php?page=release&action=create" class="submenu-button">New Transaction</a> | 
</div>
    <div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'release-module/create-transaction.php';
                break; 
                case 'release':
                    require_once 'release-module/release-products.php';
                break; 
                default:
                    require_once 'release-module/main.php';
                break; 
            }
    ?>
  </div>