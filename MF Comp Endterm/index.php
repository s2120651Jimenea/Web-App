<?php
include_once 'classes/class.user.php';
include_once 'classes/class.product.php';
include_once 'classes/class.receive.php';
include_once 'classes/class.release.php';
include_once 'classes/class.inventory.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
$product = new Product();
$receive = new Receive();
$release = new Release();
$inventory = new Inventory();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
$user_id_login = $user->get_user_id($_SESSION['user_email']);
$user_access_level = $user->get_user_access($user_id_login);
?>
<!DOCTYPE html>
<html>
		<head>
			<meta charset="UTF-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="css/stylesheet.css">
			<link rel="icon" href="images/logo2.png">

			<title>MF Computer Solutions</title>
		</head>
	<body>
		<div class="topnav">

		  <div class="topnav-centered">
		  </div>

            <div class="sidenav">
            <img class="index-userprofile" src="images/userprofile.png">
            <span class="user-info">
                <?php echo 'Welcome, '.$user->get_user_firstname($user_id);?>
            <br></span>
            <span class="user-access">
                <?php echo $user->get_user_access($user_id);?></p>
            </span>
            <span class="move-right">
                <a href="index.php">Home</a>
                <a href="index.php?page=receive">Receiving</a>
                <a href="index.php?page=release">Releasing</a>
                <a href="index.php?page=settings">Settings</a>
            </span>
            </div>
         </div>
         <div class="main">
         <img class="index-logo" src="images/LOGO.png">
            <div class="topnav-right">
                <a href="logout.php" class="menu-logout">
                    <i class="fa fa-sign-out"></i>
                </a>
            </div>               
        </div>
                <?php
                switch($page){
                            case 'users':
                                require_once 'users-module/index.php';
                            break; 
                            case 'products':
                                require_once 'products-module/index.php';
                            break; 
                            case 'receive':
                                require_once 'receive-module/index.php';
                            break;
                            case 'release':
                                require_once 'release-module/index.php';
                            break; 
                            case 'settings':
                                require_once 'settings-module/index.php';
                            break; 
                            default:
                                require_once 'main.php';
                            break; 
                        }
                ?>
            </div>
        </div>
    </div>
	</body>
</html>