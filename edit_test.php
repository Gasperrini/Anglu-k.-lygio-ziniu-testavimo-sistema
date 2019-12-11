<?php
// operacija3.php  Parodoma registruotų vartotojų lentelė

session_start();
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index"))
{ header("Location: logout.php");exit;}

?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Redaguoti testus</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <table class="center" ><tr><td>
            <center><img src="include/top.png"></center>
        </td></tr><tr><td> 
 <?php
		include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę

        if (isset($_GET['id'])) {
            $id = ($_GET['id']);
        }
        if (isset($_GET['level'])) {
            $level = ($_GET['level']);
        }
        if (isset($_GET['teacher'])) {
            $teacher = ($_GET['teacher']);
        }
        if (isset($_GET['title'])) {
            $title = ($_GET['title']);
        }

        echo '<br><center><font size="5">Redaguojamas testas: '.$title.'';

        $userid=$_SESSION['userid'];

        $connection = mysqli_connect("localhost", "root", "", "vartvald");
        if ($connection->connect_error) {
            die("Connection failed:" . $connection->connect_error);
        } else {
            $sql = "SELECT * FROM questions WHERE fk_test = $id";
        }

        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $question_id = $row['id'];
                $question = $row['question'];
                $mark = $row['mark'];
                $answer_1 = $row['answer_1'];
                $answer_2 = $row['answer_2'];
                $answer_3 = $row['answer_3'];
                $answer_4 = $row['answer_4'];
                $correct = $row['correct'];
                $fk_test = $row['fk_test'];
                ?>
                <form style="border-top:solid" action="delete_question.php?question_id='<?php echo "$question_id";?>'&fk_test='<?php echo "$fk_test";?>'" method="POST">
                <input id="question_id" type="hidden" name="question_id" value='<?php echo "$question_id";?>'>
                <input id="fk_test" type="hidden" name="fk_test" value='<?php echo "$fk_test";?>'>
                <button type="submit"><b>Ištrinti klausimą</b></button>
                </form>

                <form action="update_test.php" method="POST">
                <input id="question_id" type="hidden" name="question_id[]" value='<?php echo "$question_id";?>'>
                <p>Klausimas: <input id="question" type="text" name="question[]" value='<?php echo "$question";?>'></p>
                <p>Taškų skaičius: <input id="mark" type="text" name="mark[]" value='<?php echo "$mark";?>'></p>
                <p>Pirmas klausimas: <input id="answer_1" type="text" name="answer_1[]" required value='<?php echo "$answer_1";?>'"></p>
                <p>Antras klausimas: <input id="answer_2" type="text" name="answer_2[]" required value='<?php echo "$answer_2";?>'></p>
                <p>Trečias klausimas: <input id="answer_3" type="text" name="answer_3[]" required value='<?php echo "$answer_3";?>'></p>
                <p>Ketvirtas klausimas: <input id="answer_4" type="text" name="answer_4[]" required value='<?php echo "$answer_4";?>'></p>
                <p>Teisingas: <input id="correct" type="text" name="correct[]" required value='<?php echo "$correct";?>'></p>
                <input id="fk_test" type="hidden" name="fk_test[]" value='<?php echo "$fk_test";?>'>

                <?php
            }
        } else {
            echo "</table><h2 style='text-align:center'>Nera sukurtu klausimu..</h2>";
        }?>
        
        <div style="text-align:center">
        <button type="submit"><b>Atnaujinti</b></button>
        </div>
    </form>
<?php
        $connection->close();
        ?>
  </body></html>