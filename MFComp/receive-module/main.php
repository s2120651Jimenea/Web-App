<h3>Supplier Transaction</h3>
<div id="subcontent">
    <table id="data-list-transac">
      <tr>
        <th>Transaction ID</th>
        <th>Receive Date</th>
        <th>Amount</th>
        <th>Status</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($receive->list_receive() != false){
foreach($receive->list_receive() as $value){
   extract($value);
  
?>
      <tr>
        <td><a href="index.php?page=receive&action=receive&id=<?php echo $rec_id;?>"><?php echo $rec_id;?></a></td>
        <td><?php echo $rec_date_added;?></a></td>
        <td><?php echo $rec_amount;?></td>
        <td><?php if($rec_saved == 0){
            echo "In process";
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