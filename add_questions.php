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

                if (isset($_GET['id'])) {
                    $id = ($_GET['id']);
                }

                if (isset($_POST['question'])) {
                    $question = ($_POST['question']);
                }

                if (isset($_POST['mark'])) {
                    $mark = ($_POST['mark']);
                }

                if (isset($_POST['answer_1'])) {
                    $answer_1 = ($_POST['answer_1']);
                }

                if (isset($_POST['answer_2'])) {
                    $answer_2 = ($_POST['answer_2']);
                }

                if (isset($_POST['answer_3'])) {
                    $answer_3 = ($_POST['answer_3']);
                }

                if (isset($_POST['answer_4'])) {
                    $answer_4 = ($_POST['answer_4']);
                }

                if (isset($_POST['correct'])) {
                    $correct = ($_POST['correct']);
                }

                $user=$_SESSION['user'];
                $userid=$_SESSION['userid'];
                for($i=0; $i < count($question); $i++){
                $sql = "INSERT INTO questions (id,question,mark,answer_1,answer_2,answer_3,answer_4,correct,fk_test) VALUES
                ($i,'$question[$i]',$mark[$i],'$answer_1[$i]','$answer_2[$i]','$answer_3[$i]','$answer_4[$i]','$correct[$i]',$id)";
                mysqli_query($connection,$sql);
                }

                $connection->close();

                header("Location: choose_test.php");
                ?>
</body>

</html>