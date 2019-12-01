<?php
// operacija3.php  Parodoma registruotų vartotojų lentelė

session_start();
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index"))
{ header("Location: logout.php");exit;}

?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>sdg</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <table class="center" ><tr><td>
            <center><img src="include/top.png"></center>
        </td></tr><tr><td> 
 <?php
		include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
 ?> 
        <center><font size="5"><?php $title?></font></center><br>

<?php

$connection = mysqli_connect("localhost", "root", "", "vartvald");
if ($connection->connect_error) {
    die("Connection failed:" . $connection->connect_error);
}

if (isset($_POST['fk'])) {
    $fk = mysqli_real_escape_string($connection, $_POST['fk']);
}

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
}

if (isset($_POST['mark'])) {
    $mark = ($_POST['mark']);
}

if (isset($_POST['correct'])) {
    $correct = ($_POST['correct']);
}

$grade = 0;

for($id = 0; $id < 3; $id++){
if($_POST['answer_'.$id] == $correct[$id])
{
    $grade = $grade + $mark[$id];
}
}

/*$sql = "INSERT INTO test_attempts (date, id, mark, fk_user, fk_test) VALUES
        ('current_timestamp()','','$grade','$postal_code', '$id') ";*/

echo "<h2 style='text-align:center'>Surinkai ".$grade." is 4</h2>";

$connection->close();
?>
</body></html>