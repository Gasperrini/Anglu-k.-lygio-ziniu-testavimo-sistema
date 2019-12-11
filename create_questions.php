<?php session_start();
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index")) {
    header("Location: logout.php");
    exit;
} 
?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Testo kūrimas</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
        <<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(e){
                var html='<br><div><p>Klausimas: <input type="text" id="question" name="question[]" required value=""></p><p>Taškų skaičius: <input type="text" id="mark" name="mark[]" required value=""></p><p>Pirmas atsakymas: <input type="text" id="answer_1" name="answer_1[]" required value=""></p><p>Antras atsakymas: <input type="text" id="answer_2" name="answer_2[]" required value=""></p><p>Trečias atsakymas: <input type="text" id="answer_3" name="answer_3[]" required value=""></p><p>Ketvirtas atsakymas: <input type="text" id="answer_4" name="answer_4[]" required value=""></p><p>Teisingas atsakymas: <input type="text" id="correct" name="correct[]" required value=""></p><a href ="#" id="remove">X</a></div>';

                $("#add").click(function(e){
                    $("#container").append(html);
                });

                $("#container").on('click','#remove',function(e){
                    $(this).parent('div').remove();
                });
            });
        </script>
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

        $userid=$_SESSION['userid'];

        $connection = mysqli_connect("localhost", "root", "", "vartvald");
        if ($connection->connect_error) {
            die("Connection failed:" . $connection->connect_error);
        } else {
            $sql = "SELECT * FROM tests WHERE fk_user='$userid' AND level = '$level' AND title = '$title'";
        }
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
            }
        }
 ?>

        <div style="text-align:left">
            <form action="add_questions.php?id=<?php echo "$id";?>" method="POST">
                <div id="container">
                <p>Klausimas: <input type="text" id="question" name="question[]" required value=""></p>
                <p>Taškų skaičius: <input type="text" id="mark" name="mark[]" required value=""></p>
                <p>Pirmas atsakymas: <input type="text" id="answer_1" name="answer_1[]" required value=""></p>
                <p>Antras atsakymas: <input type="text" id="answer_2" name="answer_2[]" required value=""></p>
                <p>Trečias atsakymas: <input type="text" id="answer_3" name="answer_3[]" required value=""></p>
                <p>Ketvirtas atsakymas: <input type="text" id="answer_4" name="answer_4[]" required value=""></p>
                <p>Teisingas atsakymas: <input type="text" id="correct" name="correct[]" required value=""></p>
                <a href ="#" id="add">Prideti</a>
                </div>
                <br>
                <input type="submit" name="submit" value="Pridėti klausimą (-us)">
            </form>
        </div>
</body>
</html>