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
//loop through that variable, repeating a procedure once per row
if($student->delete()){
//show pos feedback
echo '<p class="success">The student has been deleted from the page.</p>';

}else{//otherwise show 'fail' feedback
echo '<p class="danger">The student hase NOT been deleted from the page.</p>';
}
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
<div class="header">
<h1>Community Service</h1>
<p>The efforts of our students, faculty and staff haven't gone unnoticed. We are proud of the fact that we have received national and statewide awards. The Pennsylvania Association of Private School Administrators (PAPSA) and the Association of Private Sector Colleges and Universities (APSCU) have honored our family with their annual community service awards on multiple occasions.</p>
</div>

<div id="tables_container">
<section class="tables">
<div id="awards">
<!-- Echo Section Title Here -->
<h2 class="sect_title">Awards</h2>
<?php
$stmt = $student->displayStudentAward('Award Recipient');
//retrieve all students who are a nominee
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
<section class="img-sum-box">
<div class="s_img_box">
<!-- Echo Student Img Here -->
<img style="max-width:250px!important;" src="img/<?php echo $row['image']; ?>" alt="<?php echo $row['stud_name']; ?>" title="<?php echo $row['stud_name']; ?>">
</div>
<div class="s_sum">
<!-- Echo Student Name Here -->
<h3 class="s_name"><?php echo $row['stud_name']; ?> </h3>
<!-- Echo Student Award Here -->
<h4 class="s_award"><?php echo $row['award']; ?></h4>
<!-- Echo Student School here-->
<h5 class="s_school">School: <?php echo $row['school_name']; ?></h5>
<!-- Echo Student Program Here -->
<h5 class="s_program"><?php echo $row['prog_name']; ?> //</h5>
<!-- Echo Student Program Here -->
<h5 class="s_quarter"><?php echo $row['quarter']; ?></h5>
</div>
</section>
<div class="s_bio_box">
<!-- Echo Student Bio Here -->
<p class="s_bio"><?php echo $row['description']; ?> 

<!--
We start with a vision in our heart, and we put it one canvas. Let's give him a friend too. Everybody needs a friend. I was blessed with a very steady hand; and it comes in very handy when you're doing these little delicate things.

You are only limited by your imagination. You have to make those little noises or it won't work. That's a son of a gun of a cloud. Everyone is going to see things differently - and that's the way it should be. It's important to me that you're happy. If there's two big trees invariably sooner or later there's gonna be a little tree.
-->
</p>
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


</div>
</div>
</section>
<section class="tables">
<div id="h_mentions">
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
<img src="img/<?php echo $row['image']; ?>" alt="<?php echo $row['stud_name']; ?>" title="<?php echo $row['stud_name']; ?>">
</div>
<div class="s_sum">
<!-- Echo Student Name Here -->
<h3 class="s_name"><?php echo $row['stud_name']; ?></h3>
<!-- Echo Student Program Here -->
<h5 class="s_program"><?php echo $row['prog_name']; ?></h5>
<!-- Echo Student Program Here -->
<h5 class="s_quarter"><?php echo $row['quarter']; ?></h5>
</div>
</section>
<div class="s_bio_box">
<!-- Echo Student Bio Here -->
<p class="s_bio">
<?php echo $row['description']; ?>
<!--
We start with a vision in our heart, and we put it one canvas. Let's give him a friend too. Everybody needs a friend. I was blessed with a very steady hand; and it comes in very handy when you're doing these little delicate things.

You are only limited by your imagination. You have to make those little noises or it won't work. That's a son of a gun of a cloud. Everyone is going to see things differently - and that's the way it should be. It's important to me that you're happy. If there's two big trees invariably sooner or later there's gonna be a little tree.
-->
</p>
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
</div>
</div>
</section>
<section class="tables">
<div id="m_students">
<!-- Echo Section Title Here -->
<h2 class="sect_title">Model Students</h2>
<section class="img-sum-box">
<div class="s_img_box">
<!-- Echo Student Img Here -->
<img src="img/<?php echo $row['image']; ?>" alt="<?php echo $row['stud_name']; ?>" title="<?php echo $row['stud_name']; ?>">
</div>
<div class="s_sum">
<!-- Echo Student Name Here -->
<h3 class="s_name"><?php echo $row['stud_name']; ?></h3>
<!-- Echo Student Program Here -->
<h5 class="s_program"><?php echo $row['prog_name']; ?></h5>
<!-- Echo Student Program Here -->
<h5 class="s_quarter"><?php echo $row['quarter']; ?></h5>
</div>
</section>
<div class="s_bio_box">
<!-- Echo Student Bio Here -->
<p class="s_bio">
<?php echo $row['description']; ?>
<!--
We start with a vision in our heart, and we put it one canvas. Let's give him a friend too. Everybody needs a friend. I was blessed with a very steady hand; and it comes in very handy when you're doing these little delicate things.

You are only limited by your imagination. You have to make those little noises or it won't work. That's a son of a gun of a cloud. Everyone is going to see things differently - and that's the way it should be. It's important to me that you're happy. If there's two big trees invariably sooner or later there's gonna be a little tree.
-->
</p>
</div>
</div>
</section>
</div> <!-- End /.tables-->
<h2>Contact Information</h2>
<div class="contact_card">

<p class="contact_name">Mark Bellemare</p>
<p><span class="contact_type">Email: </span><a href="mailto:bellemare.mark@pti.edu">bellemare.mark@pti.edu</a></p>
<p><span class="contact_type">Phone: </span>412.809.5236</p>
<p><span class="contact_type">Cell: </span>412.370.2992</p>
</div>
<div class="contact_card">
<p class="contact_name">Melissa Gnoth</p>
<p><span class="contact_type">Email: </span><a href="mailto:gnoth.melissa@pti.edu">gnoth.melissa@pti.edu</a></p>
<p><span class="contact_type">Phone: </span>412.809.5257</p>
<p><span class="contact_type">Cell: </span>412.809.5121</p>
</div>
</div>
</body>

</html>