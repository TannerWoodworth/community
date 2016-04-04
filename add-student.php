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
    $newStud_gender='';
    $genderError='';
    $newProg_id='';
    $prog_idError='';
    $newQuarter='';
    $quarterError='';
    $newAward='';
    $awardError='';
    $newDescription='';
    $descriptionError='';
    $newImage='';

    //IF FORM HAS BEEN SUBMITTED...
    if($_POST) {
        //var that starts true but changes to false if any values were wrong 
        $all_valid = true;
        //VALIDATE INPUT: If the users inputs incorrect data, provide feedback and do not add the row to the table.
        
        //ENTER VALIDATION CODE HERE
        
            if(empty($_POST['ustud_name'])){
                $all_valid = false; //prevents it from adding row
                //arrange for error feedback
                $stud_nameError='You must enter a name for the student.';
            }else{
                //what they typed was okay, so store it to show it in the form
                $newStud_name=$_POST['ustud_name'];
            }
        
            if(empty($_POST['ugender'])){
                $all_valid = false; //prevents it from adding row
                //arrange for error feedback
                $genderError="You must select a gender for the student.";
            }else{
                //what they typed was okay, so store it to show it in the form
                $newStud_gender=$_POST['ugender'];
            }
        
            if(empty($_POST['uprog_id'])){
                $all_valid = false; //prevents it from adding row
                //arrange for error feedback
                $prog_idError='You must select what program the student is in.';
            }else{
                //what they typed was okay, so store it to show it in the form
                $newProg_id=$_POST['uprog_id'];
            }
        
            if(empty($_POST['uaward'])){
                $all_valid = false; //prevents it from adding row
                //arrange for error feedback
                $awardError='You must select an award status for the student.';
            }else{
                //what they typed was okay, so store it to show it in the form
                $newAward=$_POST['uaward'];
            }
        
            if(empty($_POST['uquarter'])){
                $all_valid = false; //prevents it from adding row
                //arrange for error feedback
                $quarterError='You must enter what quarter the student is in.';
            }else{
                //what they typed was okay, so store it to show it in the form
                $newQuarter=$_POST['uquarter'];
            }
        
            if(empty($_POST['udescription'])){
                $all_valid = false; //prevents it from adding row
                //arrange for error feedback
                $decriptionError='You must enter a description for the student';
            }else{
                //what they typed was okay, so store it to show it in the form
                $newDescription=$_POST['udescription'];
            }
        
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
            $student = new Student($conn);
            //store in the object's properties what the user typed in the form.
            $student->stud_name = $_POST['ustud_name'];
            $student->gender = $_POST['ugender'];
            $student->prog_id = $_POST['uprog_id'];
            $student->quarter = $_POST['uquarter'];
            $student->award = $_POST['uaward'];
            $student->description = $_POST['udescription'];
            $student->image = $_FILES['uimage'];

            //Perform the following query based on the information provided by the user
            ?>
            <div class="msg-container-add">
            <?php
            if($student->create($_POST['ugender'])){
                echo '<p class="success">Student record has been added.</p>';
            }else{//otherwise show 'fail' feedback
                echo '<p class="danger">ERROR: Student record has NOT been added.</p>';
            }
        }//END THE ADD ROW
        ?>
        </div>
<?php
    }//END THE POST. Now in all cases show them the form...
