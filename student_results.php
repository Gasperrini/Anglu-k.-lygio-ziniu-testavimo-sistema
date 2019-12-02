<?php session_start();
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index")) {
    header("Location: logout.php");
    exit;
} ?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Operacija 3</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <table class="center" ><tr><td>
            <center><img src="include/top.png"></center>
        </td></tr><tr><td> 
 <?php
		include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
 ?> 
<table>
        <tr style="text-align:center">
            <th>Balas</th>
            <th>Testas</th>
            <th>Data</th>
        </tr>

        <?php
        $user=$_SESSION['user'];
        $userid=$_SESSION['userid'];
        $connection = mysqli_connect("localhost", "root", "", "vartvald");
        if ($connection->connect_error) {
            die("Connection failed:" . $connection->connect_error);
        } else {
            $sql = "SELECT * FROM test_attempts WHERE fk_user = '".$userid."'";
        }
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $date = $row['date'];
                $mark = $row['mark'];
                $top_mark = $row['top_mark'];
                $test = $row["fk_test"];
                echo "<tr style='text-align:center'><td>" . $row['mark'] . " / ". $row['top_mark']."</td><td>" . $row["fk_test"] . "</td><td>"
                    . $row["date"] . "</td></tr>";
            }
        } else {
            echo "</table><h2 style='text-align:center'>Jus dar neatlikote nei vieno testo!</h2>";
        }

        $connection->close();
        ?>
    </table>