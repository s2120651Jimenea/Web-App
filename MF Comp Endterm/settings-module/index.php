<div class="main">
    <div class="submenu-content-settings">
        <a href="index.php?page=settings&subpage=users" class="submenu-button-settings">Users</a> 
        <a href="index.php?page=settings&subpage=products" class="submenu-button-settings">Products</a> 
        <a href="index.php?page=settings&subpage=report" class="submenu-button-settings">Reports</a>
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
                case 'report':
                    require_once 'report-module/index.php';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>