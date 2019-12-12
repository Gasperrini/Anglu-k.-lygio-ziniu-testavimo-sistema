<?php
// operacija3.php  Parodoma registruotų vartotojų lentelė

session_start();
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index"))
{ header("Location: logout.php");exit;}

?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Redaguoti testus</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <table class="center" ><tr><td>
            <center><img src="include/top.png"></center>
        </td></tr><tr><td> 
 <?php
		include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
 ?> 
        <center><font size="5">Pasirinkite testą</font></center><br>
        <?php

        $userid=$_SESSION['userid'];

        $connection = mysqli_connect("localhost", "root", "", "vartvald");
        if ($connection->connect_error) {
            die("Connection failed:" . $connection->connect_error);
        } else {
            $sql = "SELECT * FROM tests WHERE fk_user = '$userid'";
        }

        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['title'];
                $level = $row['level'];
                $teacher = $row['fk_user'];
                echo "<tr style='text-align:left'><td><div style='display:inline-block'><a href='edit_test.php?id={$row['id']}&level={$row['level']}&teacher={$row['fk_user']}&title={$row['title']}'>" . $row['title'] . "</a>
                </div></font></center><div style='display:inline-block; float:right'><form action='delete_test.php' method='POST'>
                <input id='id' type='hidden' name='id' value=".$id.">
                <button type='submit'><b>Ištrinti testą</b></button></form></div></td></tr>";
            }
        } else {
            echo "<h2 style='text-align:center'>Nėra sukurtų testų..</table></h2>";
        }

        $connection->close();
        ?>
  </body></html>