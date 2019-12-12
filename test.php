<?php
// operacija3.php  Parodoma registruotų vartotojų lentelė

session_start();
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index"))
{ header("Location: logout.php");exit;}

?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Testas</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <table class="center" ><tr><td>
            <center><img src="include/top.png"></center>
        </td></tr><tr><td> 
 <?php
		include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
 ?> 
        <center><font size="5"><?php $title?></font></center><br>
        <?php
        $connection = mysqli_connect("localhost", "root", "", "vartvald");
        if (isset($_GET['id']) && isset($_GET['teacher']) && isset($_GET['level'])) {
            $fk = mysqli_real_escape_string($connection, $_GET['id']);
            $title = mysqli_real_escape_string($connection, $_GET['title']);
            $teacher = mysqli_real_escape_string($connection, $_GET['teacher']);
            $level = mysqli_real_escape_string($connection, $_GET['level']);
        if ($connection->connect_error) {
            die("Connection failed:" . $connection->connect_error);
        } else {
            $sql = "SELECT * FROM questions WHERE fk_test='$fk'";
        }


        $result = $connection->query($sql);
        $count = 0;
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $question = $row['question'];
                $mark = $row['mark'];
                $answer_1 = $row['answer_1'];
                $answer_2 = $row['answer_2'];
                $answer_3 = $row['answer_3'];
                $answer_4 = $row['answer_4'];
                $correct = $row['correct'];
                
                echo "<div><form method='POST' action='test_calc.php?id=".$fk."&level=".$level."&teacher=".$teacher."&title=".$title."'><br><b>" . $row['question'] . "</b><br><input type='radio' name='answer_".$id."' value=".$answer_1.">"
                        . $row['answer_1'] . "<br><input type='radio' name='answer_".$id."' value=".$answer_2.">" . $row['answer_2'] . "<br><input type='radio' name='answer_".$id."' value=".$answer_3.">" . $row['answer_3'] . 
                        "<br><input type='radio' name='answer_".$id."' value=".$answer_4.">" . $row['answer_4'] . "<input type='hidden' name='mark[]' value=".$row['mark'].">
                        <input type='hidden' name='correct[]' value=".$row['correct'].">
                        <input type='hidden' name='fk' value=".$fk.">
                        <input type='hidden' name='id' value=".$row['id']."><br><br></div>";
                $count++;
            }
            echo "<input type='hidden' name='count' value=".$count.">";
            echo '<button type="submit"><b>Baigti testą</b></button>';
        } else {
            echo "</table><h2 style='text-align:center'>Testas neturi sukurtų klausimų..</h2>";
        }
    }
    ?>

</form>

    <?php
        $connection->close();
        ?>
  </body></html>