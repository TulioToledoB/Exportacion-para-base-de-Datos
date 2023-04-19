<?php
	session_start();
	header("Content-type: text/xml");
	header("Content-type: application/force_download");
	header("Content-Disposition: attachment; filename=".$_SESSION['taules']."estructuradades.xml");
	header("Content-Transfer-Encoding: binary");
	
	$enlace = mysqli_connect($_SESSION['Ip'],$_SESSION['Usuari'],$_SESSION['pwd'],$_SESSION['bds']);

	$query = mysqli_query($enlace, "SELECT * FROM ".$_SESSION['taules']);

	$query4 = mysqli_query($enlace, "SELECT * FROM ".$_SESSION['taules']);
	
	$query5 = mysqli_query($enlace, "SELECT * FROM ".$_SESSION['taules']);
	
	echo "<?xml version=\"1.0\"?>";
	echo PHP_EOL;
	
	echo "<!DOCTYPE ".$_SESSION['taules']." [";
	echo PHP_EOL;
	echo "\t";
	echo "<!ELEMENT registre (";
	if ($row5 = mysqli_fetch_array($query5)){
		$query6 = mysqli_query($enlace, "DESCRIBE ".$_SESSION['taules']);
		$numFields = mysqli_num_rows($query6)-1;
		while ($row6 = mysqli_fetch_array($query6)){
			echo $row6[0];
			$numFields--;
			if ($numFields != -1){
				
					echo ",";
				
			}
		}
	}
	echo ")>";
	if ($row3 = mysqli_fetch_array($query4)){
		$query3 = mysqli_query($enlace, "DESCRIBE ".$_SESSION['taules']);
		while ($row4 = mysqli_fetch_array($query3)){
			echo PHP_EOL;
			echo "\t";
			echo "<!ELEMENT ".$row4[0]." (#PCDATA)>";
		}
	}
	echo PHP_EOL;
	echo "]>";
	
	echo PHP_EOL;
	echo "<".$_SESSION['taules'].">";
	echo PHP_EOL;
	while ($row = mysqli_fetch_array($query)) {
		$query2 = mysqli_query($enlace, "DESCRIBE ".$_SESSION['taules']);
		echo "\t";
		echo "<registre>";
		$x = 0;
		while ($row2 = mysqli_fetch_array($query2)){
			echo PHP_EOL;
			echo "\t";
			echo "\t";
			echo "<".$row2[0].">".$row[$x]."</".$row2[0].">";
			$x++;
		}
		echo PHP_EOL;
		echo "\t";
		echo "</registre>";
		echo PHP_EOL;
	}
	echo "</".$_SESSION['taules'].">";
	mysqli_close($enlace);
?>