<?php
// operacija3.php  Parodoma registruotų vartotojų lentelė

session_start();
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index"))
{ header("Location: logout.php");exit;}

?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Atlikti testą</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <table class="center" ><tr><td>
            <center><img src="include/top.png"></center>
        </td></tr><tr><td> 
 <?php
		include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
 ?> 
        <center><font size="5">Pasirinkitę testą, kurį norite atlikti</font></center><br>
        <?php
        $connection = mysqli_connect("localhost", "root", "", "vartvald");
        if ($connection->connect_error) {
            die("Connection failed:" . $connection->connect_error);
        } else {
            $sql = "SELECT * FROM tests";
        }

        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['title'];
                $level = $row['level'];
                $teacher = $row['fk_user'];
                echo "<tr style='text-align:center'><td><a href='test.php?id={$row['id']}&level={$row['level']}&teacher={$row['fk_user']}&title={$row['title']}'>" . $row['title'] . ", lygis - " . $row['level'] . "</a></td></tr>";
            }
        } else {
            echo "<h2 style='text-align:center'>Nėra sukurtų testų..</h2></table>";
        }

        $connection->close();
        ?>
  </body></html>