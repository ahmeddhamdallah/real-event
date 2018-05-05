<?php 
/**
* 
*/
class database
{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $db_name = DB_NAME;

	public $link;


	function __construct()
	{
		$this->connect();
		# code...
	}
	private function connect () {
		$this->link = new mysqli($this->host,$this->user,$this->pass,$this->db_name);

	}
	public function select($query){

		$result = $this->link->query($query);

		if($result->num_rows > 0){
			return $result;
		}
		else {
			return false;

		}
	}

	public function delete($query){
		$delete = $this->link->query($query);
	
	
			echo "done";
		
	
	
}	
	

	
	public function insert($query){
		$insert = $this->link->query($query);
	}

		/*if ($insert) {
		   ('insert= Post inserted...');*/
			/*fullheight('location: sports.php?insert= Post updated...');
			container('location: home.php?insert= Post inserted...');
			container('location: sports.php?insert= Post inserted...');
			container('location: admin\index.php?insert= Post inserted...');
			container('location: admin\addnews.php?insert= Post inserted...');
			container('location: admin\addcategory.php?insert= Post inserted...');


			
		}
		else {
			echo "Post did not insert";
		}
	}*/
	public function update($query){
		$update = $this->link->query($query);
	}

		/*if ($update) {
			fullheight('location: home.php?update= Post updated...');
			fullheight('location: sports.php?update= Post updated...');
			container('location: home.php?update= Post inserted...');
			container('location: sports.php?update= Post inserted...');
			container('location: admin\index.php?insert= Post inserted...');

			
		}
		else {
			echo "Post did not update";
		}
	}*/
	
}