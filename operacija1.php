<?php
// admin.php
// vartotojų įgaliojimų keitimas ir naujo vartotojo registracija, jei leidžia nustatymai
// galima keisti vartotojų roles, tame tarpe uzblokuoti ir/arba juos pašalinti
// sužymėjus pakeitimus į procadmin.php, bus dar perklausta

session_start();
include("include/nustatymai.php");
include("include/functions.php");
// cia sesijos kontrole
if (!isset($_SESSION['prev']) || ($_SESSION['ulevel'] != $user_roles[DESTYTOJAS_LEVEL])) {
    header("Location: logout.php");
    exit;
}
$_SESSION['prev'] = "admin";
?>

<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
    <title>Administratoriaus sąsaja</title>
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
                <center>
                    <font size="5">Testo kūrimas</font>
                </center>
            </td>
        </tr>
    </table> <br>
    <center><b><?php echo $_SESSION['message']; ?></b></center>
    <table class="center" style=" width:75%; border-width: 2px; border-style: dotted;">
        <tr>
            <td width=30%><a href="index.php">[Atgal]</a></td>
            <td width=30%>
            </td>
        </tr>
    </table>

    <form method="POST" action=""
</body>

</html>