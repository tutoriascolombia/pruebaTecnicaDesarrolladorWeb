<?php
	class Modelo{

		var $con;
	
		function __construct(){
		  $server = "178.128.146.252";
		  $db = "admin_sigmatest";
		  $user = "admin_sigmauser";
		  $passw = "pfaDKIJyPF";
		
			$this->con = mysqli_connect($server, $user,$passw, $db) or die ("sin conexion");
		}
		public function con(){ 
			return $this->con;
		}
		public function close(){ 
			mysqli_close($this->con);
		}
		public function addUser($name,$email,$state,$city){
			if( mysqli_query($this->con,"insert into contacts(name,email,state,city) values('$name','$email','$state','$city')") )
				return true;
			else
				return false;
		}
		public function existsUser($email){ 
			return  mysqli_query($this->con,"select count(email) as cU from contacts where email='$email'")->fetch_object()->cU;
		}	
	}
?>
