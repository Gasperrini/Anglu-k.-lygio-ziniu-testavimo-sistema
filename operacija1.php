<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
     </script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
     </script>
<style>
	#zinutes {
 	   font-family: Arial; border-collapse: collapse; width: 70%;
	}
	#zinutes td {
 	   border: 1px solid #ddd; padding: 8px;
	}
	#zinutes tr:nth-child(even){background-color: #f2f2f2;}
	#zinutes tr:hover {background-color: #ddd;}
</style>

	</head>
	<body>
		<a href="index.php">Pradžia</a>
	<center><h3>Žinučių sistema</h3></center>
<table style="margin: 0px auto;" id="zinutes">     
	
<?php
	session_start();
	$dbc=mysqli_connect('localhost','root', 'stud','stud');
	if(!$dbc){die ("Negaliu prisijungti prie MySQL:" .mysqli_error($dbc)); }

	$sql = "SELECT * FROM IgnasGasparavicius";
    $result = mysqli_query($dbc, $sql);
	
	//echo "<table border=\"1\">";
		while($row = mysqli_fetch_assoc($result))
		 {
			  echo "<tr>
			  <td>".$row['id']."</td>
			  <td>".$row['vardas']."</td>
			  <td>".$row['epastas']."</td>
			  <td>".$row['kam']."</td>
			  <td>".$row['data']."</td>
			  <td>".$row['ip']."</td>
			  <td>".$row['zinute']."</td>
			  </tr>";  }  
		//echo "</table>";                              

?>
</table><br>	
		
		<form method='post'>
			
			Adresatas:<input name='kam' type='text'><br><br>
			Zinute:<textarea name='zinute'> </textarea><br><br>
			<input type='submit' name='ok' value='Patvirtinti'>
		</form>

<?php
	$dbc=mysqli_connect('localhost', 'stud', 'stud', 'stud');
	if(!$dbc){
		die("Negaliu prisijungti prie MySQL:"  .mysqli_error($dbc));
	}
	if($_POST !=null){
		$vardas = $_SESSION['user'];
		$epastas = $_SESSION['umail'];
		$kam = $_POST['kam'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$zinute = $_POST['zinute'];
		
		$sql = "INSERT INTO IgnasGasparavicius ( vardas, epastas, kam, data, ip, zinute)
			VALUES ('$vardas', '$epastas', '$kam', now(), '$ip', '$zinute')";
		if(mysqli_query($dbc, $sql)) echo "Irasyta"; else die ("Klaida irasant:" .mysqli_error($dbc));
		}
		else die("Neuzpildyta forma");
		
	header("Location:index.php");
	exit;
?>
		
	</body>
	</html>
