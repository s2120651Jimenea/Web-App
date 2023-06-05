<?php
class Receive{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_mfcomp';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_receive($amount){
		
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
	
		$data = [
			[$amount,$NOW,$NOW,'1'],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_receive(rec_amount, rec_date_added, rec_time_added, rec_status) VALUES (?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
	
		return $id;
	
		}

	public function list_product_type(){
		$sql="SELECT * FROM tbl_type";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}
	public function list_receive(){
		$sql="SELECT * FROM tbl_receive";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}

	function get_prod_name($id){
		$sql="SELECT prod_name FROM tbl_product WHERE prod_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$prod_name = $q->fetchColumn();
		return $prod_name;
	}
	function get_prod_type_name($id){
		$sql="SELECT type_name FROM tbl_type WHERE type_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_name = $q->fetchColumn();
		return $type_name;
	}
	function get_receive_date($id){
		$sql="SELECT rec_date_added FROM tbl_receive WHERE rec_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rec_date_added = $q->fetchColumn();
		return $rec_date_added;
	}
	function get_receive_amount($id){
		$sql="SELECT rec_amount FROM tbl_receive WHERE rec_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_id = $q->fetchColumn();
		return $type_id;
	}
	function get_receive_branch($id){
		$sql="SELECT rec_branch FROM tbl_receive WHERE rec_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rec_branch = $q->fetchColumn();
		return $rec_branch;
	}
	function get_receive_save($id){
		$sql="SELECT rec_saved FROM tbl_receive WHERE rec_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rec_saved = $q->fetchColumn();
		return $rec_saved;
	}
	function get_receive_id($id){
		$sql = "SELECT rec_id FROM tbl_receive WHERE rec_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rec_id = $q->fetchColumn();
		return $rec_id;
	}
	public function list_receive_items($id){
		$sql="SELECT * FROM tbl_receive_items WHERE rec_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}

	public function new_receive_item($recid,$prodid,$qty){
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$data = [
			[$recid,$prodid,$qty],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_receive_items(rec_id, prod_id, rec_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}

	public function save_receive_items($id){
		
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$status = 1;
		$sql = "UPDATE tbl_receive SET rec_saved=:rec_saved WHERE rec_id=$id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':rec_saved'=>$status));
		return true;
	}


	public function save_to_inventory($id){
		$sql="SELECT * FROM tbl_receive_items WHERE rec_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		$stmt = $this->conn->prepare("INSERT INTO tbl_product_inv(rec_id, prod_id, prod_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row){
				extract($row);
				$stmt->execute(array($rec_id,$prod_id,$rec_qty));
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}
}