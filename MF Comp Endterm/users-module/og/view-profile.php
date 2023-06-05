<?php
 if($user_access_level == 'Staff' && $user_id_login != $id){
    header("location: index.php?page=settings&subpage=users");
 }
?>
<h3>System User Profile</h3>
<div class="btn-box">
<?php
 if($user_access_level != 'Staff'){
?>
<a class="btn-jsactive" onclick="document.getElementById('id03').style.display='block'">Change Email</a> | 
<?php
 }
?>
<a class="btn-jsactive" onclick="document.getElementById('id02').style.display='block'">Change Password</a> | 
<?php
 if($user_access_level != 'Staff'){
?>         
          <?php
            if($user->get_user_status($id) == "1"){
              ?>
                <a class="btn-jsactive" onclick="document.getElementById('id01').style.display='block'">Disable Account</a>
              <?php
            }else{ 
            ?>
                <a class="btn-jsactive" onclick="document.getElementById('id01').style.display='block'">Activate Account</a>
            <?php
            }
            ?>
<?php
 }
?>
</div>
<br/>
<div id="form-block-user">
<form method="POST" action="processes/process.user.php?action=update">
        <div id="form-block-half">
            <label for="fname" class="input-text">First Name</label>
            <input <?php if($user_access_level == 'Staff'){ echo 'disabled';};?> type="text" id="fname" class="input" name="firstname" value="<?php echo $user->get_user_firstname($id);?>" placeholder="Your name..">

            <label for="lname" class="input-text">Last Name</label>
            <input <?php if($user_access_level == 'Staff'){ echo 'disabled';};?> type="text" id="lname" class="input" name="lastname" value="<?php echo $user->get_user_lastname($id);?>" placeholder="Your last name..">

            <label for="access" class="input-text">Access Level</label>
            <select <?php if($user_access_level == 'Staff'){ echo 'disabled';};?> id="access" name="access">
              <option value="owner" <?php if($user->get_user_access($id) == "Owner"){ echo "selected";};?>>Owner</option>
              <option value="manager" <?php if($user->get_user_access($id) == "Manager"){ echo "selected";};?>>Manager</option>
              <option value="staff" <?php if($user->get_user_access($id) == "Staff"){ echo "selected";};?>>Staff</option>
            </select>
            <label for="branch" class="input-text">Branch</label>
            <select <?php if($user_access_level == 'Staff'){ echo 'disabled';};?> sid="branch" name="branch">
              <option value="Main" <?php if($user->get_user_branch($id) == "Main Branch"){ echo "selected";};?>>Main Branch</option>
              <option value="Second" <?php if($user->get_user_branch($id) == "Second Branch"){ echo "selected";};?>>Second Branch</option>
              <option value="Mandalagan" <?php if($user->get_user_branch($id) == "Mandalagan Branch"){ echo "selected";};?>>Mandalagan Branch</option>
              <option value="Kabankalan" <?php if($user->get_user_branch($id) == "Kabankalan Branch"){ echo "selected";};?>>Kabankalan Branch</option>
            </select>
        </div>
     
        <div id="form-block-half">
            <label for="status" class="input-text">Account Status</label>
            <select id="status" name="status" disabled>
              <option <?php if($user->get_user_status($id) == "0"){ echo "selected";};?>>Deactivated</option>
              <option <?php if($user->get_user_status($id) == "1"){ echo "selected";};?>>Active</option>
            </select>
            <label for="email" class="input-email">Email</label>
            <input <?php if($user_access_level == 'Staff'){ echo 'disabled';};?> type="email" id="email" class="input" name="email" disabled value="<?php echo $user->get_user_email($id);?>" placeholder="Your email..">
            <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
        </div>
        <div id="button-block">
        <input <?php if($user_access_level == 'Staff'){ echo 'disabled';};?>  type="submit" value="Update Profile">
        <?php if ($user->get_user_status($id) == "1") { ?>
          <a <?php if ($user_access_level == 'Staff') { echo 'disabled'; } ?> class="statusbtn" onclick="document.getElementById('id01').style.display='block'">Disable Account</a>
        <?php } else { ?>
          <a <?php if ($user_access_level == 'Staff') { echo 'disabled'; } ?> class="statusbtn" onclick="document.getElementById('id01').style.display='block'">Activate Account</a>
        <?php } ?>
        </div>
   
        <div id="id01" class="modal">
          <div id="form-update" class="modal-content">
            <div class="container-user">
              <h2>Change User Status</h2>
              <p>Are you sure you want to change user status?</p>
              <div class="clearfix">
                <?php if ($user->get_user_status($id) == "1") { ?>
                  <button class="confirmbtn-change" onclick="disableSubmit()" <?php if ($user_access_level == 'Staff') { echo 'disabled'; } ?>>Confirm</button>
                <?php } else { ?>
                  <button class="confirmbtn-change" onclick="enableSubmit()" <?php if ($user_access_level == 'Staff') { echo 'disabled'; } ?>>Confirm</button>
                <?php } ?>
                <button class="cancelbtn" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
              </div>
            </div>
          </div>
        </div>


