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
        //if the image field is empty
        if(empty($_FILES['image']['name'])){
            //set new image filename to the default jpg
            $new_image_filename = 'Default.png';
        }else{//if the user selected an image to use
            //give the new image a name
            $new_image_filename = $this->image['name'];
            //move the uploaded file (from temp location, to the image folder)
            move_uploaded_file($this->image['tmp_name'],'img/'.$new_image_filename); 
        }
         
        $query = 'INSERT INTO '.$this->table_name.'
            (stud_id, stud_name, prog_id, quarter, award, description, image)
            VALUES
            (null,  ?,  ?,  ?,  ?,  ?, ?)';
        $stmt = $this->conn->prepare($query);
        //fill each question mark with a value the user typed (we stored in property)
        $stmt->bindParam(1,$this->stud_name);
        $stmt->bindParam(2,$this->prog_id);
        $stmt->bindParam(3,$this->quarter);
        $stmt->bindParam(4,$this->award);
		$stmt->bindParam(5,$this->description);
        $stmt->bindParam(6,$new_image_filename);
         
        //try running the query. If it works...
		if($stmt->execute()){
		//... send 'true' back to where create() was called
			return true;  
	  	}else{
			return false;
	 	}     
     }
    /**
     * the displayStudents method display all students
     */
     function displayStudent($award){
         $query = 'SELECT stud.stud_id, stud.stud_name, stud.image, school.school_name, p.prog_name, stud.quarter, stud.award, stud.description FROM student_table AS stud INNER JOIN program_table AS p ON stud.prog_id = p.prog_id INNER JOIN school_table AS school ON p.school_id = school.school_id WHERE award = "'.$award.'"';
         $stmt = $this->conn->prepare($query);
         $stmt->execute();
         return $stmt;
     }
    
    /**
     * the studentDetails method retrieves all data for a particular student
     */
     function studentDetails(){
         $query = 'SELECT * FROM '.$this->table_name.' WHERE stud_id = ?';
         $stmt = $this->conn->prepare($query);
         //fill question mark with the student id that is being pulled from the URL
         $stmt->bindParam(1,$this->stud_name);
         
         //try running the query. If it works...
         if($stmt->execute()){
             //... send 'true' back to where create() was called
             return true;  
         }else{
             return false;
         }     
     }
}
?>