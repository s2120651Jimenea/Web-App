<div class="main">
    <div class="submenu-content-settings">
        <a href="index.php?page=settings&subpage=users" class="submenu-button-settings">Users</a> 
        <a href="index.php?page=settings&subpage=products" class="submenu-button-settings">Products</a> 
    </div>
<div id="content">
    <?php
      switch($subpage){
                case 'users':
                    require_once 'users-module/index.php';
                break; 
                case 'products':
                    require_once 'products-module/index.php';
                break; 
                case 'module_xxx':
                    require_once 'module-folder/';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>