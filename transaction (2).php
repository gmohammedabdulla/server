<?php 
  mysql_connect("localhost","gabdulla","Sairabanu3"); 
  $db= mysql_select_db("People"); 
  $reason=$_POST["reason"]; 
  $amount1=$_POST["amount"];
  $amount=(int)$amount1 ; 
  $id1=$_POST["uid"];
  $uid=(int)$id1;
  $sender=$_POST["sender"];


 
 if (!empty($_POST)) {  
    if(empty($_POST['uid'])){
	 $response["success"] = 0; 
         $response["message"] = "Looks like you have a problem with your card."; 
	 die(json_encode($response));
	}
	
    if (empty($_POST['reason']) || empty($_POST['amount'])) { 
        // Create some data that will be the JON response
        $response["success"] = 0; 
        $response["message"] = "Enter details properly and try again ."; 
        //die is used to kill the page, will not let the code below to be executed. It will also 
        //display the parameter, that is the json data which our android application will parse to be
        //shown to the users 
        die(json_encode($response));
    }
   
    $query = " SELECT Balance,email FROM login WHERE id = '$uid'";
    $sql1=mysql_query($query);
    $row = mysql_fetch_array($sql1); 
   
    if (!empty($row)) {
      
      if($row["Balance"]<$amount){
	    $response["success"] = 0;
            $response["message"] = "Insufficient Balance";
	  }else{
	    $response["success"] = 1;
            $response["message"] = "Transaction completed succesfully.";
            $balance = $row["Balance"];
	    $nbalance=$balance - $amount;
	    $query1=" UPDATE login SET Balance='$nbalance' WHERE id='$uid'";
	    $sql2=mysql_query($query1);
	    $dum = $row['email'];
	    
	    $query3 = " SELECT Balance FROM login WHERE email = '$sender'";
            $sql11=mysql_query($query3);
            $row = mysql_fetch_array($sql11);
	    $nbalance1=$row['Balance']+$amount;
	    $query1=" UPDATE login SET Balance='$nbalance1' WHERE email='$sender'";
	    $sql2=mysql_query($query1);
	    
	    $query=" Insert INTO transaction (sender,receiver,amount,reason,time) VALUES ('$sender','$dum','$amount','$reason',NOW())";
	    mysql_query($query);
	  }
          die(json_encode($response)); 
      } else{
          $response["success"] = 0;
          $response["message"] = "something wrong,sorry!!"; 
          die(json_encode($response)); 
      }
    } else{ 
    $response["success"] = 0;
    $response["message"] = "something went wrong!!";
    die(json_encode($response));
    }
      $response["success"] = 0; 
      $response["message"] = "Looks like uuyuyuuii you have a problem with your card."; 
      die(json_encode($response));

	    mysql_close();
 ?>