<?php
//set up a var with this page's title:
$page_title="Edit Student";

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


    //SET UP VARIABLES FOR ERROR MESSAGES IN THE FORM...
    //start them blank
    $stud_nameError='';
    $prog_idError='';
    $quarterError='';
    $awardError='';
    $descriptionError='';
    $stud_image='';

if(isset($_GET['studentID'])){                                      echo "Thay're just come to this page having chosen a student to update";
$stud_stmt = $student->displayStudentInfo($_GET['studentID']);
//query DB, get row's data, while loop:
 while($row = $stud_stmt->fetch(PDO::FETCH_ASSOC)){
    $stud_id=($_GET['studentID']);
    $stud_name=$row['stud_name'];
    $prog_name=$row['prog_name'];
    $prog_id=$row['prog_id'];
    $quarter=$row['quarter'];
    $award=$row['award'];
    $description=$row['description'];
    $image=$row['image'];
 }
}


    //IF FORM HAS BEEN SUBMITTED...
    if($_POST) { echo "FORM on this page HAS BEEN SUBMITTED.";
        //var that starts true but changes to false if any values were wrong 
        $all_valid = true;
        //VALIDATE INPUT: If the users inputs incorrect data, provide feedback and do not add the row to the table.
        
        //ENTER VALIDATION CODE HERE
            $stud_id = $_POST['stud_id'];
            if(empty($_POST['ustud_name'])){
                $all_valid = false; //prevents it from adding row
                //arrange for error feedback
                $stud_nameError='You must enter a name for the student.';
            }else{
                //what they typed was okay, so store it to show it in the form
                $stud_name=$_POST['ustud_name'];
            }
        
            if(empty($_POST['uprog_id'])){
                $all_valid = false; //prevents it from adding row
                //arrange for error feedback
                $prog_idError='You must select what program the student is in.';
            }else{
                //what they typed was okay, so store it to show it in the form
                $prog_id=$_POST['uprog_id'];
            }
        
            if(empty($_POST['uaward'])){
                $all_valid = false; //prevents it from adding row
                //arrange for error feedback
                $awardError='You must select an award status for the student.';
            }else{
                //what they typed was okay, so store it to show it in the form
                $award=$_POST['uaward'];
            }
        
            if(empty($_POST['uquarter'])){
                $all_valid = false; //prevents it from adding row
                //arrange for error feedback
                $quarterError='You must enter what quarter the student is in.';
            }else{
                //what they typed was okay, so store it to show it in the form
                $quarter=$_POST['uquarter'];
            }
        
            if(empty($_POST['udescription'])){
                $all_valid = false; //prevents it from adding row
                //arrange for error feedback
                $decriptionError='You must enter a description for the student';
            }else{
                //what they typed was okay, so store it to show it in the form
                $description=$_POST['udescription'];
            }

        //END VALIDATION
        //ADD THE ROW: if all the values the user typed are valid...
        if($all_valid == true) {
            $student->stud_name = $_POST['ustud_name'];
            $student->prog_id = $_POST['uprog_id'];
            $student->quarter = $_POST['uquarter'];
            $student->award = $_POST['uaward'];
            $student->description = $_POST['udescription'];
            $student->image = $_FILES['uimage'];

            //Perform the following query based on the information provided by the user
            if($student->update($stud_id)){
                echo '<p class="success">Student record has been updated.</p>';
            }else{//otherwise show 'fail' feedback
                echo '<p class="danger">ERROR: Student record has NOT been updated.</p>';
            }
        }//END THE ADD ROW
    }//END THE POST. Now in all cases show them the form...
