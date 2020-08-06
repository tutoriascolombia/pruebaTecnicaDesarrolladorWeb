<?php
if(isset($_POST["state"]) && 
 isset($_POST["city"]) &&
 isset($_POST["name"]) && 
 isset($_POST["email"])){
   
  $state = $_POST["state"];
  $city = $_POST["city"];
  $name = $_POST["name"];
  $email = $_POST["email"];
   
  if( (strlen($state)>0 && strlen($state)<=30) && (strlen($city)>0 && strlen($city)<=50) && (strlen($name)>0 && strlen($name)<=50) && (strlen($email)>0 && strlen($email)<=30) ){
  
    require_once 'Modelo.php';
    $db = new Modelo();

    if( $db->existsUser($email) == 0 ){
        $db->addUser($name, $email,$state,$city);
        
        $to = $email;
        $subject = "Te has registrado";
        $message = "Felicitaciones";
        $headers = "From: pruebas@sigma3ds.com" . "\r\n";
        mail($to,$subject,$message,$headers);
    
        print 'Tu información ha sido recibida satisfactoriamente';
    }
    else{
        print 'El usuario ya se encuentra registrado';
    }
    $db->close();
  
  }else{
    print 'Favor ingresar datos correctamente';
  }
  
}else{
  header("Location: https://sigma3ds.com");
  die();
}
?>
