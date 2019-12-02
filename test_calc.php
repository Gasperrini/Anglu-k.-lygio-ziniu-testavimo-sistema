<?php
// operacija3.php  Parodoma registruotų vartotojų lentelė

session_start();
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index")) {
    header("Location: logout.php");
    exit;
}

?>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
    <title>sdg</title>
    <link href="include/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <table class="center">
        <tr>
            <td>
                <center><img src="include/top.png"></center>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
                ?>
                <center>
                    <font size="5"><?php $title ?></font>
                </center><br>

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

                if (isset($_POST['count'])) {
                    $count = ($_POST['count']);
                }

                $top_grade = 0;

                $grade = 0;

                for ($id = 0; $id < $count; $id++) {
                    if ($_POST['answer_' . $id] == $correct[$id]) {
                        $grade = $grade + $mark[$id];
                    }
                    $top_grade = $top_grade + $mark[$id];
                }

                $user=$_SESSION['user'];
                $userid=$_SESSION['userid'];
                $status;

                if($grade / $top_grade * 10 > 4.5)
                    $status = 'Išlaikyta';
                else $status = 'Neišlaikyta';

                $sql = "INSERT INTO test_attempts (date, status, id, mark, top_mark, fk_user, fk_test) VALUES
                    (CURRENT_TIMESTAMP,'$status',null,'$grade','$top_grade','$userid','$fk');";

                mysqli_query($connection,$sql);

                echo "<h2 style='text-align:center'>" . $status . "! Surinkai " . $grade . " is " . $top_grade . "!</h2>";

                $connection->close();
                ?>
</body>

</html>