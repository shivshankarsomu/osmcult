<?php include("partials/header.php"); ?>
<?php include("partials/nav_bar.php"); ?>

<?php
$jobname = $_POST['uLocation'];
$name = $_POST['uName'];
$desc = $_POST['uDesc'];
$sms = $_POST['uSMS'];
$att = $_POST['uAttire'];
$date = $_POST['uDate'];
$ppl = $_POST['uPeople'];
$fpp = $_POST['uFemale'];
echo "<div style=padding-top:100px;margin-left:20px;>";
echo "<JobType               :$jobname</p>" ;
echo "<p>JobName               :$name </p>";
echo "<p>Job Description       :$desc</p>" ;
echo "<p>Job Attire            :$att</p>" ;
echo "<p>Job Date              :$date</p>";
echo "<p>Number of people      :$ppl</p>";
echo "<p>Number of female      :$fpp</p>";
echo "</div>"
?>
<?php include("partials/footer.php"); ?>
