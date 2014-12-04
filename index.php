
<?php


echo "Hello Koding... this is my first php page <br><br>";


//Connect to a database using pdo

include('con-db.php');

try{
	$db = new PDO('mysql:host='.$DBHost.';dbname='.$DBName.';charset=utf8',$DBUsername,$DBPassword,array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$stmt = $db->prepare("SELECT * FROM Examples");

	$stmt->execute();

	$row = $stmt->rowCount();
   //;
   
   echo $row . " record(s) where found in the database. <br><br>";
   
   if ($row > 0 ){

        for ($i = 1; $i <= $row; $i++) {
                     
            $result = $stmt->fetch();     
            echo "Record ".$i."<br>";
            echo date('D m/d/Y h:i:sa T',strtotime($result['DateInserted']))."<br>";
            echo $result['Text']. "<br><br>";

        }
   }

}catch(PDOException $e) {
	//echo 'ERROR: ' . $e->getMessage();
	echo $e->getMessage();
}



?>