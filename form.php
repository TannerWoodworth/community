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

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Form Info</title>
<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/app.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="panel-hd red">
		<h3>Add Student &nbsp;</h3>
	 </div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8" class="panel-bd" method="post" enctype="multipart/form-data" id="add-form">
      <div style="display:none">
        <input type="hidden" name="params_id" value="29012981" />
        <input type="hidden" name="XID" value="18ea403bcc3c213811b871525f42a6b7db3026f6" />
        <input type="hidden" name="csrf_token" value="18ea403bcc3c213811b871525f42a6b7db3026f6" />
      </div>
      <div class="row">
          <div class="twelve columns mobile-four">
            <p style="color:#000;font-size:1em;">This is where you will add a student's information to be displayed on the page.</p>
				<input type="text" name="ustud_name" value="<?php echo $newstud_Name;?>" id="stud_name_id" placeholder="First Name" />
                <div class="section">
                    <span class="danger"><?php echo $stud_nameError; ?></span>
                </div>
				<input type="text" name="uaward" value="<?php echo $newAward; ?>" id="award_id"/>
              <div class="section">
                <span class="danger"><?php echo $awardError; ?></span>
              </div>
                <input type="text" name="uprog_id" value="<?php echo $newProg_id; ?>" id="prog_id_id" />
                <div class="section">
                    <span class="danger"><?php echo $prog_idError; ?></span>
                </div>
                <textarea type="text" name="uquarter" value="<?php echo $newQuarter; ?>" id="quarter_id">Type Here</textarea>
                <div class="section">
                    <span class="danger"><?php echo $quarterError; ?></span>
                </div>   
                <textarea name="udescription" rows="6" cols="50" value="<?php echo $newDescription; ?>" id="description_id">Type Here</textarea>
	           <div class="section">
                    <span class="danger"><?php echo $descriptionError; ?></span>
                </div>
              <label for="image_id">Image of Student:</label>
              <input type="file" name="uimage" value="<?php echo $newImage; ?>" id="image_id">
              <div class="section">
                    <span class="danger">*<?php echo $imageError;?></span>
                </div>
              <div class="four columns mobile-one" id="final-section">
							<input type="submit" value="Submit" class="button white full-width"/>
              </div>
	</form>

<!-- end .student-form -->
    
</body>
</html>
