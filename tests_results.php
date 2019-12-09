<?php session_start();
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index")) {
    header("Location: logout.php");
    exit;
} ?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Testų įvertinimai</title>
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
        <tr style="text-align:left">
            <th>Studentas</th>
            <th>Statusas</th>
            <th>Surinkta taškų</th>
            <th>Lygis</th>
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
            $sql = "SELECT * FROM test_attempts WHERE teacher = '$userid'";
        }
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $date = $row['date'];
                $student = $row['name'];
                $status = $row['status'];
                $mark = $row['mark'];
                $top_mark = $row['top_mark'];
                $level = $row['level'];
                $test = $row["fk_test"];
                $sql2 = "SELECT * FROM tests WHERE id = '".$test."'";
                $result2 = $connection->query($sql2);
                while ($row1 = mysqli_fetch_assoc($result2)){
                    $id = $row1['id'];
                    $title = $row1['title'];
                    if($id == $test){
                echo "<tr style='text-align:center'><td>" . $row['name'] . "</td><td>" . $row['status'] . "</td><td>" . $row['mark'] . " / ". $row['top_mark']."</td><td>" . $row['level'] . "</td>
                <td>" . $row1['title'] . "</td><td>" . $row["date"] . "</td></tr>";
                    }
                }
            }
        } else {
            echo "</table><h2 style='text-align:center'>Studentai dar neatliko nei vieno jusu testo!</h2>";
        }

        $connection->close();
        ?>
    </table>