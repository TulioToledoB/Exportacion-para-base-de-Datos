<?php
//se inicia sesion al servidor de localhost en base a los datos proporcionados por el usuario
			
			session_start();
			$_SESSION['Ip']=$_POST['IP'];
			$_SESSION['Usuari']=$_POST['User'];
			$_SESSION['pwd']=$_POST['Password'];
			$enlace = mysqli_connect($_SESSION['Ip'],$_SESSION['Usuari'],$_SESSION['pwd']);
					
			
			if (!$enlace) {
			  mysqli_close($enlace);
			  header('home.html');
			}
			
			
			else{
				header('Location:selectbasedatos.php');
			}
?>