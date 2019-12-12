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
 ?> 

        <div style="text-align:left">
            <form action="add_test.php" method="POST">
                <p>Pavadinimas: <input type="text" name="title" required value=""></p>
                <p>Lygis: 
                <select name="level" required>
                    <option value="C2">C2</option>
                    <option value="C1">C1</option>
                    <option value="B2">B2</option>
                    <option value="B1">B1</option>
                    <option value="A2">A2</option>
                    <option value="A1">A1</option>
                </select>
                </p>
                <div style="text-align:center">
                <input type="submit" name="submit" value="Pridėti testą">
                </div>
            </form>
        </div>

</body>
</html>