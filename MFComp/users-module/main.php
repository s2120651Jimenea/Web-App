<h3>System Users</h3>
    <table id="data-list">
      <tr>
        <th>Name</th>
        <th>Access Level</th>
        <th>Branch</th>
        <th>Email</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($user->list_users() != false){
foreach($user->list_users() as $value){
   extract($value);
  
?>
      <tr>
        <td><a href="index.php?page=settings&subpage=users&action=profile&id=<?php echo $user_id;?>"><?php echo $user_fname.' '.$user_lname;?></a></td>
        <td><?php echo $user_access;?></td>
        <td><?php echo $user_branch;?></td> 
        <td><?php echo $user_email;?></td>
      </tr>
<?php
 $count++;
  }
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>