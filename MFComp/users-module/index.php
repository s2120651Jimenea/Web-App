<div class="main">
    <div class="submenu-content-users">
        <a href="index.php?page=settings&subpage=users" class="submenu-button">View Users</a> |
        <a href="index.php?page=settings&subpage=users&action=create" class="submenu-button">Add User</a> 
        <input class="input-search" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
    </div>
    <div id="content-settings">
    <?php
      switch($action){
                case 'create':
                    require_once 'users-module/create-user.php';
                break; 
                case 'modify':
                    require_once 'users-module/modify-user.php';
                break; 
                case 'profile':
                    require_once 'users-module/view-profile.php';
                break;
                case 'result':
                    require_once 'users-module/search-user.php';
                break;
                default:
                    require_once 'users-module/main.php';
                break; 
            }
    ?>
</div>