?>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data" id="add-form">
        	<fieldset>
            	<legend>Add Student:</legend>
                <div class="section">
                	<p class="danger">* indicates a required field</p>
                    <input type="hidden" value="<?php echo $stud_id; ?>" name="stud_id">
                </div>
                <div class="section">
           			<p class="question-text"><label for="stud_name_id">Student Name:</label></p>
            		<p class="answer-text"><input type="text" name="ustud_name" value="<?php echo $stud_name;?>" id="stud_name_id">
                    <span class="danger"><?php echo $stud_nameError; ?></span>
                    </p>
                </div>
                
                <div class="section">
            		<p class="question-text">Program:
                        <select name="uprog_id">
                            
                            <option value="1"
                                     <?php if ($prog_id==1){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >HVAC Technology</option>
                            <option value="2"
                                    <?php if ($prog_id==2){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Welding Technology</option>
                            <option value="3"
                                    <?php if ($prog_id==3){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Accounting</option>
                            <option value="4"
                                    <?php if ($prog_id==4){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Management</option>
                            <option value="5"  
                                    <?php if ($prog_id==5){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Criminal Justice</option>
                            <option value="6"
                                    <?php if ($prog_id==6){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Culinary Arts</option>
                            <option value="7"
                                    <?php if ($prog_id==7){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Hospitality Management Administration</option>
                            <option value="8"
                                    <?php if ($prog_id==8){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Hotel &amp; Restaurant Management</option>
                            <option value="9"
                                    <?php if ($prog_id==9){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Travel &amp; Tourism Management</option>
                            <option value="10"
                                    <?php if ($prog_id==10){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Computer Aided Drafting</option>
                            <option value="11"
                                    <?php if ($prog_id==11){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Architectural Drafting</option>
                            <option value="12"
                                    <?php if ($prog_id==12){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Mechanical Drafing</option>
                            <option value="13"
                                    <?php if ($prog_id==13){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Graphic Design</option>
                            <option value="14"
                                    <?php if ($prog_id==14){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Video Production</option>
                            <option value="15"
                                    <?php if ($prog_id==15){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Web Design/Development</option>
                            <option value="16"
                                    <?php if ($prog_id==16){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Medical Assisting</option>
                            <option value="17"
                                    <?php if ($prog_id==17){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Medical Coding</option>
                            <option value="18"
                                    <?php if ($prog_id==18){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Medical Office Administration</option>
                            <option value="19"
                                    <?php if ($prog_id==19){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Surgical Technology</option>
                            <option value="20"
                                    <?php if ($prog_id==20){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Therapeutic Massage Practitioner</option>
                            <option value="21"
                                    <?php if ($prog_id==21){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Practical Nursing</option>
                            <option value="22"
                                    <?php if ($prog_id==22){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Computer Programming</option>
                            <option value="23"
                                    <?php if ($prog_id==23){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Information Technology</option>
                            <option value="24"
                                    <?php if ($prog_id==24){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Network Administration</option>
                            <option value="25"
                                    <?php if ($prog_id==25){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Network Security &amp; Computer Forensics</option>
                            <option value="26"
                                    <?php if ($prog_id==26){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Electronics Engineering Technology</option>
                            <option value="27"
                                    <?php if ($prog_id==27){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Oil &amp; Gas Electronics</option>
                            <option value="28"
                                    <?php if ($prog_id==28){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Smart Building Technology</option>
                        </select>
                    </p>
                </div>
                
                <div class="section">
            		<p class="question-text"><label for="quarter_id">Quarter:</label></p>
            		<p class="answer-text"><input type="text" name="uquarter" value="<?php echo $quarter; ?>" id="quarter_id">Type Here</textarea>
                    <span class="danger"><?php echo $quarterError; ?></span>
                    </p>
                </div>

                <div class="section">
            		<p class="question-text">Award Status:
                        <select name="uaward">
                            <option value="Nominee"
                                    <?php if ($prog_id=="Nominee"){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Nominee</option>
                            <option value="Winner"
                                    <?php if ($prog_id=="Winner"){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Winner</option>
                            <option value="Honorable Mention"
                                    <?php if ($prog_id=="Honorable Mention"){ ?>
                                    selected="selected" 
                                     <?php } ?>
                                    >Honorable Mention</option>
                        </select>
                    </p>
                </div>
                
                <div class="section">
            		<p class="question-text"><label for="description_id">Enter a description of the student's activities. (400 Character Maximum):</label></p>
            		<p class="answer-text"><textarea name="udescription" rows="6" cols="50" value="<?php echo $description; ?>" id="description_id"><?php echo $description; ?></textarea>
                    <span class="danger"><?php echo $descriptionError; ?></span>
                    </p>
                </div>
                
                <div class="section">
            		<p class="question-text"><label for="image_id">Image for Student:</label></p>
            		<p class="answer-text"><input type="file" name="uimage" value="<?php echo $stud_image; ?>" id="image_id">
                    </p>
            	</div>
                
                <div class="section" id="final-section">
            		<p><input type="submit" /></p>
                </div>
        	</fieldset>
		</form>
