<?php
/**
 * Student is a class that defines what a student object can do
 * student data: create, remove, readAll, readDetails
 *
 */

class Student {
    //properties: database connection and table name
    private $conn;
    private $table_name ='student_table';
    //object properties: one for each field of our table
    public $stud_id;
    public $prog_id;
    public $stud_name;
    public $image;
    public $quarter;
    public $description;
    public $award;
	
	/**
     * this method says what to do when a movie object is created
     */
	 public function __construct($db){
		 //bring in the connection info, store it in this object's $conn property
		$this->conn = $db;
	 }
	 
	}
?>