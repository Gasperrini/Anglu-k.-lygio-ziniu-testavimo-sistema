<?php
// meniu.php  rodomas meniu pagal vartotojo rolę

if (!isset($_SESSION)) { header("Location: logout.php");exit;}
include("include/nustatymai.php");
$user=$_SESSION['user'];
$userlevel=$_SESSION['ulevel'];
$role="";
{foreach($user_roles as $x=>$x_value)
			      {if ($x_value == $userlevel) $role=$x;}
} 

     echo "<table width=100% border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"meniu\">";
        echo "<tr><td>";
        echo "Prisijungęs vartotojas: <b>".$user."</b>     Rolė: <b>".$role."</b> <br>";
        echo "</td></tr><tr><td>";
        if ($_SESSION['user'] != "guest") echo "[<a href=\"useredit.php\">Redaguoti paskyrą</a>] &nbsp;&nbsp;";
        if ($userlevel == $user_roles["Dėstytojas"]) {
            echo "[<a href=\"operacija1.php\">Kurti testą</a>] &nbsp;&nbsp;";
            echo "[<a href=\"operacija3.php\">Redaguoti testus</a>] &nbsp;&nbsp;";
            echo "[<a href=\"operacija3.php\">Testų įvertinimai</a>] &nbsp;&nbsp;";
       		} 
        if (($userlevel == $user_roles["Studentas"])) {
            echo "[<a href=\"attend_test.php\">Atlikti testą</a>] &nbsp;&nbsp;";
            echo "[<a href=\"student_results.php\">Mano rezultatai</a>] &nbsp;&nbsp;";
       		}   
        //Administratoriaus sąsaja rodoma tik administratoriui
        if ($userlevel == $user_roles[ADMIN_LEVEL] ) {
            echo "[<a href=\"admin.php\">Administratoriaus sąsaja</a>] &nbsp;&nbsp;";
        }
        echo "[<a href=\"logout.php\">Atsijungti</a>]";
      echo "</td></tr></table>";
?>       
    
 