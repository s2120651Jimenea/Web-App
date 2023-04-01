<h3>Releasing List</h3>
<div id="subcontent">
    <table id="data-list-transac">
      <tr>
        <th>Releasing ID</th>
        <th>Releasing Date</th>
        <th>Branch</th>
        <th>Status</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($release->list_release() != false){
foreach($release->list_release() as $value){
   extract($value);
  
?>
      <tr>
        <td><a href="index.php?page=release&action=release&id=<?php echo $rel_id;?>"><?php echo $rel_id;?></a></td>
        <td><?php echo $rel_date_added;?></a></td>
        <td><?php echo $rel_branch;?></td>
        <td><?php if($rel_saved == 0){
            echo "In Process";
          }else{
            echo "Completed Transaction";
          }
          ?>
          </td>
      </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>