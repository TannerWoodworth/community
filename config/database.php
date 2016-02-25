<?php

  class Database {
	//properties every database has: proper credentials
    private $host = 'localhost';
	private $db_name = 'stuentdb';
	private $username = 'root';
	private $password = 'root';
	public $conn;

    /**
     * this method makes the database connection
	 * @return then connection object called $conn
     */
    public function getConnection() {
      //clear the connection
	  $this->conn = null;
	  try{
		  //make a connection to the server and database using a PHP Data Object (PDO)<br>
			//In the PDO object's() is a comma separated list of 3 arguments:
			// kindofdatabase:host=serverhostname;dbname=databasename
			// username
			// password
			
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,$this->username, $this->password);
	  }catch(PDOException $ex){
		  echo "Connection error:".$ex->getMessage();
	  }//closes try/catch
	  return $this->conn;
    }//end function getConnection

  }//closes Database class

?>