<div id="id02" class="modal">
  <div #id="form-update" class="modal-content">
    <div class="container-user">

      <h2>Update User Password</h2>

      <form method="POST" id="passwordForm" action="processes/process.user.php?action=updatepassword">
      <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
        <label for="crpassword" class="input-text-prod">Current Password</label>
            <input type="password" id="crpassword" class="input" name="crpassword" placeholder="Current Password"> 
            <label for="npassword" class="input-text-prod">New Password</label>
            <input type="password" id="npassword" class="input" name="npassword" placeholder="New Password"> 
            <label for="copassword" class="input-text-prod">Confirm Password</label>
            <input type="password" id="copassword" class="input" name="copassword" placeholder="Confirm Password">           
       </form> 
      <div class="clearfix">
      <button class="cancelbtn" onclick="document.getElementById('id02').style.display='none'">Cancel</button>
      <button class="submitbtn-update" onclick="passwordSubmit()">Confirm</button>
        
      </div>
    </div>
  </div>
</div>

<div id="id03" class="modal">
  <div #id="form-update" class="modal-content">
    <div class="container-user">
   
      <h2>Update User Email</h2>

      <form method="POST" id="emailForm" action="processes/process.user.php?action=updateemail">
      <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
        <label for="useremail" class="input-text-prod">Current Email</label>
            <input type="email" id="useremail" class="input" name="useremail" placeholder="Current Email"> 
            <label for="crpassword" class="input-text-prod">Current Password</label>
            <input type="password" id="crpassword" class="input" name="crpassword" placeholder="Current Password"> 
            <label for="copassword" class="input-text-prod">New Email</label>
            <input type="email" id="newemail" class="input" name="newemail" placeholder="New Email">           
       </form> 
      <div class="clearfix">
      <button class="cancelbtn" onclick="document.getElementById('id03').style.display='none'">Cancel</button>
      <button class="submitbtn-update" onclick="emailSubmit()">Confirm</button>
        
        </div>
      </div>
    </div>
  </div>

<script>
var modal = document.getElementById('id01');
var modal_password = document.getElementById('id02');
var modal_email = document.getElementById('id03');

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }else if(event.target == modal_password){
    modal_password.style.display = "none";
  }else if(event.target == modal_email){
    modal_email.style.display = "none";
  }
}

function enableSubmit() {
    window.location.href = "processes/process.user.php?action=status&id=<?php echo $id;?>&status=1";
}
function disableSubmit() {
    window.location.href = "processes/process.user.php?action=status&id=<?php echo $id;?>&status=0";
}
function passwordSubmit() {
  document.getElementById("passwordForm").submit();
}
function emailSubmit() {
  document.getElementById("emailForm").submit();
}
</script>