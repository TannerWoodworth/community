<?php
//set up a var with this page's title:
$page_title="Add Student";
include_once('includes/header.php');
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
    $stud_nameError='';
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
				<input type="text" name="ustud_name" value="<?php echo $newStud_name;?>" id="stud_name_id" placeholder="Student Name" />
                <div class="section">
                    <span class="danger"><?php echo $stud_nameError; ?></span>
                </div>
<!--				<input type="text" name="uaward" value="<?php // echo $newAward; ?>" id="award_id" placeholder="Award"/>-->
              <select name="uaward">
                <option value="Nominee">Nominee</option>
                <option value="Winner">Winner</option>
                <option value="Honorable Mention">Honorable Mention</option>
              </select>
              <div class="section">
                <span class="danger"><?php echo $awardError; ?></span>
              </div>
<!--                <input type="text" name="uprog_id" value="<?php echo $newProg_id; ?>" id="prog_id_id" placeholder="Program"/>--><!-- Adams original -->
              <select name="uprog_id">
                            <option value=1>HVAC Technology</option>
                            <option value=2>Welding Technology</option>
                            <option value=3>Accounting</option>
                            <option value=4>Management</option>
                            <option value=5>Criminal Justice</option>
                            <option value=6>Culinary Arts</option>
                            <option value=7>Hospitality Management Administration</option>
                            <option value=8>Hotel &amp; Restaurant Management</option>
                            <option value=9>Travel &amp; Tourism Management</option>
                            <option value=10>Computer Aided Drafting</option>
                            <option value=11>Architectural Drafting</option>
                            <option value=12>Mechanical Drafing</option>
                            <option value=13>Graphic Design</option>
                            <option value=14>Video Production</option>
                            <option value=15>Web Design/Development</option>
                            <option value=16>Medical Assisting</option>
                            <option value=17>Medical Coding</option>
                            <option value=18>Medical Office Administration</option>
                            <option value=19>Surgical Technology</option>
                            <option value=20>Therapeutic Massage Practitioner</option>
                            <option value=21>Practical Nursing</option>
                            <option value=22>Computer Programming</option>
                            <option value=23>Information Technology</option>
                            <option value=24>Network Administration</option>
                            <option value=25>Network Security &amp; Computer Forensics</option>
                            <option value=26>Electronics Engineering Technology</option>
                            <option value=27>Oil &amp; Gas Electronics</option>
                            <option value=28>Smart Building Technology</option>
                        </select>
                <div class="section">
                    <span class="danger"><?php echo $prog_idError; ?></span>
                </div>
                <textarea type="text" name="uquarter" value="<?php echo $newQuarter; ?>" id="quarter_id" placeholder="Type Student's Quarter Here" ></textarea>
                <div class="section">
                    <span class="danger"><?php echo $quarterError; ?></span>
                </div>   
                <textarea name="udescription" rows="6" cols="50" value="<?php echo $newDescription; ?>" id="description_id" placeholder="Type Student's Biography Here"></textarea>
	           <div class="section">
                    <span class="danger"><?php echo $descriptionError; ?></span>
                </div>
              <label for="image_id">Image of Student:</label>
              <input type="file" name="uimage" value="<?php echo $newImage; ?>" id="image_id">
              <div class="section">
                    <span class="danger">*<?php echo $imageError;?></span>
                </div>
              <div class="four columns mobile-one" id="final-section">
							<input type="submit" value="Submit" />
              </div>
          </div>
	</form>

</body>
</html>
<?php
//include text that end the page
//include_once 'includes/footer.php';?>
