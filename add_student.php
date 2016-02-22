<?php
//set up a var with this page's title:
$page_title="Add Student";
?>

<?php
//FUTURE CONCERN:
//Will need to find out what the user administration system is so we can redirect the user away from this page if they do not have the appropriate permissions to add a new student record.

//if user is not logged in redirect them to login page

//if(!isset($_SESSION['logged_in'])){
//	//redirect to login page
//	header('Location:login.php');
//	exit();
//}
?>
<?php
    //SET UP VARIABLES FOR VALUES AND ERROR MESSAGES IN THE FORM...
    //start them blank
    $newStud_name='';
    $stud_nameError=''
    $newProg_id='';
    $prog_idError='';
    $newQuarter='';
    $quarterError='';
    $newAward='';
    $awardError='';
    $newDescription='';
    $descriptionError='';
    $newImage='';
    $imageError='';

    //IF FORM HAS BEEN SUBMITTED...
    if($_POST) {
        //var that starts true but changes to false if any values were wrong 
        $all_valid = true;
        //VALIDATE INPUT: If the users inputs incorrect data, provide feedback and do not add the row to the table.
        
        //ENTER VALIDATION CODE HERE
        
        //END VALIDATION
        
        //ADD THE ROW: if all the values the user typed are valid...
        if($all_valid == true) {
            //bring in external files
            include_once('config/database.php');
            include_once('object/student.php');
            //make a db object:
            $database = new Database();
            //make it connect:
            $conn=$database->getConnection();
            // instantiate a new student object
            $student = new $student($conn);
            //store in the object's properties what the user typed in the form.
            $student->stud_name = $_POST['ustud_name'];
            $student->prog_id = $_POST['uprog_id'];
            $student->quarter = $_POST['uquarter'];
            $student->award = $_POST['uaward'];
            $student->description = $_POST['udescription'];
            $student->image = $_FILES['uimage'];

            //Perform the following query based on the information provided by the user
            if($student->create()){
                echo '<p class="success">Student record has been added.</p>';
            }else{//otherwise show 'fail' feedback
                echo '<p class="danger">ERROR: Student record has NOT been added.</p>';
            }
        }//END THE ADD ROW
    }//END THE POST. Now in all cases show them the form...
?>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" id="add-form">
        	<fieldset>
            	<legend>Add Student:</legend>
                <div class="section">
                	<p class="danger">* indicates a required field</p>
                </div>
                
                <div class="section">
           			<p class="question-text"><label for="stud_name_id">Student Name:</label></p>
            		<p class="answer-text"><input type="text" name="ustud_name" value="<?php echo $newstud_Name;?>" id="stud_name_id">
                    <span class="danger"><?php echo $stud_nameError; ?></span>
                    </p>
                </div>
                
                <div class="section">
            		<p class="question-text"><label for="prog_id_id">Program:</label></p>
            		<p class="answer-text"><span class="question-text">$ </span><input type="text" name="uprog_id" value="<?php echo $newProg_id; ?>" id="prog_id_id" />
                    <span class="danger"><?php echo $prog_idError; ?></span>
                    </p>
                </div>
                
                <div class="section">
            		<p class="question-text"><label for="quarter_id">Quarter:</label></p>
            		<p class="answer-text"><input type="text" name="uquarter" value="<?php echo $newQuarter; ?>" id="quarter_id">Type Here</textarea>
                    <span class="danger"><?php echo $quarterError; ?></span>
                    </p>
                </div>

                <div class="section">
            		<p class="question-text"><label for="award_id">Award:</label></p>
            		<p class="answer-text"><span class="question-text">$ </span><input type="text" name="uaward" value="<?php echo $newAward; ?>" id="award_id" />
                    <span class="danger"><?php echo $awardError; ?></span>
                    </p>
                </div>
                
                <div class="section">
            		<p class="question-text"><label for="description_id">Enter Description For Safe (400 Character Maximum):</label></p>
            		<p class="answer-text"><textarea name="udescription" rows="6" cols="50" value="<?php echo $newDescription; ?>" id="description_id">Type Here</textarea>
                    <span class="danger"><?php echo $descriptionError; ?></span>
                    </p>
                </div>
                
                <div class="section">
            		<p class="question-text"><label for="image_id">Image for Safe:</label></p>
            		<p class="answer-text"><input type="file" name="uimage" value="<?php echo $newImage; ?>" id="image_id">
                    <span class="danger">*<?php echo $imageError;?></span>
                    </p>
            	</div>
                
                <div class="section" id="final-section">
            		<p><input type="submit" /></p>
                </div>
        	</fieldset>
		</form>
                    
<?php
//include text that end the page
include_once 'includes/footer.php';?>
