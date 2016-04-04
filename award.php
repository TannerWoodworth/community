<!doctype html>
<html>
<?php 
    include('config/database.php');
    include('object/student.php');
    //make a database object:
    $database = new Database();
    //make it connect:
    $conn=$database->getConnection();
    // instantiate a new student object
    $student = new Student($conn);
    if(isset($_GET['deleteid'])){
    //if there is a delete id, it sets the Student ID to it
    $student->stud_id = $_GET['deleteid'];
    //Then runs function delete
    $stmt = $student->delete();
    }
?>

<head>
    <meta charset="utf-8">
    <title>Community Service</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" type="text/css" href="css/app.css"> -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="image/ico" href="images/favicon.ico">
</head>

<body class="clearfix">
    <div class="content_div">
        <div class="msg-container">
            <?php
            //loop through that variable, repeating a procedure once per row
    if($student->delete()){
    //show pos feedback
    echo '<p class="success">The student has been deleted from the page.</p>';

    }else{//otherwise show 'fail' feedback
    echo '<p class="danger">The student hase NOT been deleted from the page.</p>';
    }
        ?>
        </div>
        <div class="header">
        <h1>Community Service</h1>
        <p>The efforts of our students, faculty and staff haven''t gone unnoticed. We are proud of the fact that we have received national and statewide awards. The Pennsylvania Association of Private School Administrators (PAPSA) and the Association of Private Sector Colleges and Universities (APSCU) have honored our family with their annual community service awards on multiple occasions.</p>
        </div> <!--End Header-->
        
        <div id="tables_container">
            <section class="tables">
                <div id="awards">
                    <!-- Echo Section Title Here -->
                    <h2 class="sect_title">Award Recipients</h2>
                    <?php
                        $stmt = $student->displayStudentAward('Award Recipient');
                        //retrieve all students who are a nominee
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>
                <section class="img-sum-box">
                    <div class="s_img_box">.
                        <!-- Echo Student Img Here -->
                        <img style="max-width:250px!important;" src="img/<?php echo $row['image']; ?>"/>
                    </div>
                    <div class="s_sum">
                        <!-- Echo Student Name Here -->
                        <h3 class="s_name">Student Name: <span class="display-text"> <?php echo $row['stud_name']; ?></span></h3>
                        <!-- Echo Student Award Here -->
                        <h4 class="s_award">Category: <span class="display-text"><?php echo $row['award']; ?></span></h4>
                        <!-- Echo Student School here-->
                        <h5 class="s_school">School: <span class="display-text"><?php echo $row['school_name']; ?></span></h5>
                        <!-- Echo Student Program Here -->
                        <h5 class="s_program">Program: <span class="display-text"><?php echo $row['prog_name']; ?></span></h5>
                        <!-- Echo Student Program Here -->
                        <h5 class="s_quarter">Quarter: <span class="display-text"><?php echo $row['quarter']; ?></span></h5>
                    </div>
                </section> <!-- Cose img-sum-box -->
                    <div class="s_bio_box">
                        <!-- Echo Student Bio Here -->
                        <p class="s_bio"><span class="display-text"><?php echo $row['description']; ?></span></p>
                    </div>
                    <div class="edit-disc">
                    <!--This creates a Delete Button which links that products delete ID to the button that way when clicked it knows which to delete-->
                    <a alt="Delete Disc" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);//Refers to the page its on ?>?deleteid=<?php echo $row['stud_id']?>">
                    <div class="delete-button">Delete Student</div>
                    </a>
                    </div>
                    <?php
                        //close Nominee while looop
                        }
                    ?>
                    
                </div> <!-- End Award -->
            </section> <!-- End tables 1 -->
            <section class="tables">
                <div id="h_mentions" >
                    <!-- Echo Section Title Here -->
                    <!-- These are students who didnt win, but were in the running-->
                    <h2 class="sect_title">Honorable Mentions</h2>
                    <?php
                        $stmt = $student->displayStudentAward('Honorable Mention');
                        //retrieve all students who are a nominee
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>
                <section class="img-sum-box">
                    <div class="s_img_box">
                        <!-- Echo Student Img Here -->
                        <img src="img/<?php echo $row['image']; ?>">
                    </div>
                    <div class="s_sum">
                        <!-- Echo Student Name Here -->
                        <h3 class="s_name">Student Name: <span class="display-text"><?php echo $row['stud_name']; ?></span></h3>
                        <!-- Echo Student Award Here -->
                        <h4 class="s_award">Category: <span class="display-text"><?php echo $row['award']; ?></span></h4>
                        <!-- Echo Student School here-->
                        <h5 class="s_school">School: <span class="display-text"><?php echo $row['school_name']; ?></span></h5>
                        <!-- Echo Student Program Here -->
                        <h5 class="s_program">Program: <span class="display-text"><?php echo $row['prog_name']; ?></span></h5>
                        <!-- Echo Student Program Here -->
                        <h5 class="s_quarter">Quarter: <span class="display-text"><?php echo $row['quarter']; ?></span></h5>
                    </div>
                </section>
                    <div class="s_bio_box">
                        <!-- Echo Student Bio Here -->
                        <p class="s_bio"><span class="display-text"><?php echo $row['description']; ?></span></p>
                    </div>
                    <div class="edit-disc">
                    <!--This creates a Delete Button which links that products delete ID to the button that way when clicked it knows which to delete-->
                    <a alt="Delete Disc" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);//Refers to the page its on ?>?deleteid=<?php echo $row['stud_id']?>">
                    <div class="delete-button">Delete Student</div>
                    </a>
                    </div>
                    <?php
                        //close Nominee while looop
                        }
                    ?>
                    
                
                </div> <!-- End honorable mentions -->
            </section> <!-- End tables 2 -->
            <section class="tables"> <!-- Start tables 3 -->
                <div id="m_students">
                    <!-- Echo Section Title Here -->
                    <h2 class="sect_title">Nominees</h2>
                    <?php
                        $stmt = $student->displayStudentAward('Nominee');
                        //retrieve all students who are a nominee
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>
                <section class="img-sum-box">
                    <div class="s_img_box">
                        <!-- Echo Student Img Here -->
                        <img src="img/<?php echo $row['image']; ?>" alt="echo student name here" title="echo student name here">
                    </div>
                    <div class="s_sum">
                        <!-- Echo Student Name Here -->
                        <h3 class="s_name">Student Name: <span class="display-text"><?php echo $row['stud_name']; ?></span></h3>
                        <!-- Echo Student Award Here -->
                        <h4 class="s_award">Category: <span class="display-text"><?php echo $row['award']; ?></span></h4>
                        <!-- Echo Student School here-->
                        <h5 class="s_school">School: <span class="display-text"><?php echo $row['school_name']; ?></span></h5>
                        <!-- Echo Student Program Here -->
                        <h5 class="s_program">Student Program: <span class="display-text"><?php echo $row['prog_name']; ?></span></h5>
                        <!-- Echo Student Program Here -->
                        <h5 class="s_quarter">Student Quarter: <span class="display-text"><?php echo $row['quarter']; ?></span></h5>
                    </div>
                </section>
                <div class="s_bio_box">
                        <!-- Echo Student Bio Here -->
                    <p class="s_bio"><span class="display-text"><?php echo $row['description']; ?></span></p>
                </div>
                <div class="edit-disc">
                <!--This creates a Delete Button which links that products delete ID to the button that way when clicked it knows which to delete-->
                <a alt="Delete Disc" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);//Refers to the page its on ?>?deleteid=<?php echo $row['stud_id']?>">
                <div class="delete-button">Delete Student</div>
                </a>
                </div>
                <?php
                        //close Nominee while looop
                        }
                    ?>
                </div> <!--End m_students -->
            </section><!-- End table 3-->
        <!--- a closing div for #tables_container should go here but the page freaks out when you put it in, so i removed it. -->
        <h2>Contact Information</h2>
        <div class="contact_card">
            
            <p class="contact_name">Mark Bellemare</p>
            <p><span class="contact_type">Email: </span><a href="mailto:bellemare.mark@pti.edu">bellemare.mark@pti.edu</a></p>
            <p><span class="contact_type">Phone: </span>412.809.5236</p>
            <p><span class="contact_type">Cell: </span>412.370.2992</p>
        </div><!--Close Content Card -->
        <div class="contact_card">
            <p class="contact_name">Melissa Gnoth</p>
            <p><span class="contact_type">Email: </span><a href="mailto:gnoth.melissa@pti.edu">gnoth.melissa@pti.edu</a></p>
            <p><span class="contact_type">Phone: </span>412.809.5257</p>
            <p><span class="contact_type">Cell: </span>412.809.5121</p>
        </div><!--Close Content Card -->
    </div> <!--Close Content Div-->
</body>

</html>