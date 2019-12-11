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
    <title>Testas baigtas!</title>
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
                
                if (isset($_POST['id'])) {
                    $id = ($_POST['id']);
                }

                $sql = "DELETE FROM tests WHERE id = $id";
                mysqli_query($connection,$sql);

                $connection->close();

                header("Location: choose_test.php");
                ?>
</body>

</html>