?>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" id="add-form">
        	<fieldset>
            	<legend>Add Student:</legend>
                <div class="section">
                	<p class="success">* Indicates a Required Field</p>
                </div>
                
                <div class="section">
           			<p class="question-text"><label for="stud_name_id">Student Name: (Ex: John Smith)</label></p>
            		<p class="answer-text"><input type="text" name="ustud_name" value="<?php echo $newStud_name;?>" id="stud_name_id"  placeholder="John Smith">
                    <span class="validation danger"><?php echo $stud_nameError; ?></span>
                    </p>
                </div>
                
                <div class="section">
                    <p class="question-text"><label for="stud_gender">Gender: (This Won't Be Displayed)</label></p>
                    <select name="ugender">
                        <option value='Male'>Male</option>
                        <option value='Female'>Female</option>
                    </select>
                </div>
                
                <div class="section">
                    <p class="question-text">Program:</p>
<!-- *Dennis' Form Below
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
-->
                    <select name="uprog_id" class="no-custom" id="freeform_choose_a_pti_program">
                    <option value="">Please Select a Program</option>
                    <optgroup label="School of Trades Technology">
                    <option value="1">HVAC Technology</option>
                    <option value="2">Welding Technology</option>
                    </optgroup>
                    <optgroup label="School of Business">
                    <option value="3">Accounting</option>
                    <option value="4">Management</option>
                    </optgroup>
                    <optgroup label="School of Criminal Justice">
                    <option value="5">Criminal Justice</option>
                    </optgroup>
                    <optgroup label="School of Hospitality and Culinary Arts">
                    <option value="6">Culinary Arts</option>
                    <option value="7">Hospitality Management Administration</option>
                    <option value="8">Hotel & Restaurant Management</option>
                    <option value="9">Travel & Tourism Management</option>
                    </optgroup>
                    <optgroup label="School of Design">
                    <option value="10">Computer Aided Drafting - CAD</option>
                    <option value="11">Architectural Drafting</option>
                    <option value="12">Mechanical Drafting</option>
                    <option value="13">Graphic Design</option>
                    <option value="14">Video Production</option>
                    <option value="15">Web Design/Development</option>
                    </optgroup>
                    <optgroup label="School of Healthcare">
                    <option value="16">Medical Assisting</option>
                    <option value="17">Medical Coding</option>
                    <option value="18">Medical Office Administration</option>
                    <option value="19">Surgical Technology</option>
                    <option value="20">Therapeutic Massage Practitioner</option>
                    </optgroup>
                    <optgroup label="School of Nursing">
                    <option value="21">Practical Nursing</option>
                    <option value="22">Associate in Science, Nursing</option>
                    </optgroup>
                    <optgroup label="School of Information Technology">
                    <option value="23">Computer Programming</option>
                    <option value="24">Information Technology</option>
                    <option value="25">Network Administration</option>
                    <option value="26">Network Security & Computer Forensics</option>
                    </optgroup>
                    <optgroup label="School of Energy and Electronics Technology">
                    <option value="27">Electronics Engineering Technology</option>
                    <option value="28">Oil & Gas Electronics</option>
                    <option value="29">Smart Building Technology</option>
                    </optgroup>
                    </select>
                </div>
                <div class="section">
            		<p class="question-text"><label for="quarter_id">Quarter: (Ex: 3rd, 4th)</label></p>
            		<p class="answer-text"><input type="text" name="uquarter" value="<?php echo $newQuarter; ?>" id="quarter_id" placeholder="Ex: 3rd, 4th">
                    <span class="validation danger"><?php echo $quarterError; ?></span>
                    </p>
                </div>

                <div class="section">
            		<p class="question-text">Award Status:
                        <select name="uaward">
                            <option value="Nominee">Nominee</option>
                            <option value="Award Recipient">Award Recipient</option>
                            <option value="Honorable Mention">Honorable Mention</option>
                        </select>
                    </p>
                </div>
                
                <div class="section">
            		<p class="question-text"><label for="description_id">Enter a description of the student's activities. (400 Character Maximum):</label></p>
            		<p class="answer-text"><textarea name="udescription" rows="6" cols="50" value="<?php echo $newDescription; ?>" id="description_id" placeholder="Type Here"></textarea>
                    <span class="vaidation danger"><?php echo $descriptionError; ?></span>
                    </p>
                </div>
                
                <div class="section">
            		<p class="question-text"><label for="image_id">Image for Student:</label></p>
            		<p class="answer-text"><input type="file" name="uimage" value="<?php echo $newImage; ?>" id="image_id">
                    </p>
            	</div>
                
                <div class="section" id="final-section">
            		<p><input type="submit" /></p>
                </div>
                <a class="award-page" href="award.php">View Student Recognition Page</a>
        	</fieldset>
		</form>

