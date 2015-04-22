<?php
$con=mysql_connect("localhost","gabdulla3","Sairabanu3");
mysql_select_db("People",$con);
 
$q=mysql_query("SELECT * FROM login ");      //>'".$_REQUEST['year']."'");
while($e=mysql_fetch_assoc($q))
        $output[]=$e;
 
print(json_encode($output));
 
mysql_close();
?>