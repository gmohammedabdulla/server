<?php 
  mysql_connect("localhost","gabdulla","Sairabanu3"); 
  $db= mysql_select_db("People"); 
  $password=$_POST["password"]; 
  $username=$_POST["username"]; 
  $mnumber=$_POST["mobile"];
  $email=$_POST["email"];
  $pin=$_POST["pin"];

  if (!empty($_POST)) { 
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['mobile']) || empty($_POST['email']) || empty($_POST["pin"])) { 
    // Create some data that will be the JSON response
      $response["success"] = 0; 
      $response["message"] = "Few of the fields are missing, enter and re try."; 
    //die is used to kill the page, will not let the code below to be executed. It will also 
    //display the parameter, that is the json data which our android application will parse to be
    //shown to the users 
      die(json_encode($response));
    }
   // $query = " SELECT * FROM login WHERE email = '$username' and password='$password'";
   
   $query = "INSERT INTO login (name,password,mobile,email,pin) VALUES ('$username','$password','$mnumber','$email','$pin')";
   
    $sql1=mysql_query($query);
   
    if (!empty($sql1)) {
      $response["success"] = 1;
      $response["message"] = "You have been sucessfully signed up"; 
      die(json_encode($response)); 
    } else{
      $response["success"] = 0;
      $response["message"] = "Something went wrong , sorry! "; 
      die(json_encode($response)); 
    }
  } else{ 
    $response["success"] = 0;
    $response["message"] = " One or all of the fields are empty ";
    die(json_encode($response));
    }
    mysql_close();
 ?>