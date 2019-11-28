<?php

$connection = mysqli_connect("localhost", "root", "", "vartvald");
if ($connection->connect_error) {
    die("Connection failed:" . $connection->connect_error);
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
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

if (isset($_POST['mark'])) {
    $mark = ($_POST['mark']);
}

if (isset($_POST['correct'])) {
    $correct = ($_POST['correct']);
}

var_dump($correct);
$grade = 0;
var_dump($correct);
if($answer_4==$correct)
{
    echo "labas";
}
if($answer_1 == $correct){
    $grade = $grade + $mark;
}

if($answer_2 == $correct){
    $grade = $grade + $mark;
}

if($answer_3 == $correct){
    $grade = $grade + $mark;
}

if($answer_4 == $correct){
    $grade = $grade + $mark;
}

var_dump($grade);

/*$connection = mysqli_connect("localhost", "root", "", "teltonika");
if ($connection->connect_error) {
    die("Connection failed:" . $connection->connect_error);
}

if (isset($_POST['id'])) {
    $id = ($_POST['id']);
    $sql = "INSERT INTO test_attempts (date, id, mark, fk_user, fk_test) VALUES
        ('$name','$area','$population','$postal_code', '$id') ";

    header("refresh:1 url=test.php?id=" . $id);
    $connection->close();
}*/
