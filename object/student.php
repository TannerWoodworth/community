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
    public $quarter;
    public $description;
    public $award;
    public $image;
    
    /**
     * this method says what to do when a movie object is created
     */
    public function __construct($db){
        //bring in the connection info, store it in this object's $conn property
        $this->conn = $db;
    }
    
    /**
     * the create method makes a new row
     */
     function create(){
        $query = 'INSERT INTO '.this->$table_name.'
            (stud_id, prog_id, stud_name, quarter, description, award, image)
            VALUES
            (null,  ?,  ?,  ?,  ?,  ?, ?)';
        $stmt = $this->conn->prepare($query);
        //fill each question mark with a value the user typed (we stored in property)
		$stmt->bindParam(1,$this->stud_id);
		$stmt->bindParam(2,$this->prog_id);
        $stmt->bindParam(3,$this->stud_name);
        $stmt->bindParam(4,$this->quarter);
		$stmt->bindParam(5,$this->description);
        $stmt->bindParam(6,$this->award);
         
     }
    
}
?>