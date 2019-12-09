<?php
session_start();
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index")) {
    header("Location: logout.php");
    exit;
}

        $title = $_POST['title'];
        $level = $_POST['level'];
        $userid=$_SESSION['userid'];
        

        $connection = mysqli_connect("localhost", "root", "", "vartvald");
        if ($connection-> connect_error) {
            die("Connection failed:". $connection-> connect_error);
        }

        $sql= "INSERT INTO tests (id, title, level, fk_user) VALUES
        (null,'$title','$level','$userid')";
        
        mysqli_query($connection,$sql);

        header('Location: create_questions.php?title='.$title.'&level='.$level);

        $connection->close();