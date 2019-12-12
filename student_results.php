<?php session_start();
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index")) {
    header("Location: logout.php");
    exit;
} ?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Mano rezultatai</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <table class="center" ><tr><td>
            <center><img src="include/top.png"></center>
        </td></tr><tr><td> 
 <?php
		include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
 ?> 
 <div style="width: 60%; margin: 0 auto;">
<table>
        

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
            echo '<tr style="text-align:left">
            <th style="border-right:solid; border-bottom:solid">Statusas</th>
            <th style="border-right:solid; border-bottom:solid">Surinkta taškų</th>
            <th style="border-right:solid; border-bottom:solid">Lygis</th>
            <th style="border-right:solid; border-bottom:solid">Testas</th>
            <th style="border-bottom:solid">Data</th>
        </tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                $date = $row['date'];
                $status = $row['status'];
                $title = $row['title'];
                $mark = $row['mark'];
                $top_mark = $row['top_mark'];
                $level = $row['level'];
                $test = $row["fk_test"];
                /*$sql2 = "SELECT * FROM tests WHERE title = '".$title."'";
                $result2 = $connection->query($sql2);
                while ($row1 = mysqli_fetch_assoc($result2)){
                    $id = $row1['id'];
                    $title = $row1['title'];
                    if($id == $test){*/
                echo "<tr style='text-align:left'><td style='border-right:solid'>" . $row['status'] . "</td><td style='border-right:solid'>" . $row['mark'] . " / ". $row['top_mark']."</td><td style='border-right:solid'>" . $row['level'] . "</td>
                <td style='border-right:solid'>" . $row['title'] . "</td><td>" . $row["date"] . "</td></tr>";
                    /*}
                }*/
            }
        } else {
            echo "<h2 style='text-align:center'>Jus dar neatlikote nei vieno testo!</h2></table>";
        }

        $connection->close();
        ?>
    </table>
 </div>