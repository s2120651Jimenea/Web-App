<div class="main">
    <div class="submenu-content-transac">
    <a href="index.php?page=receive" class="submenu-button">Receiving Transactions</a> |
    <a href="index.php?page=receive&action=create" class="submenu-button">New Transaction</a> 
</div>
    <div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'receive-module/create-transaction.php';
                break; 
                case 'receive':
                    require_once 'receive-module/receive-products.php';
                break; 
                default:
                    require_once 'receive-module/main.php';
                break; 
            }
    ?>
</div>