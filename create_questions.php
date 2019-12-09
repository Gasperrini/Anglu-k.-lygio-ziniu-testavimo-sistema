<?php session_start();
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index")) {
    header("Location: logout.php");
    exit;
} ?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Testo kūrimas</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <table class="center" ><tr><td>
            <center><img src="include/top.png"></center>
        </td></tr><tr><td> 
 <?php
        include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
        if (isset($_GET['title'])) {
            $title = ($_GET['title']);
        }
        if (isset($_GET['level'])) {
            $level = ($_GET['level']);
        }
 

        echo '<div style="text-align:left">
            <form action="add_questions.php?title='.$title.'&level='.$level.'" method="POST">
                <p>Klausimas: <input type="text" name="question" required value=""></p>
                <p>Taškų skaičius: <input type="text" name="mark" required value=""></p>
                <p>Pirmas atsakymas: <input type="text" name="answer_1" required value=""></p>
                <p>Antras atsakymas: <input type="text" name="answer_2" required value=""></p>
                <p>Trečias atsakymas: <input type="text" name="answer_3" required value=""></p>
                <p>Ketvirtas atsakymas: <input type="text" name="answer_4" required value=""></p>
                <p>Teisingas atsakymas: <input type="text" name="correct" required value=""></p>
                <input type="submit" name="submit" value="Pridėti klausimą (-us)">
            </form>
        </div>';
?>
</body>
</html>