<?php
session_start();
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index")) {
    header("Location: logout.php");
    exit;
}

if (isset($_GET['title'])){
    $title = ($_GET['title']);
}
if (isset($_GET['level'])){
    $level = ($_GET['level']);
}

$userid=$_SESSION['userid'];

$question = $_POST['question'];
$mark = $_POST['mark'];
$answer_1 = $_POST['answer_1'];
$answer_2 = $_POST['answer_2'];
$answer_3 = $_POST['answer_3'];
$answer_4 = $_POST['answer_4'];
$correct = $_POST['correct'];

$connection = mysqli_connect("localhost", "root", "", "vartvald");
if ($connection->connect_error) {
    die("Connection failed:" . $connection->connect_error);
} else {
    $sql = "SELECT id FROM tests WHERE fk_user = '$userid' AND level = '$level' AND title = '$title'";
}
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }
}

        $connection = mysqli_connect("localhost", "root", "", "vartvald");
        if ($connection-> connect_error) {
            die("Connection failed:". $connection-> connect_error);
        }

        $sql= "INSERT INTO questions (id, question, mark, answer_1, answer_2, answer_3, answer_4, correct, fk_test) VALUES
        (0,'$question',$mark,'$answer_1','$answer_2','$answer_3','$answer_4','$correct',$id)";
        var_dump($sql);
        
        mysqli_query($connection,$sql);

        header('Location: index.php');

        $connection->close();