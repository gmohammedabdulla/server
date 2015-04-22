<?php 
  mysql_connect("localhost","gabdulla","Sairabanu3"); 
  $db= mysql_select_db("People"); 
  
 // echo ("data");  
//  if (!empty($_POST])) { 
  
    $query = "SELECT * FROM transaction ";
    $sql1=mysql_query($query);
	$response = array();
  // $row = mysql_fetch_array($sql1);
   if(!$sql1)
   echo "error";
   echo $row['sender'];
    while ($row = mysql_fetch_assoc($sql1)) {
 //  $row = mysql_fetch_assoc($result);
/*$response1[] = array (
	                          'sender' => $row['sender'],
				  'receiver' => $row['receiver'],
				  'reason'=> $row['reason'],
				  'amount'=> $row['amount'],
				  'time'=> $row['time']
				  );
	*/
	$response1['sender']=$row['sender'];
	$response1['receiver']=$row['receiver'];
	$response1['reason']=$row['reason'];
	$response1['amount']=$row['amount'];
	$response1['time']=$row['time'];
	
	array_push($response,$response1);
	
	}
   //     $response['dummy'] = 'dummy';
	echo json_encode($response);
//	die(json_encode($response));
//  } else{ 
   // $response["success"] = 0;
   /// $response["message"] = " One or both of the fields are empty ";
   // die(json_encode($response));
 //   }
    mysql_close();
 ?>