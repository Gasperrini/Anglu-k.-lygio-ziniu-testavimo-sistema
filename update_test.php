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

                if (isset($_GET['title'])) {
                    $title = ($_GET['title']);
                }

                if (isset($_GET['fk_test'])) {
                    $fk_test = ($_GET['fk_test']);
                }
                
                if (isset($_POST['question_id'])) {
                    $question_id = ($_POST['question_id']);
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

                /*if (isset($_POST['fk_test'])) {
                    $fk_test= ($_POST['fk_test']);
                }*/

                $user=$_SESSION['user'];
                $userid=$_SESSION['userid'];
                /*for($i=0; $i < count($question); $i++){
                $sql = "UPDATE questions SET `id`=$question_id[$i],`question`='$question[$i]',`mark`=$mark[$i],
                `answer_1`='$answer_1[$i]',`answer_2`='$answer_2[$i]',`answer_3`='$answer_3[$i]',`answer_4`='$answer_4[$i]',`correct`='$correct[$i]',`fk_test`=$fk_test[$i] WHERE fk_test = $fk_test[$i]
                AND id = $question_id[$i];";
                mysqli_query($connection,$sql);
                }*/
                echo "<div style='text-align:center; font-size:30px'>Šiuo metu ši funkcija neveikia..</div>";

                $connection->close();
                header("refresh:3 url=edit_test.php?id=".$fk_test."&title=".$title."");
                ?>
</body>

</html>